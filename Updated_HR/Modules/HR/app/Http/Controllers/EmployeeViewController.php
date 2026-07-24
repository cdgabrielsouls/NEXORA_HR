<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeViewController extends Controller
{
    public function employeeIndex()
    {
        $employeeCount = Employee::count();
        $isHr = session('employee_role') === 'admin'
            || strtolower(trim(session('employee_department', ''))) === 'human resources';

        return view('dashboard.employee-dashboard', compact('employeeCount', 'isHr'));
    }
}