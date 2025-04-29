<x-app-layout>
    <div class="mx-auto">
        {{ Breadcrumbs::render('profile') }}
    </div>


    <div class="mx-auto mt-2">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-2">
            <div class="max-w-xl">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-2">
            <div class="max-w-xl">
                <livewire:profile.update-password-form />
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg mt-2">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</x-app-layout>
