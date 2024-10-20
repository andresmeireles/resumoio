<?php

namespace App\Contracts;

enum Proficiency: string
{
    case Learning = 'learning';
    case Beginner = 'beginner';
    case Intermediate = 'intermediate';
    case Advanced = 'advanced';
    case Expert = 'expert';

    public function color(): string
    {
        return match ($this) {
            self::Learning => 'slate',
            self::Beginner => 'red',
            self::Intermediate => 'green',
            self::Advanced => 'blue',
            self::Expert => 'amber',
        };
    }
}
