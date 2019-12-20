<div class="row mb-3">
    <h3>Class Levels</h3>
</div>

@foreach($classLevels as $level)
    <div class="row mb-3">
        <div class="col-4">
            {{ $level->name }}
        </div>

        <div class="col-4">

        </div>

        <div class="col-4 text-right">
            <button type="button"
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#level_{{ $level->id }}">
                Edit
            </button>
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade"
         id="level_{{ $level->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $level->name }}
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/settings/update-level') }}" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ $level->id }}" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">
                                Your {{ $level->name }}
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{ $level->name }}">
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