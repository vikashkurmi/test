<!-- {{ $message = Session::get('message') }} -->
<?php //echo '<pre>'; print_r($data); ?>

@if($message)
    <div class="alert-box success">
        <h2>{{ $message }}</h2>
    </div>
@endif

@extends('layout.master')

@extends('registration')

@section('title', 'Registration')

@section('sidebar')
    @parent

    <p> This is appended to the master Page Paragraph. </p>
@endsection

@section('content')
    <p> This is my registration form content. </p>
@endsection


