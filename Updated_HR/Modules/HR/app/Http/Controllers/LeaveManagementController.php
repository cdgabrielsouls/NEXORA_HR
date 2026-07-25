<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LeaveManagementController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::orderBy('id')
            ->paginate(10);

        $totalSubmitted = LeaveRequest::count();
        $pendingCount = LeaveRequest::where('status', 'pending')->count();
        $submittedToday = LeaveRequest::whereDate('created_at', Carbon::today())->count();

        return view(
            'employee-management.leave-management',
            compact('employees', 'totalSubmitted', 'pendingCount', 'submittedToday')
        );
    }

    public function leaveRequests()
    {
        return view('employee-management.leave-request');
    }
}