@extends('layouts.app')

@section('content')


<div class="container">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createArticleModal">
        Create new article
    </button>
    <!-- Search field -->
    <div class="searchAjaxForm">
      <input id="searchValue" type="text">
      <span class="search-feedback"></span>
    </div>  

    <!-- Sort -->
    <input id="hidden-sort" type="hidden" value="id" />
    <input id="hidden-direction" type="hidden" value="asc" />

    <!-- Mass delete -->
    <button type="button" class="btn btn-danger delete-all" data-url="">Delete All</button>

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
                            <input id="article_title" class="form-control create-input" type="text" name="article_title" />
                            <span class="invalid-feedback input_article_title"></span>
                        </div>
                        <div class="form-group">
                            <label for="article_description">Article Description</label>
                            <input id="article_description" class="form-control" type="text" name="article_description" />
                            <span class="invalid-feedback input_article_description">
                            </span> 
                        </div>
                        <div class="form-group">
                            <label for="article_type">Article Type</label>
                            <select class="form-control"  name="article_type" id="article_type" >
                                <option value="" disabled selected>Please select Type </option>
                                @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->title}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback input_article_type">
                            </span> 
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button id="close-article-create-modal" type="button" class="btn btn-secondary">Close with Javascript</button> -->
                    <button type="button" id="update-article" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div id="alert" class="alert alert-success d-none">
    </div>       

    <table id="articles-table" class="table table-striped">
        <thead>
            <tr>
                <th><input type="checkbox" id="check_all"></th>
                <th><div class="articles-sort" data-sort="id" data-direction="desc">Id</div></th>
                <th><div class="articles-sort"  data-sort="title" data-direction="desc">Title</div></th>
                <th><div class="articles-sort" data-sort="description" data-direction="desc">Description</div></th>
                <th><div class="articles-sort" data-sort="type" data-direction="desc">Type</div></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($articles as $article) 
        <!-- šitas class nauduojamas delete funkcijai atlikti target su JS-->
        <tr class="article{{$article->id}}">
            <td><input type="checkbox" class="checkbox" data-articleID="{{$article->id}}"></td>
            <td class="col-article-id">{{$article->id}}</td>
            <td class="col-article-title">{{$article->title}}</td>
            <td class="col-article-description">{{$article->description}}</td>
            <td class="col-article-type">{{$article->articleType->title}}</td>
            <td>
            <button class="delete-article btn btn-danger " type="submit" data-articleID="{{$article->id}}">
                DELETE
            </button>
            <button type="button" class="show-article btn btn-primary" data-bs-toggle="modal" data-bs-target="#showArticleModal" data-articleID="{{$article->id}}">
                Show
            </button>
            <button type="button" class="edit-article btn btn-secondary " data-bs-toggle="modal" data-bs-target="#editArticleModal" data-articleID="{{$article->id}}">
                Edit
            </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>  
    <table class="template d-none">
        <tr>
          <td><input type="checkbox" class="checkbox" data-articleID=""></td>
          <td class="col-article-id"></td>
          <td class="col-article-title"></td>
          <td class="col-article-description"></td>
          <td class="col-article-type"></td>
          <td>
            <button class="btn btn-danger delete-article" type="submit" data-articleID="">DELETE</button>
            <button type="button" class="btn btn-primary show-article" data-bs-toggle="modal" data-bs-target="#showArticleModal" data-articleID="">Show</button>
            <button type="button" class="btn btn-secondary edit-article" data-bs-toggle="modal" data-bs-target="#editArticleModal" data-articleID="">Edit</button>
          </td>
        </tr>  
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
        function createRow(articleID, articleTitle, articleDescription,articleTypeDisplay ) {
            console.log(articleID);
                    let html
                    html += "<tr class='article"+articleID+"'>";
                    html += "<td><input type='checkbox' class='checkbox' data-articleID='"+articleID+"'></td>";
                    html += "<td>"+articleID+"</td>";    
                    html += "<td>"+articleTitle+"</td>";  
                    html += "<td>"+articleDescription+"</td>";
                    html += "<td>"+articleTypeDisplay+"</td>";    
                    html += "<td>";
                    html +=  "<button class='btn btn-danger delete-article' type='submit' data-articleID='"+articleID+"'>DELETE</button>"; 
                    html +=  "</td>";
                    html += "</tr>";
                   return html 
        }

        function createRowFromHtml(articleID, articleTitle, articleDescription, articleTypeDisplay) {
          $(".template tr").removeAttr("class");
          $(".template tr").addClass("article"+articleID);
        
          $(".template .delete-article").attr('data-articleID', articleID );
          $(".template .show-article").attr('data-articleID', articleID );
          $(".template .edit-article").attr('data-articleID', articleID );
          $(".template .col-article-id").html(articleID );
          $(".template .col-article-title").html(articleTitle );
          $(".template .col-article-description").html(articleDescription );
          $(".template .col-article-type").html(articleTypeDisplay );
          
          return $(".template tbody").html();
        }
        // uždaro langą
        // $("#close-article-create-modal").click(function() {
        //     $("#createArticleModal").hide();
        // });

        console.log("Jquery veikia");
        // sukurti naują įrašą
        $("#submit-ajax-form").click(function() {
            let article_title;
            let article_description;
            let article_type;
            let sort;
            let direction;
            // let article_type_display;
            
            article_title = $('#article_title').val();
            article_description = $('#article_description').val();
            article_type = $('#article_type').val();
            sort = $('#hidden-sort').val();
            direction = $('#hidden-direction').val();
            // article_type_display = $('#article_type_display').val();
            

            $.ajax({
                type: 'POST',// formoje method POST GET
                url: '{{route("article.storeAjax")}}' ,// formoje action
                data: {article_title: article_title, article_description: article_description, article_type: article_type, sort:sort, direction:direction   },
                success: function(data) {
                   console.log(data);
                    let html;
                    if($.isEmptyObject(data.errorMessage)) {
                      
                      
                      $("#articles-table tbody").html('');
                     $.each(data.articles, function(key, article) {
                          let html;
                          html = createRowFromHtml(article.id, article.title, article.description, article.type);
                          // console.log(html)
                          $("#articles-table tbody").append(html);
                     });

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
                  } else {
                    $('.create-input').removeClass('is-invalid');
                      $('.invalid-feedback').html('');
                      $.each(data.errors, function(key, error) {
                        
                        $('#'+key).addClass('is-invalid');
                        $('.input_'+key).html("<strong>"+error+"</strong>");
                      });
                    }
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

        $('#check_all').on('click', function(e) {
          if($(this).is(':checked',true)){
            $(".checkbox").prop('checked', true);  
          } else {  
            $(".checkbox").prop('checked',false);  
          }  
        }); 

          //jeigu visi checkbox pazymeti tada pažymi check_all
        $('.checkbox').on('click',function(){
          if($('.checkbox:checked').length == $('.checkbox').length){
            $('#check_all').prop('checked',true);
          }else{
            $('#check_all').prop('checked',false);
          }
        });


        //ajax uzklausoje nepersiunti id, jie turi eiti per data
          $('.delete-all').on('click', function(e) {
            var idsArr = [];  
            $(".checkbox:checked").each(function() {  
              idsArr.push($(this).attr('data-articleID'));
              
            });
            
            // idsArr=idsArr.toString();
            if(idsArr.length <=0){  
              alert("Please select atleast one record to delete.");  
            }else {  
                
                var articleID = idsArr.join(","); 
                //key = input id
                $.ajax({
                  type: 'POST',
                  url: '/articles/massdeleteAjax', //+ typeID  ,// formoje action
                  data: {article: articleID}, 
                  success: function(data) {
                   
                  $(".checkbox:checked").each(function() {  
                    $(this).parents("tr").remove();
                    $('.article'+articleID).remove();
                    $("#alert").removeClass("d-none");
                    console.log(articleID);
                    $.each(data, function(key, message) {
                        console.log(message.successMessage);                    
                    });
                     
                    });
                  },
                  error: function (data) {
                    alert(data.responseText);
                  }
                  });
                  }  
                  
                  });
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
        // search function
        $(document).on('keyup', '#searchValue', function() {
          
          let searchValue = $('#searchValue').val();
          let searchFieldCount= searchValue.length;
          if(searchFieldCount == 0) {
            console.log("Field is empty");
            $(".search-feedback").css('display', 'block');
            $(".search-feedback").html("Field is empty");
            
            $.ajax({
                type: 'GET',
                url: '{{route("article.searchAjax")}}'  ,
                data: {searchValue: searchValue},
                success: function(data) {
                  $("#articles-table").show();
                  $("#articles-table tbody").html('');
                    // atliekamas ciklas
                     $.each(data.articles, function(key, article) {
                          let html;
                          html = createRowFromHtml(article.id, article.title, article.description);
                          $("#articles-table tbody").append(html);
                     }); 
                    }
                  })
          } else if (searchFieldCount != 0 && searchFieldCount< 3 ) {
            console.log("Min 3");
            $(".search-feedback").css('display', 'block');
            $(".search-feedback").html("Min 3");
            $("#articles-table").show();
          } else {
            $(".search-feedback").css('display', 'none');
          console.log(searchFieldCount);
          console.log(searchValue);
            $.ajax({
                  type: 'GET',
                  url: '{{route("article.searchAjax")}}'  ,
                  data: {searchValue: searchValue},
                  success: function(data) {
                    console.log(data.types); 
                    if($.isEmptyObject(data.errorMessage)) {
                      //sekmes atvejis
                      $("#articles-table").show();
                      $("#alert").addClass("d-none");
                      $("#articles-table tbody").html('');
                      // atliekamas ciklas
                      $.each(data.articles, function(key, article) {
                            let html;
                            html = createRowFromHtml(article.id, article.title, article.description);
                            $("#articles-table tbody").append(html);
                      }); 
                                                  
                    } else {
                          $("#articles-table").hide();
                          $('#alert').removeClass('alert-success');
                          $('#alert').addClass('alert-danger');
                          $("#alert").removeClass("d-none");
                          $("#alert").html(data.errorMessage); 
                    }                            
                  }
            });
          }
        });

        //Sort
        $('.articles-sort').click(function() {
          let sort;
          let direction;
          sort = $(this).attr('data-sort');
          direction = $(this).attr('data-direction');
          $("#hidden-sort").val(sort);
          $("#hidden-direction").val(direction);
          if(direction == 'asc') {
            $(this).attr('data-direction', 'desc');
          } else {
            $(this).attr('data-direction', 'asc');
          }
          $.ajax({
                type: 'GET',// formoje method POST GET
                url: '{{route("article.indexAjax")}}'  ,// formoje action
                data: {sort: sort, direction: direction },
                success: function(data) {
                  // data
                  console.log(data.articles);
                    $("#articles-table tbody").html('');
                     $.each(data.articles, function(key, article) {

                          let html;
                          html = createRowFromHtml(article.id, article.title, article.description, article.typeDisplay);
                          // console.log(html)
                          $("#articles-table tbody").append(html);
                     });
                  //mygtuku rikiavimui
                }
            });
        });
    })      
            
       
</script>
@endsection