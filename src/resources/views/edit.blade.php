@extends('layout.app')
@section('meta_title', trans('crudnavbar::navbar.edit'))

@section('content')
<h1>{{ trans('crudnavbar::navbar.edit') }}</h1>
@include('crudnavbar::form')
@endsection