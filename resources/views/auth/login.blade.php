<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class = "text-center mb-4">
        <h1 class = text-xl font-bold text-gray-900>ログイン画面</h1>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        
         <a href="{{ route('register') }}" 
           class="inline-flex items-center justify-center w-24 px-4 py-2 text-sm font-semibold  
           text-white bg-indigo-600 hover:bg-indigo-700 
           rounded-lg transition duration-150 ease-in-out 
           focus:outline-none focus:ring-2 focus:ring-offset-2
           focus:ring-indigo-500">
            {{ __('登録') }}
        
        </a>

            <x-primary-button class="w-24 px-4 py-3 inline-flex items-center justify-center font-semibold">
                {{ __('ログイン') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>



