<form action="{{ $formType == 'edit' ? '/edit/'.$hero->id : '/add' }}" method="post" enctype="multipart/form-data">
    <div class="row form-group">
        <div class="col-md-4"><strong>Name</strong></div>
        <div class="col-md-8"><input type="text" name="name" class="form-control" value="{{ $formType == 'edit' ? $hero->name : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Class</strong></div>
        <div class="col-md-8"><input type="text" name="class" class="form-control" value="{{ $formType == 'edit' ? $hero->class : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Role</strong></div>
        <div class="col-md-8"><input type="text" name="role" class="form-control" value="{{ $formType == 'edit' ? $hero->role : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>HP</strong></div>
        <div class="col-md-8"><input type="number" min="1" max="9999" name="hit_points" class="form-control check-number" value="{{ $formType == 'edit' ? $hero->hit_points : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Attack</strong></div>
        <div class="col-md-8"><input type="number" min="1" max="99" name="attack" class="form-control check-number" value="{{ $formType == 'edit' ? $hero->attack : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Defense</strong></div>
        <div class="col-md-8"><input type="number" min="1" max="99" name="defense" class="form-control check-number" value="{{ $formType == 'edit' ? $hero->defense : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Attack Speed</strong></div>
        <div class="col-md-8"><input type="number" min="1" max="99" name="attack_speed" class="form-control check-number" value="{{ $formType == 'edit' ? $hero->attack_speed : '' }}"></div>
    </div>
    <div class="row form-group">
        <div class="col-md-4"><strong>Move Speed</strong></div>
        <div class="col-md-8"><input type="number" min="1" max="99" name="move_speed" class="form-control check-number" value="{{ $formType == 'edit' ? $hero->move_speed : '' }}"></div>
    </div>

    <hr>
    
    <div class="row form-group">
        <div class="col-md-4"><strong>Portrait</strong> </div>
        <div class="col-md-4"><label class="btn btn-secondary">Choose File<input type="file" name="image" class="portrait_upload" style="display: none;" data-hero-id="{{ $formType == 'edit' ? $hero->id : '' }}"></label></div>
        <div class="col-md-4">
            @if ($formType == 'edit')
            <img src="{{ asset('images/portraits/'.$hero->image) }}" id="preview{{ $hero->id }}" class="rounded-circle thumbnail">
            @else
            <img src="{{ asset('images/layout/preview.png') }}" id="preview" class="rounded-circle thumbnail">
            @endif
        </div>
    </div>

    <hr>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="text-center">
        <button type="submit" class="btn btn-default"><strong>Save</strong></button>
    </div>
</form>