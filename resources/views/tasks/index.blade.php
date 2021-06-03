@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('tasks.tasks')
    @else
        @include('welcome')
    @endif
@endsection