<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Students</title>
</head>
<body>
    <div class="container">
        
    <h1>Students Show</h1>

    <h2> {{$student->name}} {{$student->surname}} </h2>
    
        <p>Id : {{$student->id}}</p>
        <p>Name : {{$student->name}}</p>
        <p>Surname : {{$student->surname}}</p>

        @foreach ($groups as $group)
            @if($student->group_id == $group ->id)
                <p>Student group :{{$group->name}}</p>
            @endif
        @endforeach

        <p>Student image : {{$student->image_url}}</p>

                    
        <form method="post" action="{{route('student.destroy', [$student])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        <a class="btn btn-secondary" href="{{route('student.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>