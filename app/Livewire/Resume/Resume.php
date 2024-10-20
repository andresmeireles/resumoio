<?php

declare(strict_types=1);

namespace App\Livewire\Resume;

use App\Models\Experience;
use App\Models\Resume as ResumeModel;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Resume extends Component
{
    public ResumeModel $resume;

    public function mount(): void
    {
        $this->resume = ResumeModel::first();
    }

    public function render(): View
    {
        return view('livewire.resume.resume');
    }

    public function openModal(): void
    {
        $this->dispatch('open-modal');
    }
    
    public function openSkillModal(): void
    {
        $this->dispatch('open-skill-modal');
    }

    public function removeExperience(int $id): void
    {
        Experience::find($id)->delete();
    }

    #[On('reset-resume')]
    public function resetResume(): void
    {
        $this->resume = ResumeModel::find($this->resume->id);
    }
}
