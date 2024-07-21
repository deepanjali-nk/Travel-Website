<html>

<head>
    <title>Admin Login</title>
</head>

@if (session('error'))
    <div class="error-message">
        {{ session('error') }}
    </div>
@endif


<form action="{{ route('login') }}" method="POST">
    @csrf

    @error('email')
        <p style='color:red'>{{ $message }}</p>
    @enderror

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
    </div>

    @error('password')
        <p style='color:red'>{{ $message }}</p>
    @enderror
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <button type="submit">Login</button>
</form>

</html>
