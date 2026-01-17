<x-app-layout>
    <x-slot name="header">
        {{ __('Profil Pengguna') }}
    </x-slot>

    <div class="space-y-8">
        <div class="p-8 bg-white border border-slate-200 rounded-3xl shadow-sm shadow-slate-200/50">
            @include('profile.partials.update-profile-information-form')
        </div>

        <div class="p-8 bg-white border border-slate-200 rounded-3xl shadow-sm shadow-slate-200/50">
            @include('profile.partials.update-password-form')
        </div>

        <div class="p-8 bg-white border border-slate-200 rounded-3xl shadow-sm shadow-slate-200/50">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
</x-app-layout>
