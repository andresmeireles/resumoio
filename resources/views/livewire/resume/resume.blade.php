<div class="flex w-full">
    <div class="flex-col w-full p-4 space-y-3">
        <h2 class="text-2xl">Personal Information</h2>
        <div class="w-full flex gap-1">
            <div class="flex flex-col space-y-3 w-full">
                <label class="uppercase" for="name">name</label>
                <input type="text" id="name" class="p-2 rounded border"/>
            </div>
            <div class="flex flex-col space-y-3 w-full">
                <label class="uppercase" for="lastname">lastname</label>
                <input type="text" id="lastname" class="p-2 rounded border"/>
            </div>
        </div>
        <div class="w-full flex">
            <div class="flex flex-col space-y-3 w-full">
                <label class="uppercase" for="position">position</label>
                <input type="text" id="position" class="p-2 rounded border"/>
            </div>
        </div>
        <div class="w-full flex gap-1">
            <div class="flex flex-col space-y-3 w-full">
                <label class="uppercase" for="phone">phone</label>
                <input type="text" id="phone" class="p-2 rounded border"/>
            </div>
            <div class="flex flex-col space-y-3 w-full">
                <label class="uppercase" for="email">email</label>
                <input type="text" id="email" class="p-2 rounded border"/>
            </div>
        </div>
        <h2 class="text-2xl">Professional Experience</h2>
        <button wire:click.prevent="openModal" class="text-blue-400 hover:text-blue-500 transform">+ add experience
        </button>
        <div class="flex flex-col space-y-3">
            @foreach($resume->experiences as $experience)
                <div class="w-full flex gap-2 border rounded p-2">
                    <div class="flex flex-col w-4/5">
                        <span>{{$experience->job}} at {{$experience->employer}}</span>
                        <span>from {{$experience->start_date->format('Y-m-d')}} to {{$experience->end_date?->format('Y-m-d') ?? 'Present' }}</span>
                    </div>
                    <div class="flex justify-end items-center w-1/5">
                        <button wire:confirm="confirm exclusion of experience" wire:click="removeExperience({{$experience->id}})" class="hover:text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M7 21q-.825 0-1.412-.587T5 19V6q-.425 0-.712-.288T4 5t.288-.712T5 4h4q0-.425.288-.712T10 3h4q.425 0 .713.288T15 4h4q.425 0 .713.288T20 5t-.288.713T19 6v13q0 .825-.587 1.413T17 21zM17 6H7v13h10zm-7 11q.425 0 .713-.288T11 16V9q0-.425-.288-.712T10 8t-.712.288T9 9v7q0 .425.288.713T10 17m4 0q.425 0 .713-.288T15 16V9q0-.425-.288-.712T14 8t-.712.288T13 9v7q0 .425.288.713T14 17M7 6v13z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <h2 class="text-2xl capitalize">skills</h2>

        <button class="text-blue-400 hover:text-blue-500 transform" wire:click="openSkillModal">+ add skills</button>
    </div>
    <div class="w-full bg-slate-400">
        conteudo
    </div>

    <livewire:modal :resume="$resume"/>
    <livewire:skill-modal :resume="$resume" />
</div>
