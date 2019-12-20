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

    <section class="p-5">

        <div class="container">
            @if($_GET['type'] == 'join')
                <p>
                    {!! $joinMessage->title !!}
                </p>
                <p>
                    {!! $joinMessage->body !!}
                </p>
                <hr>
            @else
                <p>
                    {!! $joinMessage->message !!}
                </p>
                <hr>
            @endif
            @include('includes.site.join-form')
        </div>

    </section>


@endsection