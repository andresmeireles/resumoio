<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\AddExperience;
use App\Actions\Error;
use App\Models\Resume;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class Modal extends Component
{
    public string $errorMessage = '';

    public bool $show = false;

    public string $job = '';

    public string $employer = '';

    public string $description = '';

    public string $city = '';

    public string $start = '';

    public ?string $end = '';

    public bool $current = false;

    public Resume $resume;

    public function mount(Resume $resume): void
    {
        $this->resume = $resume;
    }

    public function updatedStart(string $date): void
    {
        $validDate = $this->createValidDate($date);
        if ($validDate === false) {
            $this->errorMessage = 'invalid date';
        }

        $this->start = $validDate->format('d/m/Y');
    }

    public function updatedEnd(string $date): void
    {
        $validDate = $this->createValidDate($date);
        if ($validDate === false) {
            $this->errorMessage = 'invalid date';
        }

        $this->end = $validDate->format('d/m/Y');
    }

    public function updatedCurrent(): void
    {
        if ($this->current === true) {
            $this->end = null;
        }
    }

    public function render(): View
    {
        return view('livewire.modal');
    }

    public function closeModal(): void
    {
        $this->cleanForm();
        $this->show = false;
    }

    #[On('open-modal')]
    public function openModal(): void
    {
        $this->show = true;
    }

    public function sendExperienceData(AddExperience $addExperience): void
    {
        $this->errorMessage = '';

        if (
            trim($this->employer) === '' ||
            trim($this->job) === '' ||
            trim($this->start) === '' ||
            (! $this->current && trim($this->end) === '')
        ) {
            $this->errorMessage = 'error when add professional experience';

            return;
        }

        $add = $addExperience->execute(
            $this->resume,
            [
                'job' => $this->job,
                'employer' => $this->employer,
                'description' => $this->description,
                'city' => $this->city,
                'start_date' => $this->createValidDate($this->start, 'd/m/Y'),
                'end_date' => $this->current ? null : $this->createValidDate($this->end, 'd/m/Y'),
            ]
        );

        if ($add instanceof Error) {
            $this->errorMessage = $add->message();

            return;
        }

        $this->cleanForm();
        $this->show = false;
        $this->dispatch('reset-resume');
    }

    private function cleanForm(): void
    {
        $this->end = '';
        $this->start = '';
        $this->job = '';
        $this->employer = '';
        $this->city = '';
        $this->description = '';
        $this->errorMessage = '';
    }

    private function createValidDate(string $date, string $format = 'Y-m-d'): \DateTimeInterface|false
    {
        $createdDate = \DateTime::createFromFormat($format, $date);
        if (! $createdDate) {
            return false;
        }

        if ($createdDate->format($format) !== $date) {
            return false;
        }

        return $createdDate;
    }
}
