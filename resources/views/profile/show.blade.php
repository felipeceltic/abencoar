<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div
                        class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                        <div class="grid grid-cols-6 gap-6">
                            <form action="{{ route('createUpdatePlayer', Auth::user()->id) }}" method="post">
                                @csrf
                                <div class="col-span-6 sm:col-span-4">
                                    <input type="number" name="number" id="number"
                                        value="{{ Auth::user()->player->number }}">
                                </div>
                                <div class="col-span-6 sm:col-span-4">
                                    <select name="position" id="position">
                                        <option value="GK" @if (Auth::user()->player->position == 'GK') selected @endif>Goleiro
                                        </option>
                                        <option value="DF" @if (Auth::user()->player->position == 'DF') selected @endif>
                                            Defensor
                                        </option>
                                        <option value="MC" @if (Auth::user()->player->position == 'MC') selected @endif>Meia
                                        </option>
                                        <option value="AT" @if (Auth::user()->player->position == 'AT') selected @endif>
                                            Atacante
                                        </option>
                                    </select>
                                </div>
                                <div
                                    class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-800 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                                    <button type="submit">Salvar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <x-section-border />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
