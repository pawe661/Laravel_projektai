<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List of students</title>
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
    <h1>Students Index</h1>

    @if (count($students) == 0)
    <p>There are no Students</p>
    @endif

    <a class="btn btn-primary" href="{{route('student.create')}}">Create new Student</a>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Student Surname</th>
            <th>Student AttendanceGroup</th>
            <th>Student Image</th>
            <th>Actions</th>
        </tr>


        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->surname}}</td>
            @foreach ($groups as $group)
                @if($student->group_id == $group ->id)
                <td>{{$group->name}}</td>
                @endif
            @endforeach
            <td>{{$student->image_url}}</td>

            <td>
                <a class="btn btn-primary" href="{{route('student.edit', [$student])}}">Edit</a>
                <a class="btn btn-secondary" href="{{route('student.show', [$student])}}">Show</a>

                <form method="post" action="{{route('student.destroy', [$student])}}">
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