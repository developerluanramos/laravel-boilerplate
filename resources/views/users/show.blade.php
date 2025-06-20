<x-app-layout>
    {{\Diglactic\Breadcrumbs\Breadcrumbs::render('users', $user->name)}}
    <div class="mx-auto mt-2">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
            <!-- Header Section -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">
                    User Details
                </h2>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Profile information for {{ $user->name }}
                </p>
            </div>

            <!-- Main Content -->
            <div class="grid md:grid-cols-3 gap-6 p-6">
                <!-- Profile Column -->
                <div class="md:col-span-1">
                    <div class="flex flex-col items-center">
                        <div class="w-32 h-32 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                            <img
                                src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->name }}'s profile photo"
                                class="w-full h-full object-cover"
                            >
                        </div>

                        <div class="mt-4 text-center">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                                {{ $user->name }}
                            </h3>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $user->role->name }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Details Column -->
                <div class="md:col-span-2 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                                Email Address
                            </label>
                            <p class="mt-1 text-gray-800 dark:text-gray-200">
                                {{ $user->email }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                                Account Status
                            </label>
                            <p class="mt-1">
                                <x-badge-success texto="Active" />
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                                Registered
                            </label>
                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $user->created_at->format('M d, Y') }}
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                                Last Updated
                            </label>
                            <p class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                {{ $user->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>

                    <!-- Additional Info Section -->
                    <div class="mt-6 border-t border-gray-200 dark:border-gray-700 pt-4">
                        <h4 class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-2">
                            Additional Information
                        </h4>
                        <dl class="grid grid-cols-2 gap-4">
                            <div>
                                <dt class="text-sm text-gray-500 dark:text-gray-400">
                                    Email Verified
                                </dt>
                                <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $user->email_verified_at ? 'Verified' : 'Pending' }}
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm text-gray-500 dark:text-gray-400">
                                    Two-Factor Auth
                                </dt>
                                <dd class="mt-1 text-sm text-gray-800 dark:text-gray-200">
                                    {{ $user->two_factor_enabled ? 'Enabled' : 'Disabled' }}
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Footer Actions -->
            <div class="px-6 py-4 bg-gray-50 dark:bg-gray-700 border-t border-gray-200 dark:border-gray-700">
                <div class="flex justify-end space-x-4">
                    <x-action-alert
                        :route="route('users.inactivate', $user)"
                        :texto="'Bloquear o usuário '.$user->name"
                        :identify="$user->id">
                    </x-action-alert>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

