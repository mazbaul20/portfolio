@extends('backend.layout.app')
@section('content')

    @include('backend.components.home-section.list-herosection')
    @include('backend.components.home-section.delete-herosection')
    @include('backend.components.home-section.create-herosection')
    @include('backend.components.home-section.update-herosection')

@endsection