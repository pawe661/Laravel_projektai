<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>List of Schools</title>
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
    <h1>Schools Index</h1>

    @if (count($schools) == 0)
    <p>Schools missing</p>
    @endif


    <a class="btn btn-primary" href="{{route('school.create')}}">Create new School</a>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>School Name</th>
                <th>School Description</th>
                <th>School Location</th>
                <th>School Phone Number</th>
                <th>Actions</th>
            </tr>

            @foreach ($schools as $school)
            <tr>
                <td>{{$school->id}}</td>
                <td>{{$school->name}}</td>
                <td>{{$school->description}}</td>
                <td>{{$school->place}}</td>
                <td>{{$school->phone}}</td>

                <td>
                    <a class="btn btn-primary" href="{{route('school.edit', [$school])}}">Edit</a>
                    <a class="btn btn-secondary" href="{{route('school.show', [$school])}}">Show</a>

                    <form method="post" action="{{route('school.destroy', [$school])}}">
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