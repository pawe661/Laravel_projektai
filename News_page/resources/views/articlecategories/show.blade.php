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
    <h1>Attendance Groups Show</h1>

    <h2> {{$group->name}}</h2>
        <p>Id : {{$group->id}}</p>
        <p>Group Name : {{$group->name}}</p>
        <p>Group Description : {{$group->description}}</p>
        <p>Group Difficulty: {{$difficulties->difficulty}}</p>
        <p>School: {{$schools->name}}</p>

        @if(count($group -> groupStudents) == 0) 
            <p>Group has no studenst </p>
        @else 
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Student Name</th>
                    <th>Student Surname</th>
                    <th>Student AttendanceGroup</th>
                    <th>Student Image</th>
                    <th>Actions</th>
                </tr>
            @foreach ($group->groupStudents as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->surname}}</td>
                    <td>{{$group->name}}</td>

                    <td><img src='{{$student->image_url}}' alt='{{$student->name}}' width="100" height="100"/></td>

                    <td>
                        <form method="post" action="{{route('student.destroy', [$student])}}">
                        @csrf
                            <button class="btn btn-danger" type="submit">Delete Student</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        @endif    
        <form method="post" action="{{route('group.destroy', [$group])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete Group</button>
        </form>
        <a class="btn btn-secondary" href="{{route('group.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>