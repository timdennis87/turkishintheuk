<div class="row mb-3">
    <h3>Promotions</h3>
</div>

@foreach($promotions as $promo)

    <div class="row mb-3">
        <div class="col-4">
            {{ $promo->name }}
        </div>

        <div class="col-6">
            {{ $promo->description }}
        </div>

        <div class="col-1 text-right">
            {!! $promo->display == 1 ? '<i class="fas fa-check text-success"></i>'
            : '<i class="fas fa-times text-danger"></i>' !!}
        </div>

        <div class="col-1 text-right">
            <button type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#promo_{{ $promo->id }}">
                Edit
            </button>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="promo_{{ $promo->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        Promotion Bar
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/settings/update-promo') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ $promo->id }}" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-6">
                                    <label for="name">
                                        Title
                                    </label>
                                    <input type="text"
                                           class="form-control mb-3"
                                           id="name"
                                           name="name"
                                           value="{{ $promo->name }}">
                                </div>


                                <div class="col-6">
                                    <label for="button">
                                        Button text
                                    </label>
                                    <input type="text"
                                           class="form-control mb-3"
                                           id="button"
                                           name="button"
                                           value="{{ $promo->button }}">
                                </div>
                            </div>

                            <label>Description</label>
                            <textarea class="form-control mb-3"
                                      id="description"
                                      name="description"
                                      rows="3">{{ $promo->description }}</textarea>

                            <label for="email_subject">
                                Subject for email notification
                            </label>
                            <input type="text"
                                   class="form-control mb-3"
                                   id="email_subject"
                                   name="email_subject"
                                   value="{{ $promo->email_subject }}">

                            <label>Message</label>
                            <textarea class="form-control mb-3"
                                      id="message_{{ $promo->id }}"
                                      name="message"
                                      rows="5">{{ $promo->message }}</textarea>
                        </div>

                        <div class="form-check my-3">
                            <input class="form-check-input"
                                   type="checkbox"
                                   value="1"
                                   name="display"
                                   id="display"
                                    {!! $promo->display == 1 ? 'checked' : '' !!}>
                            <label class="form-check-label"
                                   for="display">
                                Display promotion on site?
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

    <script>
        tinymce.init({
            selector: '#message_{{ $promo->id }}',
            menubar: false,
            height: 200,
            toolbar: ['undo redo']
        });
    </script>

@endforeach