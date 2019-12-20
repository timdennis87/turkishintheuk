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

    <section class="p-5" style="background: #9baab9">

        <div class="container">

            <div class="row">
                <div class="col-lg-6 mb-3">

                    <h3>{{ $message->title }}</h3>
                    <br>
                    {!! $message->body !!}

                    <hr>

                    @foreach($mainContacts as $contact)
                        <div class="row">
                            <div class="col-5">
                                {{ $contact->name }}:
                            </div>
                            <div class="col-7">
                                <a target="_blank"
                                   href="{{ $contact->class }}:">
                                    {{ $contact->description }}
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <hr class="d-lg-none">

                </div>

                <div class="col-lg-6">
                    @include('includes.site.contact-form')
                </div>
            </div>
        </div>

    </section>


@endsection