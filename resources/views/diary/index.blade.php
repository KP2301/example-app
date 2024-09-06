<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Diary') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('diary.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150 mb-4">
                        {{ __('Add New Entry') }}
                    </a>

                    @foreach($diaryEntries as $entry)
                    
                        <div class="mb-6 p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md">
                            <h3 class="text-xl font-bold mb-2">{{ $entry->date->format('F j, Y') }}</h3>
                            <p class="text-gray-800 dark:text-gray-200">{{ $entry->content }}</p>
                            <!-- Display emotions -->
                            @if($entry->emotions->isNotEmpty())
                            <div class="mt-4">
                                <h4 class="text-lg font-semibold mb-2">Emotions</h4>
                                <ul class="list-disc pl-5">
                                    @foreach($entry->emotions as $emotion)
                                    <li class="text-gray-700 dark:text-gray-300">
                                    {{ $emotion->name }} (Intensity: {{ $emotion->pivot->intensity }})
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="mt-4 flex justify-end">
                                <x-primary-button style="margin-right: 10px;" onclick="window.location.href='{{ route('diary.edit', $entry) }}'">
                                    {{ __('Edit') }}
                                </x-primary-button>
                            
                                <form method="POST" action="{{ route('diary.destroy', $entry) }}" id="delete-form-{{ $entry->id }}" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button>
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </form>
                            </div>                            
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('status') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#3085d6'
                });
            @endif
        });

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>
</x-app-layout>