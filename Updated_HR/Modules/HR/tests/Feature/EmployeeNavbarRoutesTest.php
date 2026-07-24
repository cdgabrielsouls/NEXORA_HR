<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class EmployeeNavbarRoutesTest extends TestCase
{
    public function test_employee_navigation_routes_are_defined(): void
    {
        $this->assertTrue(Route::has('employee.attendance'));
        $this->assertTrue(Route::has('employee.leave'));
    }
}
