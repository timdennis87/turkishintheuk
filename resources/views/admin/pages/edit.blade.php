@extends('layouts.admin-body')

@section('content')

    @if($pageName->id == 1)
        @include('admin.pages.edit.edit-home')
    @endif

    @if($pageName->id == 3)
        @include('admin.pages.edit.edit-about')
    @endif

    @if($pageName->id == 4)
        @include('admin.pages.edit.edit-contact')
    @endif

@endsection