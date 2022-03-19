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
    <h1>Owners Index</h1>

    @if (count($owners) == 0)
    <p>There are no Owners</p>
    @endif

    
    <a class="btn btn-primary" href="{{route('owner.create')}}">Create new Owner</a>
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink ('name', 'Owner Name')</th>
            <th>@sortablelink('surname', 'Owner Surname')</th>
            <th>@sortablelink('email', 'Owner Description')</th>
            <th>@sortablelink('phone', 'Owner Author')</th>
            <th>@sortablelink('owner_tasks_count', 'Owner Tasks')</th>
            <th>Actions</th>
            
        </tr>
        
        @foreach ($owners as $owner)
        <tr>
            <td>{{$owner->id}}</td>
            <td>{{$owner->name}}</td>
            <td>{{$owner->surname}}</td>
            <td>{{$owner->email}}</td>
            <td>{{$owner->phone}}</td>
            
            <td>{{count($owner->ownerTasks)}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('owner.edit', [$owner])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('owner.show', [$owner])}}">Show</a>

                <form method="post" action="{{route('owner.destroy', [$owner])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $owners->appends(Request::except('page'))->render() !!}
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a>

    </div>
    @endsection