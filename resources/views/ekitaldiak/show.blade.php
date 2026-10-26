<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ekitaldia Ikusi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Goiburuko atala eta Atzera botoia -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-white p-6 rounded-lg shadow-sm gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Ekitaldi Guztiak</h3>
                    <p class="text-sm text-gray-500">Aukeratutako ekitaldien zehaztasun eta informazio osoa.</p>
                </div>
                
                <a href="{{ route('ekitaldia.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    &larr; Atzera
                </a>
            </div>

            <!-- Karten sareta (Grid) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($ekitaldiak as $ekitaldia)
                    <div class="bg-white overflow-hidden shadow-md rounded-xl border border-gray-100 flex flex-col justify-between hover:shadow-lg transition-shadow duration-300">
                        
                        <!-- IRUDIA BISTARATZEKO ATALA -->
                        <div class="w-full h-48 bg-gray-200 overflow-hidden">
                            @if ($ekitaldia->image_url)
                                <img src="{{ asset($ekitaldia->image_url) }}" alt="{{ $ekitaldia->izenburua }}" class="w-full h-full object-cover">
                            @else
                                <!-- Irudirik ez balego, lehenetsitako lekua (Placeholder) -->
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <span>Irudirik gabe</span>
                                </div>
                            @endif
                        </div>

                        <div class="p-6">
                            <!-- Kategoria Badge-a eta Prezioa -->
                            <div class="flex justify-between items-center mb-3">
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                    {{ $ekitaldia->kategoria->izena }}
                                </span>
                                <span class="text-lg font-bold text-gray-900">
                                    {{ $ekitaldia->prezioa }} €
                                </span>
                            </div>

                            <!-- Izena -->
                            <h4 class="text-xl font-bold text-gray-900 mb-2">
                                {{ $ekitaldia->izenburua }}
                            </h4>

                            <!-- Deskribapena -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $ekitaldia->deskribapena }}
                            </p>

                            <!-- Aretoa eta Edukiera xehetasunak -->
                            <div class="text-xs text-gray-500 space-y-1 mb-2">
                                <p><strong>Aretoa:</strong> {{ $ekitaldia->aretoa }}</p>
                                <p><strong>Edukiera:</strong> {{ $ekitaldia->edukiera }} lagun</p>
                            </div>
                        </div>

                        <!-- Bottom Actions... -->
                        <div class="bg-gray-50 px-6 py-2 border-t border-gray-100 text-xs font-medium text-gray-500 flex items-center justify-between">
                            <span>Data:</span>
                            <span class="text-gray-700 font-semibold">{{ $ekitaldia->data }}</span>
                        </div>

                        <div class="bg-gray-100 px-6 py-3 border-t border-gray-200 flex items-center justify-end gap-2">
                            <a href="{{ route('ekitaldia.edit', $ekitaldia->id) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
                                Editatu
                            </a>

                            <form action="{{ route('ekitaldia.destroy', $ekitaldia->id) }}" method="POST" onsubmit="return confirm('Ezabatu nahi duzu?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700">
                                    Borratu
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>