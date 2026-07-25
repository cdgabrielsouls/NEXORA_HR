<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$employee = App\Models\Employee::first();
if (! $employee) { echo "no employee\n"; exit; }
try {
    $html = view('employees.employee-profile', compact('employee'))->render();
    // print a small verification snippet
    echo "NAME:" . ($employee->first_name ?? '') . ' ' . ($employee->last_name ?? '') . PHP_EOL;
    // show presence of key fields in rendered html
    echo (strpos($html, htmlspecialchars($employee->first_name)) !== false) ? "OK: first name present\n" : "MISSING: first name\n";
    echo (strpos($html, htmlspecialchars($employee->company_email ?? $employee->email ?? '')) !== false) ? "OK: email present\n" : "MISSING: email\n";
} catch (Throwable $e) {
    echo 'ERROR: ' . $e->getMessage() . PHP_EOL;
}
