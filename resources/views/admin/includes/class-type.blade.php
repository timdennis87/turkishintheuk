<div class="row mb-3">

    <div class="col">
        <h3>Class Types</h3>
    </div>

</div>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Type</th>
        <th width="10%" class="text-center">Edit</th>
    </tr>
    </thead>

    <tbody>
    @foreach($classTypes as $class)
        <tr>
            <td width="90%">
                {{ $class->class_type }}
            </td>

            <td width="10%"
                class="text-center">
                <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#classType_{{ $class->id }}">
                    Edit
                </button>
            </td>
        </tr>
    </tbody>

    <!-- Modal -->
    <div class="modal fade"
         id="classType_{{ $class->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $class->class_type }}
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/settings/update-class-type') }}"
                      method="post">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ $class->id }}" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="class_type">
                                Class Type
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="class_type"
                                   name="class_type"
                                   value="{{ $class->class_type }}"
                                   placeholder="Type of class">
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

</table>