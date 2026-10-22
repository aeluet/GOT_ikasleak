<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <x-flash-messages />
                    @if (auth()->user()->role === \App\Enums\UserRole::Admin)

                        <h1>hau Admin erabiltzailea da</h1>
                    @endif

                    <!-- Goiburukoa eta Botoiaren edukiontzia -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Pertsonaien Zerrenda</h3>
                            <p class="text-sm text-gray-500">Filmeko edo telesaileko pertsonaiak eta haien aktoreak.</p>
                        </div>
                        
                        <!-- Submit/Sortu botoia -->
                        <a href="{{ url('/submit') }}" style="background-color: #4f46e5; color: #ffffff;" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            {{ __('+ Pertsonaia Berria') }}
                        </a>
                    </div>

                    <!-- Taula edukiontzia mugikorretarako moldagarria izan dadin -->
                    <div class="overflow-x-auto border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 text-left">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Pertsonaia</th>
                                    <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">Benetako Izena</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($characters as $character)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $character->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $character->actor }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ url('characters/' . $character->id) }}" class="text-indigo-600 hover:text-indigo-900">Ikusi</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <a href="{{ url('characters/' . $character->id . '/edit') }}" class="text-indigo-600 hover:text-indigo-900">Editatu</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <form method="POST" action="{{ url('/characters/' . $character->id) }}">
                                                @csrf
                                                @method('DELETE')

                                                <button style="color: red;" onclick="return confirm('Seguru zaude pertsonaia hau borratu nahi duzula?')">Borratu</button>
                                            </form> 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>