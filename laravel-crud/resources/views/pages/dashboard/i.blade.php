@extends('layout.sidenav-layout')
@section('content')
    @include('components.product.todo-list')
    @include('components.product.todo-delete')
    @include('components.product.todo-create')
    @include('components.product.todo-update')
@endsection