<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|in:vacation,sick,maternity,paternity,bereavement,others',
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'nullable|string|max:1000',
        ]);

        if (session('employee_role') !== 'employee') {
            return redirect()->route('dashboard')->with('error', 'Only employee accounts can submit leave requests.');
        }

        $employeeId = session('employee_id');

        if (! $employeeId && session('employee_email')) {
            $employee = Employee::where('company_email', session('employee_email'))->first();
            $employeeId = $employee?->id;
        }

        if (! $employeeId) {
            return redirect()->back()->with('error', 'Unable to submit leave request because your employee account is not available. Please login as an employee.');
        }

        $fromDate = Carbon::parse($request->from_date);
        $toDate = Carbon::parse($request->to_date);
        $totalDays = $fromDate->diffInDays($toDate) + 1;

        $durationRules = [
            'vacation' => [5, 15],
            'sick' => [5, 15],
            'maternity' => [1, 105],
            'paternity' => [1, 7],
            'bereavement' => [1, 5],
        ];

        $typeLabel = match ($request->type) {
            'vacation' => 'Vacation',
            'sick' => 'Sick',
            'maternity' => 'Maternity',
            'paternity' => 'Paternity',
            'bereavement' => 'Bereavement',
            default => ucfirst($request->type),
        };

        if (isset($durationRules[$request->type])) {
            [$minDays, $maxDays] = $durationRules[$request->type];

            if ($totalDays < $minDays || $totalDays > $maxDays) {
                $message = $minDays === $maxDays
                    ? "{$typeLabel} leave must be {$minDays} day(s) long."
                    : "{$typeLabel} leave must be between {$minDays} and {$maxDays} days long.";

                return redirect()->back()->withInput()->with('error', $message);
            }
        }

        $leave = LeaveRequest::create([
            'employee_id' => $employeeId,
            'type' => $request->type,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'total_days' => $totalDays,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        $leave->reference_id = 'LR-' . date('Y') . '-' . str_pad($leave->id, 4, '0', STR_PAD_LEFT);
        $leave->save();

        return redirect()->route('employee.leave')->with('success', 'Leave request submitted.');
    }

    public function employeeLeave(Request $request)
    {
        if (session('employee_role') !== 'employee') {
            return redirect()->route('dashboard')->with('error', 'Only employee accounts can view leave requests.');
        }

        $employeeId = session('employee_id');

        $leaveRequests = LeaveRequest::with('employee')
            ->where('employee_id', $employeeId)
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        return view('reports-analytics.employee-leave', compact('leaveRequests'));
    }

    public function index(Request $request)
    {
        $leaveRequests = LeaveRequest::with('employee')
            ->where('status', 'pending')
            ->orderByDesc('id')
            ->paginate(10)
            ->withQueryString();

        $totalSubmitted = LeaveRequest::count();
        $pendingCount = LeaveRequest::where('status', 'pending')->count();

        return view('employee-management.leave-management', compact('leaveRequests', 'totalSubmitted', 'pendingCount'));
    }

    public function show($id)
    {
        $leave = LeaveRequest::with('employee')->findOrFail($id);

        return view('employee-management.leave-approval', [
            'leave' => $leave,
            'employee' => $leave->employee,
            'attachments' => $leave->attachments ?? [],
        ]);
    }

    public function review(Request $request, $id)
    {
        $leave = LeaveRequest::findOrFail($id);

        $request->validate([
            'remarks' => 'nullable|string|max:1000',
        ]);

        $action = $request->input('action');
        $remarks = $request->input('remarks');

        if ($action === 'accept') {
            $leave->status = 'approved';
            $leave->status_note = $remarks;
        } elseif ($action === 'reject') {
            $leave->status = 'rejected';
            $leave->status_note = $remarks;
        }

        $leave->reviewed_by_name = session('employee_name') ?? 'HR';
        $leave->reviewed_by_position = session('employee_position') ?? (session('employee_role') === 'admin' ? 'Administrator' : 'HR');

        $leave->save();

        return redirect()->route('reports-analytics.leave')->with('success', 'Leave reviewed.');
    }
}
