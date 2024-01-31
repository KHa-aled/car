@extends('layouts.admin_layout.admin_design')

@section('content')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Companies</a> <a href="#" class="current">View Users</a> </div>
    <h1>View Users</h1>
    @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_error') !!}</strong>
           </div>
        @endif 
          
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button> 
              <strong>{!! session('flash_message_success') !!}</strong>
           </div>
        @endif
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Users</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              
                <tr>
                  <th>Name</th>
                   <th>Roles</th>
                   <th>Action</th>
                </tr>
              
              
                @forelse($users as $user)
                   <tr>
                       <td>{{$user->name}}</td>
                       <td>
                           @foreach($user->roles as $role)
                               {{$role->name}}
                           @endforeach

                       </td>

                       <td>
                           <!-- Button trigger modal -->
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal-{{$user->id}}">
                               Edit
                           </button>

                           <!-- Modal -->
                           <div class="modal fade" id="myModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                       aria-hidden="true">&times;</span></button>
                                           <h4 class="modal-title" id="myModalLabel">{{$user->name}} Role edit</h4>
                                       </div>
                                       <div class="modal-body">
                                           <form action="{{route('user.update',$user->id)}}" method="post" role="form" id="role-form-{{$user->id}}">
                                               {{csrf_field()}}
                                               {{method_field('PATCH')}}
                                               <div class="form-group">


                                                   <select name="roles[]"  multiple class=" form-control" >


                                                     <option value="" selected>No selected</option>

                                                       @foreach($allRoles as $role)
                                                           <option value="{{$role->id}}">{{$role->name}}
                                                           </option>
                                                       @endforeach
                                                   </select>

                                               </div>

                                               {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                           </form>
                                       </div>

                                       <div class="modal-footer">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           <button type="submit" class="btn btn-primary" onclick="$('#role-form-{{$user->id}}').submit()">Save changes</button>
                                       </div>
                                   </div>
                               </div>
                           </div>
                         </td>
                       </td>
                   </tr>
               @empty
                   <td>no users</td>
               @endforelse
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


