<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('items.index') }}" class="p-2 bg-white border border-slate-200 rounded-xl text-slate-400 hover:text-brand-primary transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </a>
            <div>
                <h2 class="font-bold text-2xl text-slate-900 leading-tight">
                    {{ __('Edit Barang') }}
                </h2>
                <p class="text-sm text-slate-500 mt-1">Perbarui detail untuk <span class="font-mono font-bold text-brand-primary uppercase">{{ $item->sku }}</span></p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-3xl">
        <form action="{{ route('items.update', $item) }}" method="POST" class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Unit Barang --}}
                    <div>
                        <x-input-label for="unit" :value="__('Unit Barang')" class="font-bold text-slate-700" />
                        <x-text-input id="unit" name="name" type="text"
                                      class="mt-1 block w-full rounded-2xl border-slate-200 focus:ring-4 focus:ring-blue-50"
                                      :value="old('unit', $item->unit)"
                                      required />
                        <x-input-error class="mt-2" :messages="$errors->get('unit')" />
                    </div>

                    {{-- SKU --}}
                    <div>
                        <x-input-label for="sku" :value="__('SKU (Identitas Unik)')" class="font-bold text-slate-700" />
                        <x-text-input id="sku" name="sku" type="text"
                                      class="mt-1 block w-full rounded-2xl border-slate-200 font-mono tracking-wider uppercase bg-slate-50/50"
                                      :value="old('sku', $item->sku)"
                                      required />
                        <x-input-error class="mt-2" :messages="$errors->get('sku')" />
                    </div>
                </div>

                {{-- Kategori --}}
                <div>
                    <x-input-label for="category_id" :value="__('Kategori')" class="font-bold text-slate-700" />
                    <select id="category_id" name="category_id"
                            class="mt-1 block w-full rounded-2xl border-slate-200 shadow-sm focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all outline-none py-2.5 px-4 text-slate-700 border">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
                </div>

                {{-- Deskripsi --}}
                <div>
                    <x-input-label for="description" :value="__('Deskripsi')" class="font-bold text-slate-700" />
                    <textarea id="description" name="description"
                              class="mt-1 block w-full rounded-2xl border-slate-200 shadow-sm focus:border-brand-primary focus:ring-4 focus:ring-blue-50 transition-all min-h-[120px] border px-4 py-2 text-slate-700">{{ old('description', $item->description) }}</textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                {{-- Action Area --}}
                <div class="flex items-center justify-between pt-6 border-t border-slate-100">
                    <p class="text-xs text-slate-400 italic">Dibuat pada: {{ $item->created_at->format('d M Y') }}</p>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('items.index') }}" class="text-sm font-bold text-slate-400 hover:text-slate-600 transition uppercase tracking-widest">Batal</a>

                        <x-primary-button class="px-10 py-3.5 bg-brand-primary rounded-2xl shadow-xl shadow-blue-600/20 active:scale-95 transition-all">
                            {{ __('Perbarui Item') }}
                        </x-primary-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
