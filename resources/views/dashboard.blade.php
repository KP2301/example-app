<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <center>
                    <div class="grid gap-y-4 p-6 text-gray-900 dark:text-gray-100">
                        <div>{{"Hi I'm Kittiwin From CPE CMU"}}</div>
                        <div><img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" 
                        alt="Profile Photo" class="w-32 h-32 object-cover rounded-full"></div>
                        <div>{{"My ID is 650610747"}}</div>
                        <div>{{ __("You're logged in!") }}</div>
                    </div>
                </center>
            </div>
        </div>
    </div>
</x-app-layout>
