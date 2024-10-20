<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'resume_id',
        'name',
        'proficiency',
    ];

    public function resume(): BelongsTo
    {
        return $this->belongsTo(Resume::class);
    }
}
