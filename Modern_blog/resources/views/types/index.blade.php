@extends('layouts.app')

@section('content')

<div class="container">


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTypeModal">
      Create Type
    </button>

    <!-- Search field -->
    <div class="searchAjaxForm">
      <input id="searchValue" type="text">
      <span class="search-feedback"></span>
    </div>  

    <!-- Modal -->
    <!-- Create -->
    <div class="modal fade" id="createTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="ajaxForm">
                <div class="form-group">
                        <label for="type_title">Type Title</label>
                        <input id="type_title" class="form-control" type="text" name="type_title" />
                </div>
                <div class="form-group">
                        <label for="type_description">Type Description</label>
                        <input id="type_description" class="form-control" type="text" name="type_description" />
                </div>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="submit-ajax-form" type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Edit -->
    <div class="modal fade" id="editTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="ajaxForm">
                <input type="hidden" id="edit_type_id" name="type_id"/>
                <div class="form-group">
                    <label for="type_title">Type Title</label>
                    <input id="edit_type_title" class="form-control" type="text" name="type_title" />
                </div>
                <div class="form-group">
                    <label for="type_description">Type Description</label>
                    <input id="edit_type_description" class="form-control" type="text" name="type_description" />
                </div>
            </div> 
          </div>
          <div class="modal-footer">
            <button type="button" id="close-type-edit-modal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button id="update-type" type="button" class="btn btn-primary">Update</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Show -->
    <div class="modal fade" id="showTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Show Type</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="show-type-id">
              </div>  
              <div class="show-type-title">
              </div>
              <div class="show-type-description">
              </div>    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
      
    <div id="alert" class="alert alert-success d-none">
    </div>    

    <table id="types-table" class="table table-striped">
      <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Discription</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($types as $type) 
        <tr class="type{{$type->id}}">
            <td class="col-type-id">{{$type->id}}</td>
            <td class="col-type-title">{{$type->title}}</td>
            <td class="col-type-description">{{$type->description}}</td>
            <td>
                <button class="delete-type btn btn-danger " type="submit" data-typeID="{{$type->id}}">
                    DELETE
                </button>
                <button type="button" class="show-type btn btn-primary" data-bs-toggle="modal" data-bs-target="#showTypeModal" data-typeID="{{$type->id}}">
                    Show
                </button>
                <button type="button" class="edit-type btn btn-secondary " data-bs-toggle="modal" data-bs-target="#editTypeModal" data-typeID="{{$type->id}}">
                    Edit
                </button>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table> 
  
    <table class="template d-none">
        <tr>
          <td class="col-type-id"></td>
          <td class="col-type-title"></td>
          <td class="col-type-description"></td>
          <td>
            <button class="btn btn-danger delete-type" type="submit" data-typeID="">DELETE</button>
            <button type="button" class="btn btn-primary show-type" data-bs-toggle="modal" data-bs-target="#showTypeModal" data-typeID="">Show</button>
            <button type="button" class="btn btn-secondary edit-type" data-bs-toggle="modal" data-bs-target="#editTypeModal" data-typeID="">Edit</button>
          </td>
        </tr>  
    </table>  
    
</div>

<script>
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        function createRow(typeID, typeTitle, typeDescription ) {
            console.log(typeID);
                    let html
                    html += "<tr class='type"+typeID+"'>";
                    html += "<td>"+typeID+"</td>";    
                    html += "<td>"+typeTitle+"</td>";  
                    html += "<td>"+typeDescription+"</td>";  
                    html += "<td>";
                    html +=  "<button class='btn btn-danger delete-type' type='submit' data-typeID='"+typeID+"'>DELETE</button>"; 
                    html +=  "</td>";
                    html += "</tr>";
                   return html 
        }
        function createRowFromHtml(typeID, typeTitle, typeDescription) {
          $(".template tr").addClass("type"+typeID);
          $(".template tr").removeClass("d-none");
          $(".template .delete-type").attr('data-typeID', typeID );
          $(".template .show-type").attr('data-typeID', typeID );
          $(".template .edit-type").attr('data-typeID', typeID );
          $(".template .col-type-id").html(typeID );
          $(".template .col-type-title").html(typeTitle );
          $(".template .col-type-description").html(typeDescription );
          
          return $(".template tbody").html();
        }
        // Create
        $("#submit-ajax-form").click(function() {
            let type_title;
            let type_description;
            type_title = $('#type_title').val();
            type_description = $('#type_description').val();
           
            $.ajax({
                type: 'POST',// formoje method POST GET
                url: '{{route("type.storeAjax")}}' ,// formoje action
                data: {type_title: type_title, type_description: type_description  },
                success: function(data) {
                    let html;
                    
                    html = createRowFromHtml(data.typeID, data.typeTitle, data.typeDescription);
                    $("#types-table").append(html);
                    $("#createTypeModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({overflow:'auto'});
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage +" " + data.typeTitle);
                    $('#type_title').val('');
                    $('#type_description').val('');
                    
                }
            });
        });
          // Delete
          $(document).on('click', '.delete-type', function() {
            let typeID;
            typeID = $(this).attr('data-typeID');
            console.log(typeID);
            $.ajax({
                type: 'POST',// formoje method POST GET
                url: '/types/deleteAjax/' + typeID  ,// formoje action
                success: function(data) {
                   
                   //tik dabar ir sitoje vietoje reiktu sugalvot if'a kaip patikrinti ar negautas error
                   //is controllerio, pradzioje pamegink pats, jei nepavyks parodysiu
                   if (data.logicTest == true) {
                    console.log('testtt');
                    $('.type'+typeID).remove();
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage); 
                   }else {
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage);  
                   }                   
                }
            });
        });

        // show
        $(document).on('click', '.show-type', function() {
            let typeID;
            typeID = $(this).attr('data-typeID');
            console.log(typeID);
            $.ajax({
                type: 'GET',// formoje method POST GET
                url: '/types/showAjax/' + typeID  ,// formoje action
                success: function(data) {
                   $('.show-type-id').html(data.typeID);                   
                   $('.show-type-title').html(data.typeTitle);                          
                   $('.show-type-description').html(data.typeDescription);                                  
                }
            });
        });

        // Edit display info
        $(document).on('click', '.edit-type', function() {
          let typeID;
          typeID = $(this).attr('data-typeID');
            
            $.ajax({
                type: 'GET',// formoje method POST GET
                url: '/types/showAjax/' + typeID  ,// formoje action
                success: function(data) {
                    
                  $('#edit_type_id').val(data.typeID);                   
                   $('#edit_type_title').val(data.typeTitle);                                     
                   $('#edit_type_description').val(data.typeDescription);   
                                                 
                }
            });
        });
        // Update after edit
        $(document).on('click', '#update-type', function() {
            let typeID;
            let type_title;
            let type_description;
            typeID = $('#edit_type_id').val();
            type_title = $('#edit_type_title').val();
          type_description = $('#edit_type_description').val();
          console.log("edit3");
          $.ajax({
                type: 'POST',// formoje method POST GET
                url: '/types/updateAjax/' + typeID  ,// formoje action
                data: {type_title: type_title, type_description: type_description  },
                success: function(data) {
                  
                  $(".type"+typeID+ " " + ".col-type-title").html(data.typeTitle)
                  $(".type"+typeID+ " " + ".col-type-description").html(data.typeDescription)
                  
                    $("#alert").removeClass("d-none");
                    $("#alert").html(data.successMessage);
                    
                    $("#editTypeModal").hide();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('body').css({overflow:'auto'});
                }
            });
        })
        

        // search function
          $(document).on('input', '#searchValue', function() {
          
          let searchValue = $('#searchValue').val();
          let searchFieldCount= searchValue.length;
          if(searchFieldCount == 0) {
            console.log("Field is empty");
            $(".search-feedback").css('display', 'block');
            $(".search-feedback").html("Field is empty");
          } else if (searchFieldCount != 0 && searchFieldCount< 3 ) {
            console.log("Min 3");
            $(".search-feedback").css('display', 'block');
            $(".search-feedback").html("Min 3");
          } else {
            $(".search-feedback").css('display', 'none');
          console.log(searchFieldCount);
          console.log(searchValue);
          $.ajax({
                type: 'GET',
                url: '{{route("type.searchAjax")}}'  ,
                data: {searchValue: searchValue},
                success: function(data) {
                  if($.isEmptyObject(data.errorMessage)) {
                    //sekmes atvejis
                    $("#types-table").show();
                    $("#alert").addClass("d-none");
                    $("#types-table tbody").html('');
                    // atliekamas ciklas
                     $.each(data.types, function(key, type) {
                          let html;
                          html = createRowFromHtml(type.id, type.title, type.description);
                          $("#types-table tbody").append(html);
                     });                             
                  } else {
                        $("#types-table").hide();
                        $('#alert').removeClass('alert-success');
                        $('#alert').addClass('alert-danger');
                        $("#alert").removeClass("d-none");
                        $("#alert").html(data.errorMessage); 
                  }                            
                }
            });
          }
        });
    })
</script>

@endsection