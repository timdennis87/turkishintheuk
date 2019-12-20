@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">
                    <div class="col-12">
                        <i class="fas fa-cog mr-2"></i>
                        Settings
                    </div>
                </div>
            </div>

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    @include('admin.includes.main-contacts')

                    <hr>

                    @include('admin.includes.promo')

                    <hr>

                </div>

            </div>

        </div>
    </div>

@endsection