<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
$rows = Illuminate\Support\Facades\DB::select("select lr.id, lr.employee_id, e.first_name, e.last_name, e.company_email, lr.type, lr.from_date, lr.to_date, lr.total_days, lr.status, lr.created_at from leave_requests lr left join employees e on e.id = lr.employee_id order by lr.id desc limit 20");
foreach ($rows as $r) {
    echo json_encode((array)$r) . PHP_EOL;
}
