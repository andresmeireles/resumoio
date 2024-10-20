<div>
    <div
        class="fixed inset-0 bg-gray-800 bg-opacity-50 items-center justify-center {{ $showSkillModal ? 'flex flex-col' : 'hidden' }}">

        <div class="bg-white rounded border-slate-600 justify-center w-2/5 p-2 space-y-4">

            <h2 class="text-2xl text-center">Skill</h2>

            <div class="flex w-full flex-col">
                <label class="uppercase">name</label>
                <input wire:model.live="name" type="text" class="rounded border p-2 w-full"/>
            </div>

            <div>
                <div class="uppercase flex justify-between">
                    <span>proficiency</span>
                    <span class="lowercase text-{{$activeColor}}-400">{{$proficiency}}</span>
                </div>

                <div
                    class="rounded flex text-center w-full border bg-{{$activeColor}}-600 divide-white divide-x-2 divide">
                    @foreach(\App\Contracts\Proficiency::cases() as $p)
                        <button wire:click="changeProficiency('{{$p->value}}')"
                                class="w-full p-4 {{ $p->value !== $proficiency ? "hover:bg-".$activeColor."-300" : '' }} bg-{{$activeColor}}-600"
                        >
                            &nbsp;
                        </button>
                    @endforeach
                </div>

                <button class="mt-4 w-full uppercase rounded p-2 bg-blue-500 hover:bg-blue-400 text-white hover:font-semibold">add</button>
            </div>

        </div>

    </div>
</div>
