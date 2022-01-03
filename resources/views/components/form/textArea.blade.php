@props(['name'])

<x-form.field>

    <x-form.label name="{{ $name }}" />

    <textarea name="{{ $name }}" id="{{ $name }}" class="border border-gray-200 rounded p-2 w-full"
        required {{ $attributes }}>{{ $slot ?? old($name) }}</textarea>

    <x-form.error name="{{ $name }}" />

</x-form.field>
