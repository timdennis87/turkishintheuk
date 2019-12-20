@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">
                    <div class="col-12">
                        {!! $pageInfo->icon !!}
                        {{ $pageInfo->name }}
                    </div>
                </div>
            </div>

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    <div class="col">
                        <h5>
                            Hi, {{ auth()->user()->name }}
                        </h5>
                        <hr>
                    </div>

                    <div class="col">
                        <i class="far fa-chart-bar"></i> Page views
                        <hr>
                        <h5 class="text-center">
                            Email timdennis1987@gmail.com if you would like to activate your Page views
                        </h5>
                    </div>

                    <hr>

                    <div class="row mt-3">
                        <div class="col-md-4 text-center my-3">
                            <i class="far fa-chart-bar fa-5x"></i>
                            <p>
                                See what pages are being clicked
                            </p>
                        </div>

                        <div class="col-md-4 text-center my-3">
                            <i class="fas fa-users fa-5x"></i>
                            <p>
                                How many people are on your website
                            </p>
                        </div>

                        <div class="col-md-4 text-center my-3">
                            <i class="fas fa-search-location fa-5x"></i>
                            <p>
                                See where people are
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection