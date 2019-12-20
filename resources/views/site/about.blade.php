@extends('layouts.site-body')

@section('content')

    <div class="row bg-dark text-white">

        <div class="container p-3">

            <div class="row">
                <div class="mx-auto text-center">

                    <h1>{{ $pageName->name }}</h1>

                </div>
            </div>

        </div>

    </div>

    <div class="container py-5">

        <div class="row">

            <div class="col-md-6 col-sm-12 my-auto text-center">
                <img src="{{ url('storage/images/about-me/'.$about->image) }}"
                     class="shadow-lg"
                     width="70%"
                     alt="">
            </div>

            <div class="col-md-6 col-sm-12 pt-5 pt-md-0 my-auto">

                <h3 class="mb-3">
                    {{ $about->title }}
                </h3>

                <p>
                    {!! $about->body !!}
                </p>

            </div>

        </div>

    </div>

    <section class="p-5" style="background: #9baab9">

        <div class="container">
            <div class="row">
                <h3 class="mx-auto">Get in contact today!</h3>
            </div>
            @include('includes.site.contact-form')
        </div>

    </section>

@endsection