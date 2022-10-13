@extends('layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}">
@endpush
@section('content')
<div class="body-content">
    <div class="container mt-lg-5 mt-md-5">
        <div class="row">
            <div class="col-md-10 m-auto from-area ">
                <h1>Upload new contact</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="cf" action="{{ route('contact.add') }}" method="Post" enctype="multipart/form-data"> @csrf
                    <div class="cf text-left">
                        <div class="half left cf">
                            <label for="input-name">Name</label>
                            <input type="text" id="input-name" placeholder="Name" name="name" required>
                            <label for="input-number">Mobile Number</label>
                            <input type="number" id="input-number" placeholder="Mobile" name="phone" required>
                            <label for="input-email">Image</label>
                            <input type="file" id="input-image" style="color: #222" name="image">
                            <label for="input-email">Email</label>
                            <input type="email" id="input-email" placeholder="Email address" name="email">
                        </div>
                        <div class="half right cf">
                            <label for="input-b-date">Birthday</label>
                            <input type="date" id="input-b-date" name="birthday">
                            <label for="input-b-date">Workplace</label>
                            <input type="text" id="input-b-date" name="worked_at">
                            <label for="input-address">Living Place</label>
                            <textarea name="address" id="input-address" placeholder="Address"></textarea>
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