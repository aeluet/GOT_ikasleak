<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pertsonaia Ikusi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <!-- Goiburukoa eta Botoiaren edukiontzia -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Pertsonaia Ikusi</h3>
                            <p class="text-sm text-gray-500">Pertsonaiaren datuak.</p>
                        </div>
                        
                        <!-- Submit/Sortu botoia -->
                        <a href="{{ url('/dashboard') }}" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            Atzera
                        </a>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pertsonaia Izena</label>
                            <p class="mt-1 text-sm text-gray-900">{{$character->actor}}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Izen Erreala</label>
                            <p class="mt-1 text-sm text-gray-900">{{$character->name}}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pertsonaia Deskribapena</label>
                            <p class="mt-1 text-sm text-gray-900">{{$character->description}}</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>