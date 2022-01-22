<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Companies</title>
</head>
<body>
    <div class="container">
    <h1>Companies Edit</h1>

    <form method="POST" action="{{route('student.update', [$student])}}" >
        <input class="form-control" type='text' name="student_name" value='{{$student->name}}'/>
        <input class="form-control" type='text' name="student_surname" value='{{$student->surname}}'/>

        <select class="form-control" name="student_group_id" placeholder="Student Groups">
                @foreach ($groups as $group)
                    @if ($group->id == $student->group_id)
                    <option value="{{$group -> id}}" selected>{{$group->name}}</option>
                    @else 
                    <option value="{{$group -> id}}" >{{$group->name}}</option>
                    @endif
                @endforeach
            </select>

        <input  class="form-control" type='text' name="student_image_url" value='{{$student->image_url}}'/>
        
            
        @csrf
        <button class="btn btn-primary" type='submit'>Edit</button>
        <a class="btn btn-secondary" href="{{route('student.index')}}">Back</a>
    </form> 

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>