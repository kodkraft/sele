<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">

        </x-slot>

        <div class="row">
            <div class="col-md-6 offset-3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="mb-3">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <div class="mb-3 form-check">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" class="form-check-input" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <x-jet-button class="btn btn-primary">
                        {{ __('Log in') }}
                    </x-jet-button>
                </form>
            </div>
        </div>


        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

    </x-jet-authentication-card>
</x-guest-layout>
