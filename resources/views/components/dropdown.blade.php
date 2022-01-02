@props(['trigger'])

<div x-data="{ open: false }" class="relative">

    {{-- Trigger --}}

    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    {{-- Dropdown Links --}}

    <div x-show="open" @click.outside="open = false"
        class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 overflow-auto max-h-52">

        {{ $slot }}

    </div>

</div>
