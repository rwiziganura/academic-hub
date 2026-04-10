<x-layout :title="$title">

<form action="/login" method="POST">
    @csrf

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')<span class="error">{{ $message }}</span>@enderror
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        @error('password')<span class="error">{{ $message }}</span>@enderror
    </div>

    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="/register">Register here</a></p>

</x-layout>