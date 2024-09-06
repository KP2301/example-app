<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Diary') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    <!-- Display user greeting -->
                    <h1 class="text-2xl font-bold mb-4">{{ __('Hello, ') . Auth::user()->name . '!' }}</h1>
                    <p class="mt-4"><b>{{ __("How was your day? Create Diary Entry Here") }}</b></p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to create a new diary entry -->
                    <form method="POST" action="{{ route('diary.store') }}">
                        @csrf
                
                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date</label>
                            <input type="date" id="date" name="date" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100" value="{{ old('date') }}" required>
                            @error('date')
                                <div class="text-red-500 text-sm">{{ $message }}</div> <!-- Displaying the error message -->
                            @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Content</label>
                            <textarea id="content" name="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100" required>{{ old('content') }}</textarea>
                            @error('content')
                                <div class="text-red-500 text-sm">{{ $message }}</div> <!-- Displaying the error message -->
                            @enderror
                        </div>

                        {{-- Emotion --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Select Emotions
                        </label>
                        <!-- Grid layout for emotions -->
                        <div class="grid grid-cols-1 gap-4">
                            @foreach ($emotions as $emotion)
                            <div class="flex items-center mb-4">
                                <!-- Checkbox and label container -->
                                <input type="checkbox" id="emotion_{{ $emotion->id }}" name="emotions[]" value="{{ $emotion->id }}"
                                    class="h-5 w-5 text-indigo-600 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-indigo-600"
                                    onchange="toggleIntensityInput({{ $emotion->id }})">
                                
                                <label for="emotion_{{ $emotion->id }}" class="ml-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                                    {{ $emotion->name }}
                                </label>

                                <!-- Intensity input container, initially hidden -->
                                <div class="ml-4 hidden flex-1" id="intensity_container_{{ $emotion->id }}">
                                    <input type="number" name="intensity[{{ $emotion->id }}]"
                                        class="w-full border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-gray-100 dark:border-gray-600 focus:ring-indigo-500 focus:border-indigo-500"
                                        placeholder="Intensity" min="1" max="10">
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @error('emotions')
                        <div class="text-red-500 text-sm mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <script>
                        // Function to toggle the visibility of the intensity input
                        function toggleIntensityInput(emotionId) {
                            var checkbox = document.getElementById('emotion_' + emotionId);
                            var intensityContainer = document.getElementById('intensity_container_' + emotionId);

                            // Show intensity input if checkbox is checked
                            if (checkbox.checked) {
                                intensityContainer.classList.remove('hidden');
                            } else {
                                intensityContainer.classList.add('hidden');
                            }
                        }
                    </script>

                
                        <x-primary-button>{{ __('Save Entry') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <center>
        <!-- Back to Previous Page Button -->
        <x-secondary-button onclick="disableFormSubmissionAndGoBack()" >
            {{ __('Back to Previous') }}
        </x-secondary-button>
    </center>

    <script>
        function disableFormSubmissionAndGoBack() {
            window.onbeforeunload = null;  // Disable any beforeunload alert.
            window.history.back();  // Navigate back to the previous page.
        }
    </script>
</x-app-layout>