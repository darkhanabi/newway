<div id="edit-hero-modal-{{ $hero->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content modal-background">
            <div class="modal-body">
            	<div class="row">
                    <div class="col-md-12">
                        @include('form', ['formType' => 'edit'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>