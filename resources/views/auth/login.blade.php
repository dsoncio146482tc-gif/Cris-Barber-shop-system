@extends('layouts.app', ['title' => 'Sign in | Cris Barber Shop'])

@section('content')
<main class="page">
    <section class="card">
        <div class="brand">Cris Barber Shop</div>
        <h1>Welcome back</h1>
        <p class="muted">Sign in to open your dashboard.</p>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <p class="error">{{ $message }}</p> @enderror
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
            <label><input type="checkbox" name="remember" style="width:auto; margin-right:6px;"> Remember me</label>
            <div class="actions"><button type="submit">Sign in</button><a href="{{ route('register') }}">Set up administrator account</a></div>
        </form>
    </section>
</main>
@endsection
