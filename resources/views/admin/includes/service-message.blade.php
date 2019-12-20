<div class="row mb-3">

    <div class="col">
        <h3>Services Page Text</h3>
    </div>

</div>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Title</th>
        <th>Body</th>
        <th class="text-center">Edit</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td width="30%">
            {{ $message->title }}
        </td>
        <td width="60%">
            {!! $message->body !!}
        </td>
        <td width="10%"
            class="text-center">
            <button type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#editMessage">
                Edit
            </button>
        </td>
    </tr>
    </tbody>

</table>

<!-- Modal -->
<div class="modal fade"
     id="editMessage"
     tabindex="-1"
     role="dialog"
     aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">
                    Service Text
                </h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <form action="{{ url('admin/pages/services/update-message') }}"
                  method="post">

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
                                       value="{{ $message->title }}">
                            </div>
                        </div>

                        <label>Message</label>
                        <textarea class="form-control mb-3"
                                  id="body"
                                  name="body"
                                  rows="3">{{ $message->body }}</textarea>
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
        selector: '#body',
        menubar: false,
        height: 200,
        toolbar: ['undo redo']
    });
</script>