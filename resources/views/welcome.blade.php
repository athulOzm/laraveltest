<x-guest-layout>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <x-slot name="slot">
            <a href="{{route('member.create')}}">Reg here</a>
        </x-slot>
    </x-auth-card>
</x-guest-layout>