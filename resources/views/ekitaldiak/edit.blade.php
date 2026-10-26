<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ekitaldia Editatu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 sm:p-8">
                
                <!-- Goiburukoa -->
                <div class="mb-6 flex justify-between items-center border-b pb-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Zuzendu ekitaldiaren datuak</h3>
                        <p class="text-sm text-gray-500">Aldatu beheko inprimakiko eremuak eta gorde aldaketak.</p>
                    </div>
                    <a href="{{ route('ekitaldia.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900">
                        &larr; Utzi eta itzuli
                    </a>
                </div>

                <!-- Formularioa -->
                <form action="{{ route('ekitaldia.update', $ekitaldia->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Izena / Izenburua -->
                    <div>
                        <label for="izenburua" class="block text-sm font-medium text-gray-700">Ekitaldiaren Izena</label>
                        <input type="text" name="izenburua" id="izenburua" value="{{ old('izenburua', $ekitaldia->izenburua) }}" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @error('izenburua')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Deskribapena -->
                    <div>
                        <label for="deskribapena" class="block text-sm font-medium text-gray-700">Deskribapena</label>
                        <textarea name="deskribapena" id="deskribapena" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('deskribapena', $ekitaldia->deskribapena) }}</textarea>
                        @error('deskribapena')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Grid bi zutabetarako: Aretoa eta Edukiera -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Aretoa -->
                        <div>
                            <label for="aretoa" class="block text-sm font-medium text-gray-700">Aretoa</label>
                            <input type="text" name="aretoa" id="aretoa" value="{{ old('aretoa', $ekitaldia->aretoa) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('aretoa')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Edukiera -->
                        <div>
                            <label for="edukiera" class="block text-sm font-medium text-gray-700">Edukiera</label>
                            <input type="number" name="edukiera" id="edukiera" value="{{ old('edukiera', $ekitaldia->edukiera) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('edukiera')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Grid bi zutabetarako: Data eta Prezioa -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Data -->
                        <div>
                            <label for="data" class="block text-sm font-medium text-gray-700">Data</label>
                            <input type="date" name="data" id="data" value="{{ old('data', $ekitaldia->data) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('data')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Prezioa -->
                        <div>
                            <label for="prezioa" class="block text-sm font-medium text-gray-700">Prezioa (€)</label>
                            <input type="number" step="0.01" name="prezioa" id="prezioa" value="{{ old('prezioa', $ekitaldia->prezioa) }}" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('prezioa')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Kategoria -->
                    <div>
                        <label for="kategoria_id" class="block text-sm font-medium text-gray-700">Kategoria</label>
                        <select name="kategoria_id" id="kategoria_id" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @foreach ($kategoriak as $kategoria)
                                <option value="{{ $kategoria->id }}" {{ old('kategoria_id', $ekitaldia->kategoria_id) == $kategoria->id ? 'selected' : '' }}>
                                    {{ $kategoria->izena }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategoria_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Botoiak -->
                    <div class="flex items-center justify-end gap-4 pt-4 border-t">
                        <a href="{{ route('ekitaldia.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 text-xs font-semibold uppercase tracking-widest rounded-md hover:bg-gray-300 transition duration-150">
                            Utzi
                        </a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white text-xs font-semibold uppercase tracking-widest rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150">
                            Gorde Aldaketak
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>