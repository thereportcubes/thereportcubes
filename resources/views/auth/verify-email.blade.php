<x-guest-layout>
    <form method="POST" action="{{ route('verification.send') }}">
    <div class="row" style="height: auto !important;">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="row" style="height: auto !important;">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif
        <div class="row">
            @csrf
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="row button">
            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
            </div>
        </form>
</x-guest-layout>
