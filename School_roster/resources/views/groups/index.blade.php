<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Attendance Groups</title>
</head>
<body>
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
    <h1>Attendance Groups Index</h1>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>