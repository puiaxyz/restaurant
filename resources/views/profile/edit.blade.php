@extends('layouts.app')

@section('content')
<h1>Edit Profile</h1>

<form id="profile-form">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}">
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}">
    </div>
    <button type="submit">Update Profile</button>
</form>

<script>
    document.getElementById('profile-form').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const formData = new FormData(this);
        
        axios.put('/api/profile', formData)
            .then(response => {
                alert(response.data.message);
            })
            .catch(error => {
                console.error(error);
                alert('An error occurred while updating the profile.');
            });
    });
</script>
@endsection
