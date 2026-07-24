<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveManagementController extends Controller
{
    public function index(Request $request)
    {
        $employees = Employee::orderBy('id')
            ->paginate(10);

        return view(
            'employee-management.leave-management',
            compact('employees')
        );
    }

    public function leaveRequests()
    {
        return view('employee-management.leave-request');
    }
}