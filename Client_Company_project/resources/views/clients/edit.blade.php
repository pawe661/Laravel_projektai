<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Clients</title>
</head>
<body>
    <div class="container">
    <h1>Clients Edit</h1>

    <form method="POST" action="{{route('client.update', [$client])}}" >

        
        <input class="form-control" type='text' name="client_name" value='{{$client->name}}'/>
        <input  class="form-control" type='text' name="client_surname" value='{{$client->surname}}'/>
        <input  class="form-control" type='text' name="client_username" value='{{$client->username}}'/>
            <select class="form-control" name="client_compamy_id" >
                <option value="" disabled selected>{{$client->company_id}}</option>
                @for($i = 1; $i < 250; $i++)
                <option value="{{$i}}">{{ $i }}</option>
                @endfor
            </select>
        <input class="form-control" type='text' name="client_image_url" value='{{$client->image_url}}'/>
        <input class="form-control" type='text' name="client_phone" value='{{$client->phone}}'/>
            
        @csrf
        <button class="btn btn-primary" type='submit'>Edit</button>
        <a class="btn btn-secondary" href="{{route('client.index')}}">Back</a>
    </form> 

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>