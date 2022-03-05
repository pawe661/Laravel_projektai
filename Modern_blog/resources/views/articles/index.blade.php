@extends('layouts.app')

@section('content')


<div class="container">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createArticleModal">
        Create new article
    </button>

      <!-- Modal -->
      <div class="modal fade" id="createArticleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ajaxForm">
                    <div class="form-group">
                        <label for="article_title">Article Title</label>
                        <input id="article_title" class="form-control" type="text" name="article_title" />
                    </div>
                    <div class="form-group">
                        <label for="article_description">Article Description</label>
                        <input id="article_description" class="form-control" type="text" name="article_description" />
                    </div>
                    <div class="form-group">
                        <label for="article_type">Article Type</label>
                        <select class="form-control"  name="article_type" id="article_type" >
                            <option value="" disabled selected>Please select Type </option>
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->title}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <button type="button" id="close-article-create-modal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button id="close-article-create-modal" type="button" class="btn btn-secondary">Close with Javascript</button> -->
                <button type="button" id="submit-ajax-form" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
        </div>
    <div id="alert" class="alert alert-success d-none">
    </div>       

    <table id="articles-table" class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Discription</th>
            <th>Type</th>
            <th>Action</th>
        </tr>
        @foreach ($articles as $article) 
        <!-- šitas class nauduojamas delete funkcijai atlikti target su JS-->
        <tr class="article{{$article->id}}">
            <td class="">{{$article->id}}</td>
            <td class="">{{$article->title}}</td>
            <td class="">{{$article->description}}</td>
            <td class="">{{$article->articleType->title}}</td>
            <td>
            <button class="delete-article btn btn-danger " type="submit" data-articleID="{{$article->id}}">DELETE</button>

            </td>
        </tr>
        @endforeach
    </table>   
    <a class="btn btn-secondary" href="{{route('nav')}}">Back to nav</a> 
</div>



<script>
    // validacija formos
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        // uždaro langą
        $("#close-article-create-modal").click(function() {
            $("#createArticleModal").hide();
        });

        console.log("Jquery veikia");
        // sukurti naują įrašą
        $("#submit-ajax-form").click(function() {
            let article_title;
            let article_description;
            let article_type;
            // let article_type_display;
            
            article_title = $('#article_title').val();
            article_description = $('#article_description').val();
            article_type = $('#article_type').val();
            // article_type_display = $('#article_type_display').val();
            

            $.ajax({
                type: 'POST',// formoje method POST GET
                url: '{{route("article.storeAjax")}}' ,// formoje action
                data: {article_title: article_title, article_description: article_description, article_type: article_type  },
                success: function(data) {
                   console.log(data);
                    let html =  "<tr><td>"+data.articleId+"</td><td>"+data.articleTitle+"</td><td>"+data.articleDescription+"</td><td>"+data.articleTypeDisplay+"</td><td><button class='btn btn-danger delete-article' type='submit' data-articleID='"+data.articleId+"'>DELETE</button></td></tr>";
                    $("#articles-table").append(html);
                    // uždaro po išsaugojimo
                    $("#createArticleModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({overflow:'auto'});
                   
                    // alert žinutė
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage +" " + data.articleTitle);

                    // išvalo input laukus
                    $('#article_title').val('');
                    $('#article_description').val('');
                    $('#article_type').val('');
                }
            });
        });
        
        // trinti įrašus 
        $(document).on('click', '.delete-article', function() {
            let articleID;
            articleID = $(this).attr('data-articleID');
            console.log(articleID);
            $.ajax({
                type: 'POST',// formoje method POST GET
                url: '/articles/deleteAjax/' + articleID  ,// formoje action
                success: function(data) {
                   console.log(data);
                   $('.article'+articleID).remove();

                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage);                    
                }
            });
        })
    })
</script>
@endsection