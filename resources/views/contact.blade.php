@extends('layouts.app')

@section('content')
<h1>Contact Us</h1>
<p>Get in touch with us through the following:</p>
<ul>
    <li>Phone: 123-456-7890</li>
    <li>Email: contact@restaurant.com</li>
    <li>Address: 123 Main St, Anytown, USA</li>
</ul>

<h2>Contact Form</h2>
<form>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" required>
    </div>
    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>

<h2>Location</h2>
<!-- Optional: You can use Google Maps Embed API for the map -->
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509092!2d144.9537363153159!3d-37.81720997975131!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f0aabb7%3A0x5045675218ceed30!2sRestaurant!5e0!3m2!1sen!2sus!4v1615379663503!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
@endsection
