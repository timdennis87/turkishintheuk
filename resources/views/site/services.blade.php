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

    <section class="py-5">

        <div class="container">
            <h3>{{ $message->title }}</h3>
            <br>
            {!! $message->body !!}
        </div>

    </section>


    <hr>

    @foreach($services as $serv)

        <section class="py-5" style="background: {{ $serv->background }}">

            <div class="container">

                <div class="row m-3">

                    <div class="col-12">
                        <h3>{{ $serv->class_type }}</h3>
                    </div>

                </div>

            </div>

            <div class="container">

                <div class="row">

                    <div class="card-deck mx-3">

                        @foreach($serv->services as $service)

                            <div class="card {{ $service->class }}"
                                 style="background: {{ $service->color }};">

                                <div class="card-header">
                                    {{ $service->name }}
                                </div>

                                <div class="card-body">
                                    {!! $service->description !!}
                                </div>

                                <div class="card-footer">
                                    <div class="row px-2">
                                        <div class="mr-auto">
                                            Only £{{ $service->price }}
                                        </div>
                                        <div class="ml-auto">
                                            <a href="/join?type=join&classType={{ $service->type }}&className={{ $service->id }}">
                                                Choose Class
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        @endforeach
                    </div>

                </div>

            </div>

        </section>

    @endforeach

    <section class="p-5" style="background: #9baab9">

        <div class="container">
            <div class="row">
                <h3 class="mx-auto">Get in contact today!</h3>
            </div>
            @include('includes.site.contact-form')
        </div>

    </section>


@endsection