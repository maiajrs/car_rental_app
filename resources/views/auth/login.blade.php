@extends('layouts.app')

@section('content')
@csrf
    <login-component token_csrf="{{@csrf_token()}}"></login-component>
@endsection
