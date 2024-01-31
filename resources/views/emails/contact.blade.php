<h3>Verify Tou New Account</h3>

<div>

	<a href="{{ URL('/verify-user/'.$id.'/'.$token) }}">{{ $bodyMessage }}</a>
</div>

<p>Sent via {{ $email }}</p>
