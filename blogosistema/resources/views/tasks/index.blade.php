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
    <h1>Tasks Index</h1>

    @if (count($tasks) == 0)
    <p>There are no Tasks</p>
    @endif


    <a href="{{route('task.index')}}" class="btn btn-primary">Clear filter</a>   

    <a class="btn btn-primary" href="{{route('task.create')}}">Create new Task</a>
   
    <table class="table table-striped">
        <tr>
            <th>@sortablelink('id', 'ID')</th>
            <th>@sortablelink ('title', 'Task Title')</th>
            <th>@sortablelink('description', 'Task Description')</th>
            <th>@sortablelink('start_date', 'Task Start Date')</th>
            <th>@sortablelink('end_date', 'Task End Date')</th>
            <th>@sortablelink('logo', 'Task logo')</th>
            <th>@sortablelink('taskOwner.name', 'Task Owner')</th>
            <th>Actions</th>
            
        </tr>
        
        @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->start_date}}</td>
            <td>{{$task->end_date}}</td>
            <td><img src='{{$task->logo}}' alt='Task image' width="100" height="100"/></td>
            
            <td>{{$task->taskOwner->name}} {{$task->taskOwner->surname}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('task.edit', [$task])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('task.show', [$task])}}">Show</a>

                <form method="post" action="{{route('task.destroy', [$task])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    {!! $tasks->appends(Request::except('page'))->render() !!}
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a>

    </div>
    @endsection