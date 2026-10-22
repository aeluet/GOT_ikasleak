<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Character') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Formularioaren edukiontzia pixka bat estuago eta txukunago jartzeko (aukerakoa, max-w-xl) -->
                    <div class="max-w-2xl mx-auto">
                        
                        <form action="{{ url('/characters/' . $character->id) }}" method="POST" class="space-y-6">
                            @csrf
                            @method('PUT')

                            <!-- Erroreen Kudeaketa Orokorra -->
                            @if ($errors->any())
                                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-md" role="alert">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <!-- Errore ikonoa -->
                                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.424 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-red-800">
                                                Mesedez, zuzendu formularioan agertzen diren erroreak:
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Character Name Field -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Character name</label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" value="{{ old('name', $character->name) }}"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('name') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                                </div>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Actor Field -->
                            <div>
                                <label for="actor" class="block text-sm font-medium text-gray-700">Actor</label>
                                <div class="mt-1">
                                    <input type="text" id="actor" name="actor" value="{{ old('actor', $character->actor) }}"
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('actor') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">
                                </div>
                                @error('actor')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <div class="mt-1">
                                    <textarea id="description" name="description" rows="4" placeholder="Pertsonaiaren deskribapena..."
                                        class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md @error('description') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @enderror">{{ old('description', $character->description) }}</textarea>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex justify-end">
                                <button type="submit" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Submit
                                </button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>