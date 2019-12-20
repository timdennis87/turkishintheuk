@extends('layouts.admin-body')

@section('content')

    <div class="col">
        <div class="card shadow">
            <div class="card-header bg-info text-white pl-3">
                <div class="row">

                    <div class="col-6">
                        <i class="fas fa-star mr-2"></i>
                        Reviews
                    </div>

                </div>
            </div>

            <div class="card-body scroll-bar" style="height: 500px;">

                <div class="container">

                    <button type="button"
                            class="btn btn-success my-3"
                            data-toggle="modal"
                            data-target="#newReview">
                        <i class="fas fa-plus mr-2"></i>
                        Add review
                    </button>

                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Review</th>
                            <th class="text-center">Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($reviews as $review)

                            <tr>

                                <td width="20%">
                                    {{ $review->name }}
                                </td>

                                <td width="70%">
                                    {{ $review->review }}
                                </td>

                                <td width="10%"
                                    class="text-center">

                                    <!-- Button trigger modal -->
                                    <button type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#review_{{ $review->id }}">
                                        Edit
                                    </button>

                                </td>

                            </tr>

                            <!-- Modal -->
                            <div class="modal fade"
                                 id="review_{{ $review->id }}"
                                 tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="exampleModalLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h5 class="modal-title" id="exampleModalLabel">
                                                {{ $review->name }}
                                            </h5>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                        </div>

                                        <form action="{{ url('admin/reviews/update') }}" method="post">
                                            {{ csrf_field() }}

                                            <input type="hidden" value="{{ $review->id }}" name="id">

                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="name">
                                                        Customer's Name
                                                    </label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="name"
                                                           name="name"
                                                           value="{{ $review->name }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="review">
                                                        Customer's Review
                                                    </label>
                                                    <textarea class="form-control"
                                                              id="review"
                                                              name="review"
                                                              rows="3">{{ $review->review }}</textarea>
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

    <div class="modal fade"
         id="newReview"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        Add a new review
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/reviews/create') }}" method="post">
                    {{ csrf_field() }}

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">
                                Customer's Name
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name">
                        </div>

                        <div class="form-group">
                            <label for="review">
                                Customer's Review
                            </label>
                            <textarea class="form-control"
                                      id="review"
                                      name="review"
                                      rows="3"></textarea>
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

@endsection