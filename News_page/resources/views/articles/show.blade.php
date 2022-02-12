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
    <h1>Articles Show</h1>

    <h2> {{$article->title}}</h2>
        <p>Id : {{$article->id}}</p>
        <p>Article Excerpt : {{$article->excerpt}}</p>
        <p>Article Description : {{$article->description}}</p>
        <p>Article Author : {{$article->author}}</p>
        <p>Article Image: 
            <img id='image{{$article->articleImages->id}}' class='{{$article->articleImages->class}}' 
                src='{{asset($article->articleImages->src)}}' alt='{{$article->articleImages->alt}}' 
                width='{{$article->articleImages->width}}' height='{{$article->articleImages->height}}' 
                />
        </p> 
        <p>Article Categories : {{$article -> articlecategoryArticles -> title}}</p>

   
        <form method="post" action="{{route('article.destroy', [$article])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete Article</button>
        </form>
        <a class="btn btn-secondary" href="{{route('article.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>