<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Resume extends Model
{
    protected $fillable = [
        'model_id',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function resumeModel(): BelongsTo
    {
        return $this->belongsTo(ResumeModel::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'resume_id');
    }
}
