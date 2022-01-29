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
    <div class="container">
        <h1>Edit Attendance Group</h1>

        <form method="POST" action="{{route('group.update', [$group])}}" >
            <input class="form-control" type='text' name="group_name" value='{{$group->name}}' placeholder="Group name"/>
            <input class="form-control" type='text' name="group_description" value='{{$group->description}}' placeholder="Group description"/>

                <select class="form-control" name="group_difficulty_id" placeholder="Group difficulty">
                    @foreach ($difficulties as $difficulty)
                        @if ($difficulty->id == $group->difficulty_id)
                        <option value="{{$difficulty -> id}}" selected>{{$difficulty->difficulty}}</option>
                        @else 
                        <option value="{{$difficulty -> id}}" >{{$difficulty->difficulty}}</option>
                        @endif
                    @endforeach
                </select>

                <select class="form-control" name="group_school_id" placeholder="School">
                    @foreach ($schools as $school)
                        @if ($school->id == $group->school_id)
                        <option value="{{$school -> id}}" selected>{{$school->name}}</option>
                        @else 
                        <option value="{{$school -> id}}" >{{$school->name}}</option>
                        @endif
                    @endforeach
                </select>

            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('group.index')}}">Back</a>
        </form>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

