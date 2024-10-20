<?php

namespace App\Actions;

enum Errors implements Error
{
    case DuplicateExperience;

    public function message(): string
    {
        return match ($this) {
            self::DuplicateExperience => 'Experience already exists',
        };
    }
}
