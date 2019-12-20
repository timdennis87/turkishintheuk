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

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>About Me</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td width="20%">
                                {{ $about->title }}
                            </td>
                            <td width="50%">
                                {!! $about->body !!}
                            </td>
                            <td class="text-center">
                                @if($about->image)
                                    <img src="{{ url('storage/images/about-me/'.$about->image) }}"
                                         width="100px">
                                @endif
                            </td>
                            <td class="text-center">
                                <button type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        data-target="#aboutMe">
                                    Edit
                                </button>
                            </td>
                        </tr>
                        </tbody>

                    </table>

                    <!-- Modal -->
                    <div class="modal fade"
                         id="aboutMe"
                         tabindex="-1"
                         role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h5 class="modal-title" id="exampleModalLabel">
                                        About Me
                                    </h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>

                                <form action="{{ url('admin/pages/about-me/update') }}"
                                      method="post"
                                      enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <div class="form-row">
                                                <div class="col">
                                                    <label for="title">
                                                        Title
                                                    </label>
                                                    <input type="text"
                                                           class="form-control mb-3"
                                                           id="title"
                                                           name="title"
                                                           value="{{ $about->title }}">
                                                </div>
                                            </div>

                                            <div class="custom-file my-3">
                                                <input type="file"
                                                       class="custom-file-input"
                                                       id="image"
                                                       value="{{ $about->image }}"
                                                       name="image">
                                                <label class="custom-file-label"
                                                       for="image">{{ $about->image ? $about->image : 'Browse Image' }}</label>
                                            </div>

                                            <label>About Me</label>
                                            <textarea class="form-control mb-3"
                                                      id="body"
                                                      name="body"
                                                      rows="3">{{ $about->body }}</textarea>
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

    <script>
        tinymce.init({
            selector: '#body',
            menubar: false,
            height: 200,
            toolbar: ['undo redo']
        });
    </script>

@endsection