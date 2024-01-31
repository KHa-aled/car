@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Notifications
                </div>
                <div class="card-body">
                    @foreach(Auth::user()->notifications as $notification)
                        <h5><a href="/u/{{$notification->data['user_id']}}">{{ $notification->data['user_name'] }} started following you</a></h5>
                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
