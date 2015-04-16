@extends('layouts.default')
@section('content')
<h2>login</h2>
    <form>
        <input type="hidden" name="_token" value="{!!csrf_token()!!}">
    </form>
@stop
