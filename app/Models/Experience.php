<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Experience extends Model
{
    protected $fillable = [
        'resume_id',
        'employer',
        'description',
        'city',
        'job',
        'display',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public $timestamps = false;

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'date',
            'end_date' => 'date',
            'display' => 'boolean',
        ];
    }
}
