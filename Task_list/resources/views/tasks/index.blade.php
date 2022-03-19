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

    <div class="container mt-5">
    <h1>Product Index</h1>

    @if (count($tasks) == 0)
    <p>There are no Tasks</p>
    @endif

    <form method="GET" action="{{route('task.index')}}">
        @csrf
         Sort by 
        <select name="sortCollumn">
            @foreach ($select_array as $key=>$item)
                @if($item == $sortCollumn || ($key == 0 && empty($sortCollumn)) )
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else 
                <option value="{{$item}}" >{{$item}}</option>
                @endif
                
            @endforeach
        </select>    
        <select name="sortOrder">
            @if ($sortOrder == 'asc' || empty($sortOrder))
                <option value="asc" selected>Ascending</option>
                <option value="desc">Descending</option>
            @else 
                <option value="asc">Ascending</option>
                <option value="desc" selected>Descending</option>
            @endif
        </select>  
        <br>
        Filter by 
        <select name="status_id">
            <option value="all">All</option>
            @foreach ($taskStatuses as $status)
                @if ($status->id == $status_id)
                    <option value="{{$status->id}}" selected>{{$status->title}} </option>
                @else
                    <option value="{{$status->id}}">{{$status->title}}</option>
                @endif    
            @endforeach
        </select>
        <br >

         Number of entries to display
        <select name="page_limit">
            @foreach ($paginationSettings as $setting)
                @if ($page_limit == $setting->value)
                <option value={{$setting->value}} selected>{{$setting->title}}</option>
                @else 
                <option value={{$setting->value}}>{{$setting->title}}</option>
                @endif
            @endforeach
        </select>
        <button class="btn btn-secondary" type="submit">Sort</button>
    </form>
    <a href="{{route('task.index')}}" class="btn btn-primary">Clear filter</a>   


    
    </form>

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Task Title </th>
            <th>Task Description</th>
            <th>Task Status   
        </tr>

        @foreach ($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->taskTaskStatus->title}}</td>
        </tr>
    @endforeach
    </table>
        <div class="d-flex justify-content-center">
            {!! $tasks->appends(Request::except('page'))->render() !!}
        </div>
    </div>
    @endsection