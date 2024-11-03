@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Login</h2>
    <form id="login-form">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script>
    document.getElementById('login-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const formData = new FormData(this);
        axios.post('/login', formData)
            .then(response => {
                alert(response.data.message);
                window.location.href = '/'; // Redirect to home
            })
            .catch(error => {
                if (error.response) {
                    alert(error.response.data.error);
                } else {
                    alert('An error occurred.');
                }
            });
    });
</script>
@endsection
