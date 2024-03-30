@extends('layout.app')
@section('meta_title', trans('crudnavbar::navbar.add'))

@section('content')
<h1>{{ trans('crudnavbar::navbar.add') }}</h1>
@include('crudnavbar::form')
@endsection