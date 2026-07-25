<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use App\Models\LeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeViewController extends Controller
{
    public function employeeIndex()
    {
        $employeeCount = Employee::count();
        $isHr = session('employee_role') === 'admin'
            || strtolower(trim(session('employee_department', ''))) === 'human resources';

        $employeeId = session('employee_id');
        $today = Carbon::today('Asia/Manila');
        $startOfWeek = (clone $today)->startOfWeek(Carbon::MONDAY);
        $year = $today->year;
        $month = $today->month;

        $weeklyWorkingMinutes = 0;
        $workHoursByMonth = array_fill(1, 12, 0.0);
        $leaveMonthlyRequests = 0;
        $leaveMonthlyApproved = 0;
        $leaveYearlyRequests = 0;
        $leaveYearlyApproved = 0;

        if ($employeeId) {
            $weeklyWorkingMinutes = Attendance::where('employee_id', $employeeId)
                ->whereNotNull('time_in')
                ->whereNotNull('time_out')
                ->whereBetween('attendance_date', [$startOfWeek->toDateString(), $today->toDateString()])
                ->get()
                ->sum(fn (Attendance $attendance) => $attendance->elapsedWorkMinutes() ?? 0);

            foreach (range(1, 12) as $monthIndex) {
                $monthMinutes = Attendance::where('employee_id', $employeeId)
                    ->whereNotNull('time_in')
                    ->whereNotNull('time_out')
                    ->whereYear('attendance_date', $year)
                    ->whereMonth('attendance_date', $monthIndex)
                    ->get()
                    ->sum(fn (Attendance $attendance) => $attendance->elapsedWorkMinutes() ?? 0);

                $workHoursByMonth[$monthIndex] = round($monthMinutes / 60, 1);
            }

            $leaveMonthlyRequests = LeaveRequest::where('employee_id', $employeeId)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->count();

            $leaveMonthlyApproved = LeaveRequest::where('employee_id', $employeeId)
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->where('status', 'approved')
                ->count();

            $leaveYearlyRequests = LeaveRequest::where('employee_id', $employeeId)
                ->whereYear('created_at', $year)
                ->count();

            $leaveYearlyApproved = LeaveRequest::where('employee_id', $employeeId)
                ->whereYear('created_at', $year)
                ->where('status', 'approved')
                ->count();
        }

        $weeklyWorkingHours = round($weeklyWorkingMinutes / 60, 1);
        $maxMonthHours = max($workHoursByMonth) ?: 1;

        return view('dashboard.employee-dashboard', compact(
            'employeeCount',
            'isHr',
            'weeklyWorkingHours',
            'workHoursByMonth',
            'maxMonthHours',
            'leaveMonthlyRequests',
            'leaveMonthlyApproved',
            'leaveYearlyRequests',
            'leaveYearlyApproved'
        ));
    }
}