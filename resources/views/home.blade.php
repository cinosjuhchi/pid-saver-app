@extends('layouts.home')
@section('content')
    @include('component.search-home')
    @include('component.filter.filter-file-folder')
    @include('component.card.card-file-folder')
@endsection