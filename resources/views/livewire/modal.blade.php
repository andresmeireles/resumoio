<div class="text-sm">

    <div x-data="">

        <div
            class="fixed inset-0 bg-gray-800 bg-opacity-50 items-center justify-center {{ $show ? 'flex flex-col' : 'hidden' }}"
        >

            <div class="bg-white rounded border-slate-600 justify-center w-8/12 p-2 space-y-4">

                @if($errorMessage !== '')
                    <div class="bg-red-400 rounded w-full p-2 items-center text-center text-white uppercase">
                        {{$errorMessage}}
                    </div>
                @endif

                <div class="flex justify-between">
                    <span></span>
                    <span class="text-xl capitalize w-full flex justify-center my-1">experience</span>
                    <button wire:click="closeModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z"/>
                        </svg>
                    </button>
                </div>

                <div class="flex gap-3 w-full">
                    <div class="flex flex-col w-full">
                        <labe class="uppercase">job*</labe>
                        <input wire:model.live="job" type="text" class="rounded border p-2"/>
                        @if($errorMessage !== '' && $job === '')
                            <span class="text-red-600 w-full">invalid jobname</span>
                        @endif
                    </div>
                    <div class="flex flex-col w-full">
                        <labe class="uppercase">emplyer*</labe>
                        <input wire:model.live="employer" type="text" class="rounded border p-2"/>
                        @if($errorMessage !== '' && $employer === '')
                            <span class="text-red-600 w-full">invalid employer</span>
                        @endif
                    </div>
                </div>

                <div class="flex gap-3 w-full">
                    <div class="flex w-1/2 space-x-1">
                        <div class="flex flex-col w-full">
                            <div class="uppercase flex justify-between">
                                <span>dates</span>
                                <div>
                                    <label for="current">
                                        <input id="current" wire:model.live="current" type="checkbox">
                                        <span class="text-xs">
                                        current job
                                    </span>
                                    </label>
                                </div>
                            </div>
                            <div class="flex gap-2 w-full">
                                <input x-datepicker value="{{$start}}" wire:model.live="start" type="text"
                                       class="w-1/2 rounded border p-2"/>
                                <input
                                    x-datepicker
                                    wire:model.live="end"
                                    type="text"
                                    {{ $current ? 'disabled' : '' }}
                                    class="w-1/2 rounded border p-2
                                    disabled:bg-slate-200 disabled:placeholder-slate-600 disabled:text-center"
                                    placeholder="{{ $current ? 'actual' : '' }}"
                                />
                            </div>
                            <div class="flex gap-2 w-full">
                                @if($errorMessage !== '' && $start === '')
                                    <span class="text-red-600 w-full">invalid start date</span>
                                @endif
                                @if($errorMessage !== '' && $end === '')
                                    <span class="text-red-600 w-full">invalid end date</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col w-1/2">
                        <label class="uppercase">city</label>
                        <input wire:model.live="city" type="text" class="rounded border p-2"/>
                    </div>
                </div>

                <div class="flex flex-col space-y-2">
                    <label class="uppercase">description</label>
                    <textarea wire:model.live="description" class="p-2 rounded border resize-none" rows="8"></textarea>
                </div>

                <button
                    class="uppercase p-2 rounded border bg-blue-400 hover:bg-blue-500 hover:font-semibold text-white w-full"
                    wire:click.prevent="sendExperienceData"
                >
                    adicionar
                </button>
            </div>
        </div>
    </div>

</div>
