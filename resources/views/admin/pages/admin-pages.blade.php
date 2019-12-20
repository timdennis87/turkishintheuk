@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">
                    <div class="col-12">
                        <i class="fas fa-file-alt mr-2"></i>
                        Pages
                    </div>
                </div>
            </div>

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Page Name</th>
                            <th>Page URL</th>
                            <th class="text-center">Display</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $page)
                            <tr>
                                <td width="50%">
                                    {{ $page->name }}
                                </td>
                                <td width="20%">
                                    <a href="{{ $page->url }}"
                                       target="_blank">
                                        {{ $page->url }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    {!! $page->display == 1 ? '<i class="fas fa-check text-success"></i>' : '' !!}
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-primary"
                                       href="/admin/pages/{{ $page->value }}">
                                        Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection