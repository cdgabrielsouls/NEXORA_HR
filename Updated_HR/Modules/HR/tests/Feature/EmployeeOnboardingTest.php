<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class EmployeeOnboardingTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('migrate:fresh', ['--seed' => false]);
    }

    public function test_step_one_keeps_partial_data_when_validation_fails(): void
    {
        $this->withSession([
            'employee_logged_in' => true,
            'employee_role' => 'hr',
            'employee_department' => 'human resources',
        ])->post('/onboarding/step1', [
            'first_name' => 'John',
            'middle_name' => 'A',
            'address' => '123 Main St',
            'email' => '',
            'phone' => '09171234567',
        ]);

        $this->assertSame('John', session('step1.first_name'));
        $this->assertSame('123 Main St', session('step1.address'));

        $response = $this->withSession([
            'employee_logged_in' => true,
            'employee_role' => 'hr',
            'employee_department' => 'human resources',
        ])->get('/onboarding/step1');

        $response->assertStatus(200);
        $response->assertSee('John');
        $response->assertSee('123 Main St');
    }
}
