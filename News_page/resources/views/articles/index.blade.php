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

    @if (count($groups) == 0)
    <p>There are no Groups</p>
    @endif


    <a class="btn btn-primary" href="{{route('group.create')}}">Create new Group</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Group Name</th>
            <th>Group Description</th>
            <th>Group Difficulty</th>
            <th>School</th>
            <th>Student Count</th>
            <th>Actions</th>
        </tr>

        @foreach ($groups as $group)
        <tr>
            <td>{{$group->id}}</td>
            <td>{{$group->name}}</td>
            <td>{{$group->description}}</td>

            @foreach ($difficulties as $difficulty)
                @if($group->difficulty_id == $difficulty ->id)
                    <td>{{$difficulty->difficulty}}</td>
                @endif
            @endforeach

            @foreach ($schools as $school)
                @if($group->difficulty_id == $school ->id)
                    <td>{{$school->name}}</td>
                @endif
            @endforeach

            <td>{{count($group->groupStudents)}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('group.edit', [$group])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('group.show', [$group])}}">Show</a>

                <form method="post" action="{{route('group.destroy', [$group])}}">
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </table>
    <a class="btn btn-secondary" href="{{route('home')}}">Back</a>


    </div>
    @endsection