@extends('sbadmin.index')

@section('custom-css')
@endsection

@section('menu')
    @include('user.partials.menu')
@endsection

@section('content')
@endsection

@section('custom-css')
@endsection

@section('logout-button')

<a class="btn btn-primary" href="javascript:void(0)"
  onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
  Logout
</a>
<form id="logout-form" action="{{route('user.logout')}}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>
@endsection