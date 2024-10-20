<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Resume;
use App\Models\Experience;

class AddExperience
{
    public function execute(Resume $resume, array $parameters): Experience|Error
    {
        $exists = Experience::where('resume_id', $resume->id)
            ->where('job', $parameters['job'])
            ->where('employer', $parameters['employer'])
            ->exists();

        if ($exists) {
            return Errors::DuplicateExperience;
        }

        $parameters['resume_id'] = $resume->id;

        return Experience::create($parameters);
    }
}
