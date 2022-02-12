<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Schools</title>
</head>
<body>
<div class="container">
    <h1>School Show</h1>

    <h2> {{$school->name}}</h2>
        <p>Id : {{$school->id}}</p>
        <p>School Name : {{$school->name}}</p>
        <p>School Description : {{$school->description}}</p>
        <p>School Location : {{$school->place}}</p>
        <p>School Phone Number : {{$school->phone}}</p>
 
        @if(count($school -> schoolGroups) == 0) 
            <p>School has no groups </p>
        @else 
            <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Group Name</th>
                    <th>Group Description</th>
                    <th>Group Difficulty</th>
                    <th>School</th>
                    <th>Actions</th>
                </tr>
            @foreach ($school->schoolGroups as $group)
                <tr>
                    <td>{{$group->id}}</td>
                    <td>{{$group->name}}</td>
                    <td>{{$group->description}}</td>

                    @foreach ($difficulties as $difficulty)
                        @if($group->difficulty_id == $difficulty ->id)
                            <td>{{$difficulty->difficulty}}</td>
                        @endif
                    @endforeach

                    <td>{{$school->name}}</td>

                    <td>
                        <form method="post" action="{{route('group.destroy', [$group])}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        @endif    
        <form method="post" action="{{route('school.destroy', [$group])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete School</button>
        </form>
        <a class="btn btn-secondary" href="{{route('school.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>