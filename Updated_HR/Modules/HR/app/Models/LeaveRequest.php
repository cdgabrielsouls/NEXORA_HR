<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LeaveRequest extends Model
{
    protected $fillable = [
        'employee_id',
        'type',
        'from_date',
        'to_date',
        'total_days',
        'reason',
        'attachments',
        'status',
        'status_note',
        'reference_id',
        'reviewed_by_name',
        'reviewed_by_position',
    ];

    protected $casts = [
        'attachments' => 'array',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
