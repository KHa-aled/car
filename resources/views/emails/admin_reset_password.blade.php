@component('mail::message')
# Introduction
Welcom {{$data['data']->name}} <br>
The body of your message.

 @component('mail::button', ['url' => '/reset/password/'. $data['token']])
Click Here To Reset Your Password
@endcomponent 
Or <br>
Copy This Link
<a href="{{url('reset/password/'. $data['token'])}}" class="btn btn-info">Click Here To Reset Your Password
</a>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
