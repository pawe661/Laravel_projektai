<h1>Edit Failas Blade</h1>

<form method='POST' action='{{route('author.update', [$author])}}' >

    Name: <input type='text' name="author_name" value='{{$author->name}}'/>
    Surname: <input type='text' name="author_surname" value='{{$author->surname}}'/>
    Description: <input type='text' name="author_description" value='{{$author->description}}'/>
    Phone: <input type='text' name="author_phone" value='{{$author->phone}}'/>
    @csrf
    <button type='submit'>Edit</button>
</form>