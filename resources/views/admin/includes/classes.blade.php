<div class="row mb-3">

    <div class="col">
        <h3>Classes</h3>
    </div>

</div>

<table class="table table-sm">
    <thead>
    <tr>
        <th>Class</th>
        <th>Type</th>
        <th>Price</th>
        <th width="10%" class="text-center">Edit</th>
    </tr>
    </thead>

    <tbody>
    @foreach($classes as $class)
        <tr>
            <td width="20%">
                {{ $class->name }}
            </td>

            <td width="50%">
                {{ $class->class_type }}
            </td>

            <td width="20%">
                £{{ $class->price }}
            </td>

            <td width="10%"
                class="text-center">
                <button type="button"
                        class="btn btn-primary"
                        data-toggle="modal"
                        data-target="#classBox_{{ $class->id }}">
                    Edit
                </button>
            </td>
        </tr>
    </tbody>

    <!-- Modal -->
    <div class="modal fade"
         id="classBox_{{ $class->id }}"
         tabindex="-1"
         role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ $class->name }}
                    </h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>

                <form action="{{ url('admin/settings/update-class') }}"
                      method="post">
                    {{ csrf_field() }}

                    <input type="hidden" value="{{ $class->id }}" name="id">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="name">
                                Class Name
                            </label>
                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   value="{{ $class->name }}"
                                   placeholder="Name of class">
                        </div>

                        <div class="form-group">
                            <label for="type">Class Type</label>
                            <select id="type" name="type" class="form-control">
                                @foreach($classTypes as $type)
                                    <option value="{{ $type->id }}"
                                            {{ $class->type == $type->id ? 'selected' : ''}}
                                    >
                                        {{ $type->class_type }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">
                                Class Price
                            </label>
                            £<input type="text"
                                   class="form-control"
                                   id="price"
                                   name="price"
                                   value="{{ $class->price }}"
                                   placeholder="Price of class">
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="description">
                                    Class Description
                                </label>
                                <textarea class="form-control description"
                                          id="description"
                                          name="description"
                                          rows="4">{{ $class->description }}</textarea>
                            </div>
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

<script>
    tinymce.init({
        selector: '.description',
        menubar: false,
        height: 200,
        toolbar: ['undo redo']
    });
</script>