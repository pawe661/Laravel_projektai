@extends('layouts.app')

@section('content')

    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{session()->get('error_message')}}
        </div>   
    @endif

    @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{session()->get('success_message')}}
        </div>   
    @endif

    <div class="container">
    <h1>Articles Index</h1>

  


    </div>
    @endsection