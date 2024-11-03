@extends('layouts.app')

@section('content')
<h1>Manage Profile</h1>

<div>
    <label for="name">Name:</label>
    <input type="text" id="name">
</div>

<div>
    <label for="email">Email:</label>
    <input type="email" id="email">
</div>

<div>
    <label for="password">New Password:</label>
    <input type="password" id="password">
</div>

<div>
    <label for="password_confirmation">Confirm Password:</label>
    <input type="password" id="password_confirmation">
</div>

<button onclick="updateProfile()">Update Profile</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        axios.get('/api/profile')
            .then(response => {
                const user = response.data;
                document.getElementById('name').value = user.name;
                document.getElementById('email').value = user.email;
            })
            .catch(error => console.error(error));
    });

    function updateProfile() {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const password_confirmation = document.getElementById('password_confirmation').value;

        axios.put('/api/profile', {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        })
        .then(response => alert(response.data.message))
        .catch(error => console.error(error));
    }
</script>
@endsection
