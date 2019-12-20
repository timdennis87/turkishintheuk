@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">
                    <div class="col-12">
                        <i class="fas fa-hashtag mr-2"></i>
                        Social Links
                    </div>
                </div>
            </div>

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th class="text-center">Icon</th>
                            <th>Name</th>
                            <th>URL</th>
                            <th class="text-center">Display</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($socialLinks as $link)

                            <tr>

                                <td class="text-center"
                                    width="10%"
                                    style="color: {{ $link->color }}; font-size: 1.5em;">
                                    {!! $link->icon !!}
                                </td>

                                <td width="30%">
                                    {{ $link->name }}
                                </td>

                                <td width="50%">

                                    <a href="{{ $link->url }}"
                                       target="_blank">
                                        {{ $link->url }}
                                    </a>

                                </td>

                                <td width="10%"
                                    class="text-center">

                                    {!! $link->display == 1 ? '<i class="fas fa-check text-success"></i>' : '' !!}

                                </td>

                                <td width="10%"
                                    class="text-center">

                                    <!-- Button trigger modal -->
                                    <button type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#social_{{ $link->id }}">
                                        Edit
                                    </button>

                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade"
                                 id="social_{{ $link->id }}"
                                 tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {!! $link->icon !!} | {{ $link->name }}
                                            </h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>

                                        <form action="{{ url('admin/social-links/update') }}" method="post">
                                            {{ csrf_field() }}

                                            <input type="hidden" value="{{ $link->id }}" name="id">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="url">
                                                        Your {{ $link->name }} URL
                                                    </label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="url"
                                                           name="url"
                                                           value="{{ $link->url }}"
                                                           placeholder="Link to your {{ $link->name }} page">
                                                </div>

                                                <div class="form-check my-3">
                                                    <input class="form-check-input"
                                                           type="checkbox"
                                                           value="1"
                                                           name="display"
                                                           id="display"
                                                            {!! $link->display == 1 ? 'checked' : '' !!}>
                                                    <label class="form-check-label"
                                                           for="display">
                                                        Display link on site?
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal">Close
                                                </button>

                                                <button type="submit"
                                                        class="btn btn-success">
                                                    Apply Changes
                                                    <i class="fas fa-save ml-2"></i>
                                                </button>

                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

@endsection