@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">
                    <div class="col-12">
                        <i class="fas fa-edit mr-2"></i>
                        Edit | {{ $page->name }}
                    </div>
                </div>
            </div>

            <div class="card-body scroll-bar"
                 style="height: 500px;">

                <div class="container">

                    @include('admin.includes.service-message')

                    <hr>
                    <hr>

                    @include('admin.includes.class-type')

                    <hr>
                    <hr>

                    @include('admin.includes.classes')

                </div>

            </div>

            <div class="card-footer">

                <div class="row">
                    <div class="ml-auto">

                        <a href="/admin/pages"
                           class="btn btn-secondary mr-3">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Back
                        </a>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection