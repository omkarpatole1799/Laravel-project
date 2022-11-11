<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Omkar_laravel_project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        
        /* The Modal (background) */
        .modal {
          display: none; /* Hidden by default */
          position: fixed; /* Stay in place */
          z-index: 1; /* Sit on top */
          padding-top: 100px; /* Location of the box */
          left: 0;
          top: 0;
          width: 100%; /* Full width */
          height: 100%; /* Full height */
          overflow: auto; /* Enable scroll if needed */
          background-color: rgb(0,0,0); /* Fallback color */
          background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        
        /* Modal Content */
        .modal-content {
          position: relative;
          background-color: #fefefe;
          margin: auto;
          padding: 0;
          border: 1px solid #888;
          width: 80%;
          box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
          -webkit-animation-name: animatetop;
          -webkit-animation-duration: 0.4s;
          animation-name: animatetop;
          animation-duration: 0.4s
        }
        
        /* Add Animation */
        @-webkit-keyframes animatetop {
          from {top:-300px; opacity:0} 
          to {top:0; opacity:1}
        }
        
        @keyframes animatetop {
          from {top:-300px; opacity:0}
          to {top:0; opacity:1}
        }
        
        /* The Close Button */
        .close {
          color: white;
          float: right;
          font-size: 28px;
          font-weight: bold;
        }
        
        .close:hover,
        .close:focus {
          color: #000;
          text-decoration: none;
          cursor: pointer;
        }
        
        .modal-header {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        
        .modal-body {padding: 2px 16px;}
        
        .modal-footer {
          padding: 2px 16px;
          background-color: #5cb85c;
          color: white;
        }
        .modal-backdrop{
            z-index: 0;
        }
        </style>
  </head>
  <body id="viewData">
    
    {{-- register button --}}
    <div class="row">
        <div class="col col-md-1">
            <a href="signup">
                <button class="btn btn-success btn-sm m-2">Register</button>
            </a>
        </div>
        <div class="col col-md-1">
            <a href="{{ url('/view') }}">
                <button class="btn btn-secondary btn-sm m-2">Reset</button>
            </a>
        </div>
    </div>
    
    
{{-- search --}}
<div class="col">
    <form action="">
        <div class="row">
            {{-- name search --}}
            <div class="col-md-2">
                <div class="mb-1">
                    <input type="search" name="n_search" class="form-control" placeholder="Name Search" value="{{ $n_search }}">
                </div>
            </div>
            {{-- email search --}}
            <div class="col-md-2">
                <div class="mb-1">
                    <input type="search" name="e_search" class="form-control" placeholder="Email Search" value="{{ $e_search }}">
                </div>
            </div>
            {{-- date from search --}}
            <div class="col-md-2">
                <div class="mb-1">
                    <input type="date" name="d_f_search" class="form-control" placeholder="Date From" value="{{ $d_f_search }}">
                </div>
            </div>
            {{-- date to search --}}
            <div class="col-md-2">
                <div class="mb-1">
                    <input type="date" name="d_t_search" class="form-control" placeholder="Date To" value="{{ $d_t_search }}">
                </div>
            </div>

        </div>

        <button class="btn btn-primary btn-sm">Search</button>
    </form>

    
</div>

    <table class="table table-hover">
        <thead>
            <tr>            
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Created_at</th>
                <th>Action</th>  
                <th>View Data</th>          
            </tr>
        </thead>
        <tbody>
        {{-- @php sizeof($users) @endphp --}}

        <?php if(sizeof($users)){ ?>
        
            @foreach ($users as $user )
            <tr>    
                <th>{{ $user->id }}</th>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->Email }}</td>
                <td>
                    @if ($user->status == "1")
                    <button class="btn btn-primary btn-sm active_btn" value='{{ $user->id }}'>Active</button>    
                    @else 
                    <button class="btn btn-danger btn-sm active_btn" value='{{ $user->id }}'>Inactive</button>
                    @endif</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <a href="{{ url('/user/delete') }}/{{ $user->id }}">
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </a>
                    <a href="{{ url('/user/edit') }}/{{ $user->id }}">
                        <button class="btn btn-primary btn-sm">Edit</button>
                    </a>
                </td>
                <td>
                    <!-- Button trigger modal -->

                    <button type="submit" class="submit_show btn btn-primary btn-sm" value="{{ $user->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal"> show more </button>

                    
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="true" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                                <div class="modal-body">
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>                

            </tr>

            @endforeach  
           <?php }else{ ?>
                <tr>
                    <td colspan = "8" style="text-align:center;">Not found</td>
                </tr>
           <?php } ?>
        
        </tbody>
      </table>
      <div >

      </div>

    
      <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
      
      {{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function(){
            $('.active_btn').click(function(){
                let id = jQuery(this).val();
                if(confirm('Do you want to change status')== true){
                    jQuery.ajax({
                        url: 'status_update/'+id,
                        type: 'post',
                        data: 'id='+id+'&_token={{csrf_token()}}',
                        success:function(result){
                            jQuery('#viewData').html(result);
                        }
                    });
                }
            }),
            $('.submit_show').click(function(){
                let id_pop = jQuery(this).val();
                jQuery.ajax({
                    url: 'popup/'+id_pop,
                    type: 'get',
                    data: 'id='+id_pop+'&_token={{csrf_token()}}',
                    success:function(result){
                        jQuery('.modal-body').html(result);
                    }
                });
            
            });
        });
    </script>



  </body>
</html>
