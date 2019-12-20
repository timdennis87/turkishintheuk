<div class="modal fade"
     id="myModal"
     tabindex="-1"
     role="dialog"
     aria-hidden="true">
    <div class="modal-dialog"
         role="document">
        <div class="modal-content text-success" style="background: #edfff8;">

            <div class="modal-header">

                <button type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                </button>

            </div>

            <div class="modal-body">

                <div class="mx-auto text-center">
                    <h3>
                        <strong>
                            {{ $promo->name }}
                        </strong>
                    </h3>
                    <br>
                    {!! $promo->description !!}
                </div>

            </div>

            <div class="modal-footer">
                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">Close
                </button>

                <a href="/join?type={{ $promo->value }}&classType={{ $classType }}&className="
                   class="btn btn-success text-white shadow px-5">
                    {{ $promo->button }}
                </a>

            </div>

        </div>
    </div>
</div>