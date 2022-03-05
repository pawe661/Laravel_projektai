@extends('layouts.app')

@section('content')


<div class="container">

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createArticleModal">
        Create new article
    </button>

    <!-- Modal -->
    <!-- Create -->
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
                    <button type="button" id="submit-ajax-form" class="btn btn-primary">Save </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Show -->
    <div class="modal fade" id="showArticleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container">
                    <div class="row">
                        <div class="col-md-4"> Article Id
                        </div> 
                        <div class="show-article-id col-md">  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"> Article Title
                        </div> 
                        <div class="show-article-title col-md">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"> Article Discription
                        </div> 
                        <div class="show-article-description col-md">  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"> Article Type
                        </div> 
                        <div class="show-article-type col-md">  
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-article-create-modal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit -->
    <div class="modal fade" id="editArticleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="ajaxForm">
                        <input type="hidden" id="edit_article_id" name="article_id"/>
                        <div class="form-group">
                            <label for="article_title">Article Title</label>
                            <input id="edit_article_title" class="form-control" type="text" name="article_title" />
                        </div>
                        <div class="form-group">
                            <label for="article_description">Article Description</label>
                            <input id="edit_article_description" class="form-control" type="text" name="article_description" />
                        </div>
                        <div class="form-group">
                            <label for="article_type">Article Type</label>
                            <select class="form-control"  name="article_type" id="edit_article_type" >
                                @foreach ($types as $type)
                                        <option class="selecter{{$type->id}}" value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="button" id="close-article-create-modal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button id="close-article-create-modal" type="button" class="btn btn-secondary">Close with Javascript</button> -->
                    <button type="button" id="update-article" class="btn btn-primary">Save changes</button>
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
            <td class="col-article-id">{{$article->id}}</td>
            <td class="col-article-title">{{$article->title}}</td>
            <td class="col-article-description">{{$article->description}}</td>
            <td class="col-article-type">{{$article->articleType->title}}</td>
            <td>
            <button class="delete-article btn btn-danger " type="submit" data-articleID="{{$article->id}}">DELETE</button>
            <button type="button" class="show-article btn btn-primary" data-bs-toggle="modal" data-bs-target="#showArticleModal" data-articleID="{{$article->id}}">
                Show
            </button>
            <button type="button" class="edit-article btn btn-secondary " data-bs-toggle="modal" data-bs-target="#editArticleModal" data-articleID="{{$article->id}}">
                Edit
            </button>
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
                    let html =  "<tr class='article"+data.articleID+"'><td>"+data.articleID+"</td><td>"+data.articleTitle+"</td><td>"+data.articleDescription+"</td><td>"+data.articleTypeDisplay+"</td><td><button class='btn btn-danger delete-article' type='submit' data-articleID='"+data.articleID+"'>DELETE</button><button class='btn btn-primary show-article' type='button' data-bs-toggle='modal' data-bs-target='#showArticleModal' data-articleID='"+data.articleID+"'>Show</button><button class='btn btn-secondary edit-article' type='button' data-bs-toggle='modal' data-bs-target='#editArticleModal' data-articleID='"+data.articleID+"'>Edit</button></td></tr>";
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
        // show įrašus
        $(document).on('click', '.show-article', function() {
            let articleID;
            articleID = $(this).attr('data-articleID');
            console.log(articleID);

            $.ajax({
                type: 'GET',// formoje method POST GET
                url: '/articles/showAjax/' + articleID  ,// formoje action
                success: function(data) {
                    $('.show-article-id').html(data.articleId);                   
                    $('.show-article-title').html(data.articleTitle);                   
                    $('.show-article-description').html(data.articleDescription);                   
                    $('.show-article-type').html(data.articleTypeDisplay);                      
                }
            });
        })

        // edit
        $(document).on('click', '.edit-article', function() {
            let articleID;
            articleID = $(this).attr('data-articleID');
            console.log(articleID);

            $.ajax({
                type: 'GET',// formoje method POST GET
                url: '/articles/showAjax/' + articleID  ,// formoje action
                success: function(data) {
                    $('#edit_article_id').val(data.articleID);                   
                    $('#edit_article_title').val(data.articleTitle);                   
                    $('#edit_article_description').val(data.articleDescription);                   
                    $('#edit_article_type').val(data.articleTypeDisplay);
                    $('.selecter'+data.articleType).attr("selected","selected"); 
                                                  
                }
            });
        });

        $(document).on('click', '#update-article', function() {
            let articleID;
            let article_title;
            let article_description;
            let article_type;
            
            articleID = $('#edit_article_id').val();
            article_title = $('#edit_article_title').val();
            article_description = $('#edit_article_description').val();
            article_type = $('#edit_article_type').val();

            $.ajax({
                    type: 'POST',// formoje method POST GET
                    url: '/articles/updateAjax/' + articleID  ,// formoje action
                    data: {article_title: article_title, article_description: article_description, article_type: article_type  },
                    success: function(data) {
                        console.log("test2222222222222");
                        //  $('.show-client-id').html(data.clientId);
                        // $(".client"+clientid+ " " + ".col-client-id").html(data.clientId)
                        $(".article"+articleID+ " " + ".col-article-title").html(data.articleTitle);
                        $(".article"+articleID+ " " + ".col-article-description").html(data.articleDescription);
                        $(".article"+articleID+ " " + ".col-article-type").html(data.articleTypeDisplay);
                        
                        $("#alert").removeClass("d-none");
                        $("#alert").html(data.successMessage);
                        
                        $("#editArticleModal").hide();
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('body').css({overflow:'auto'});
                    }
                });
        })
              
            
       
    })
</script>
@endsection