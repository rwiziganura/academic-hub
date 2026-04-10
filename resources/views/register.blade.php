<x-layout :title="$title">

<form action="/register" method="POST">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')<span class="error">{{ $message }}</span>@enderror
    </div>

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

    <div>
        <label for="password_confirmation">Confirm Password:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        @error('password_confirmation')<span class="error">{{ $message }}</span>@enderror
    </div>

    <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="/login">Login here</a></p>

</x-layout>