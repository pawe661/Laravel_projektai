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
    <h1>Companies Show</h1>

    <h2> {{$client->name}} {{$client->surname}}  </h2>
        <p>Id : {{$client->id}}</p>
        <p>Name : {{$client->name}}</p>
        <p>Surname : {{$client->surname}}</p>
        <p>Username : {{$client->username}}</p>
        <p>company_id : {{$client->company_id}}</p>
        <p>Image : {{$client->image_url}}</p>
        <p>Phone : {{$client->phone}}</p>

        <form method="post" action="{{route('client.destroy', [$client])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>
        <a class="btn btn-secondary" href="{{route('client.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>