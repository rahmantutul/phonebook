@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
@endpush
@section('content')
<div class="body-content">
    <div class="container mt-lg-5 mt-md-5">
        <div class="row">
            <div class="col-md-10 m-auto from-area ">
                <h1>Update Profile</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="cf" action="{{ route('profile.update') }}" method="Post" enctype="multipart/form-data"> @csrf
                    <div class="cf text-left">
                        <div class="half left cf">
                            <label for="input-name">Name</label>
                            <input type="text" id="input-name" name="name" value="{{ $user->name }}">
                            <label for="input-email">Email</label>
                            <input type="email" id="input-email" value="{{ $user->email }}" name="email">
                            <label for="input-number">Mobile Number</label>
                            <input type="number" id="input-number" value="{{ $user->phone }}" name="phone">
                            <label for="input-b-date">Old password</label>
                            <input type="password" id="input-b-date" name="current_password">
                            <label for="input-b-date">New password</label>
                            <input type="text" id="input-b-date" name="new_password">
                        </div>
                        <div class="half right cf">
                            <label for="input-email">Avatar</label> <br>
                            @if ($user->avatar != Null)
                            <img style="height: 130px; margin-top:15px; border-radius:9px;" class="c-image" src="{{ asset('assets/images/'.$user->avatar) }}" value="{{ $user->avatar }}">
                            @endif
                            <input type="file" id="input-image" style="color: #222" name="avatar">
                        </div>
                    </div>  
                    <input type="submit" value="Submit" id="input-submit">
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
    
@endpush