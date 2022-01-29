<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Articles</title>
</head>
<body>
<div class="container">
    <h1>Create Articles</h1>
        <form method="POST" action="{{route('group.store')}}" >
            <input class="form-control" type='text' name="group_name" placeholder="Group name"/>
            <input class="form-control" type='text' name="group_description" placeholder="Group description"/>

                <select class="form-control" name="group_difficulty_id" placeholder="Group difficulty">
                    <option value="" disabled selected>Please select difficulty level</option>
                    @foreach ($difficulties as $difficulty)
                        <option value="{{$difficulty -> id}}" >{{$difficulty->difficulty}}</option>
                    @endforeach
                </select>

                <select class="form-control" name="group_school_id" placeholder="School">
                    <option value="" disabled selected>Please select School</option>
                    @foreach ($schools as $school)
                        <option value="{{$school -> id}}" >{{$school->name}}</option>
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