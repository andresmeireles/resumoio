<?php

namespace App\Livewire;

use App\Contracts\Proficiency;
use App\Models\Resume;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class SkillModal extends Component
{
    public string $activeColor = 'slate';

    public string $name = '';

    public string $proficiency;

    public bool $showSkillModal = true;

    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
        $this->proficiency = Proficiency::Learning->value;
    }

    public function render(): View
    {
        return view('livewire.skill-modal');
    }

    #[On('open-skill-modal')]
    public function openModal(): void
    {
        $this->showSkillModal = true;
    }

    public function closeModal(): void
    {
        $this->showSkillModal = false;
    }

    public function changeProficiency(string $proficiency): void
    {
        $p = Proficiency::from($proficiency);
        $this->activeColor = $p->color();
        $this->proficiency = $p->value;
    }
}
