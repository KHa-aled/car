@extends('layouts.admin_layout.admin_design')

@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> الرئيسيه </a> <a href="#">السياره </a> <a href="#" class="current">عرض السيارات </a> </div>
    <h1>عرض المهام </h1>
 
 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  @if (session('success'))
                    <div class="alert alert-success">
                        {!! session('success') !!}
                    </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif
  </div>

  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>عرض المهام  </h5>
          </div>
          <div class="widget-content nopadding">

                     <div class="card">
                         <div class="card-body">
                             <p><b>{{ $showPost->title }}</b></p>
                             <p>
                                 {{ $showPost->body }}
                             </p>
                             <hr />

                             <div class="comment">
                           
                              @foreach($showPost->comments  as $comment)

                               <p>{{$comment->body}}</p>

                              @endforeach
                            
                             </div>


                             <h4>Add comment</h4>

                             <form method="post" action="{{$showPost->id}}/store">
                                 @csrf
                                 <div class="form-group">
                                  <textarea rows="4" cols=50" name="body"> </textarea>
                                   <input type="hidden" name="post_id" value="" />
                                 </div>

                                 <div class="form-group">
                                     <input type="submit" class="btn btn-info" value="Add Comment " />
                                 </div>

                             </form>
                         </div>
                     </div>          

      </div>
    </div>
  </div>
</div>





@endsection


