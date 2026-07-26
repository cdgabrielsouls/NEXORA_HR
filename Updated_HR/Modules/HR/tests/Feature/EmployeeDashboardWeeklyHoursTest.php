<?php

namespace Tests\Feature;

use App\Http\Controllers\EmployeeViewController;
use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeDashboardWeeklyHoursTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_returns_weekly_working_hours_and_days_for_the_current_week(): void
    {
        $employee = Employee::create([
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'email' => 'jane@example.com',
        ]);

        $today = Carbon::today('Asia/Manila');
        $startOfWeek = (clone $today)->startOfWeek(Carbon::MONDAY);

        Attendance::create([
            'employee_id' => $employee->id,
            'attendance_date' => $startOfWeek->copy()->addDays(1)->toDateString(),
            'time_in' => '08:00:00',
            'time_out' => '17:30:00',
            'status' => 'Present',
        ]);

        Attendance::create([
            'employee_id' => $employee->id,
            'attendance_date' => $today->toDateString(),
            'time_in' => '08:00:00',
            'time_out' => '16:00:00',
            'status' => 'Present',
        ]);

        Attendance::create([
            'employee_id' => $employee->id,
            'attendance_date' => $today->copy()->subDays(8)->toDateString(),
            'time_in' => '08:00:00',
            'time_out' => '17:00:00',
            'status' => 'Present',
        ]);

        session([
            'employee_id' => $employee->id,
            'employee_name' => 'Jane Doe',
            'employee_role' => 'employee',
            'employee_department' => 'Engineering',
        ]);

        $view = (new EmployeeViewController())->employeeIndex();

        $this->assertSame(12.5, $view->getData()['weeklyWorkingHours']);
        $this->assertSame(2, $view->getData()['weeklyWorkingDays']);
    }
}
