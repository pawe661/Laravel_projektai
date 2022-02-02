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

    <h2> {{$articleImage->alt}}</h2>
        <p>Id : {{$articleImage->id}}</p>
        <p>Article Image Atl text : {{$articleImage->excerpt}}</p>
        <p>Article Image: 
            <img id='image{{$articleImage->id}}' class='{{$articleImage->class}}' 
                src='{{asset($articleImage->src)}}' alt='{{$articleImage->alt}}' 
                width='{{$articleImage->width}}' height='{{$articleImage->height}}' 
                />
        </p> 
        <p>Article Image Width : {{$articleImage->width}}</p>
        <p>Article Image Height : {{$articleImage->height}}</p>
        <th>Article Image Clas : {{$articleImage->class}}</th> 
        @if(($articleImage->imagesArticle )== false) 
            <p>School has no groups </p>
        @else 
        <table class="table table-striped">
                <tr>
                    <th>Id</th>
                    <th>Article Title</th>
                    <th>Article Excerpt</th>
                    <th>Article Description</th>
                    <th>Article Author</th>
                    <th>Article Categories</th>
                    <th>Actions</th>
                </tr>

                <tr>
                    <td>{{$articleImage->imagesArticle['id']}}</td>
                    <td>{{$articleImage->imagesArticle['title']}}</td>
                    <td>{{$articleImage->imagesArticle['excerpt']}}</td>
                    <td>{{$articleImage->imagesArticle['description']}}</td>
                    <td>{{$articleImage->imagesArticle['author']}}</td>
                    <td>{{$articleImage->imagesArticle -> articlecategoryArticles}}</td>
                    

                    <td>
                        <form method="post" action="{{route('article.destroy', [$articleImage->imagesArticle])}}">
                            @csrf
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
         
            </table>
        @endif    



            
            

        

   
        <form method="post" action="{{route('article.destroy', [$articleImage->imagesArticle])}}">
            @csrf
            <button class="btn btn-danger" type="submit">Delete Article</button>
        </form>
        <a class="btn btn-secondary" href="{{route('article.index')}}">Back</a>



    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>