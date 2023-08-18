@extends('layout.sidenav-layout')
@section('content')
    @include('components.todo.todo-list')
    @include('components.todo.todo-delete')
    @include('components.todo.todo-create')
    @include('components.todo.todo-update')
@endsection