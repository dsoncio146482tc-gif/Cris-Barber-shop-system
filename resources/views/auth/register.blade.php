@extends('layouts.app', ['title' => 'Create account | Cris Barber Shop'])

@section('content')
<main class="page">
    <section class="card">
        <div class="brand">Cris Barber Shop</div>
        <h1>{{ auth()->check() ? 'Create a barber account' : 'Create the administrator account' }}</h1>
        <p class="muted">
            @if (auth()->check())
                Add a barber who can securely access their own workspace.
            @else
                Set up the first account to open your management dashboard.
            @endif
        </p>

        <form method="POST" action="{{ auth()->check() ? route('accounts.store') : route('register') }}">
            @csrf
            <label for="name">Full name</label>
            <input id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <p class="error">{{ $message }}</p> @enderror

            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <p class="error">{{ $message }}</p> @enderror

            <label for="role">Account type</label>
            @if (auth()->check())
                <input type="hidden" name="role" value="barber">
                <input value="Barber" disabled>
            @else
                <input type="hidden" name="role" value="admin">
                <input value="Administrator" disabled>
            @endif
            @error('role') <p class="error">{{ $message }}</p> @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            @error('password') <p class="error">{{ $message }}</p> @enderror

            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>

            <div class="actions">
                <button type="submit">Create account</button>
                @if (auth()->check())
                    <a href="{{ route('dashboard') }}">Cancel</a>
                @else
                    <a href="{{ route('login') }}">Already have an account? Sign in</a>
                @endif
            </div>
        </form>
    </section>
</main>
@endsection
