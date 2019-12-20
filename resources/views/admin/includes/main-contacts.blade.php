<div class="row mb-3">
    <h3>Main Contact Information</h3>
</div>

@foreach($mainContacts as $contact)

    <div class="row mb-3">

        <div class="col-4">
            Main {{ $contact->name }}
        </div>


        <div class="col-4">
            {{ $contact->description }}
        </div>

        <div class="col-4 text-right">
            <button type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#setting_{{ $contact->id }}">
                Edit
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="setting_{{ $contact->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $contact->name }}
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/settings/update-contact') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ $contact->id }}" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="description">
                                Your {{ $contact->name }}
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="description"
                                   name="description"
                                   value="{{ $contact->description }}"
                                   placeholder="Link to your {{ $contact->name }}">
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