@extends('layouts.app')

@section('title', 'Contact Page')

@section('content')







<div class="container-fluid">
  <div class="row">
    <div class="col bg-success">  
         <h2>Contact Us</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contact.submit') }}" method="POST" class="mt-4">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Your Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Your Message</label>
            <textarea name="message" class="form-control" rows="5">{{ old('message') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form></div>
    <div class="col bg-warning"> 


     
  @include('weather.index')

    </div>
    <div class="col bg-success">  Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
  </div>
</div>



@endsection
