@extends('layouts.default')
@section('content')
<h2>login</h2>
<form action="{{{route('auth.provide')}}}" method="post">
    <input type="hidden" name="_token" value="{{{csrf_token()}}}">
    <button type="submit">authenticate</button>
</form>

@stop
