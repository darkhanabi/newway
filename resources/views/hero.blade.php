<div class="col-md-12 hero-div shadow">
    <div class="text-center">
        <img class="rounded-circle thumbnail" src="{{ asset('images/portraits/'.$hero->image) }}">
    </div>

    <div class="text-center hero-title">
        <h4><strong>{{ $hero->name }}</strong></h4>
    </div>

    <table class="table-hero table-striped table-responsive">
        <tbody>
            <tr>
                <td><strong>Class</strong></td>
                <td>{{ $hero->class }}</td>
            </tr>
            <tr>
                <td><strong>Role</strong></td>
                <td>{{ $hero->role }}</td>
            </tr>
            <tr>
                <td><strong>HP</strong></td>
                <td>{{ $hero->hit_points }}</td>
            </tr>
            <tr>
                <td><strong>Attack</strong></td>
                <td>{{ $hero->attack }}</td>
            </tr>
            <tr>
                <td><strong>Defense</strong></td>
                <td>{{ $hero->defense }}</td>
            </tr>
            <tr>
                <td><strong>Attack Speed</strong></td>
                <td>{{ $hero->attack_speed }}</td>
            </tr>
            <tr>
                <td><strong>Move Speed</strong></td>
                <td>{{ $hero->move_speed }}</td>
            </tr>
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-6 text-center">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-hero-modal-{{ $hero->id }}">Edit</button>
        </div>
        <div class="col-md-6 text-center">
            <form action="/delete/<?=$hero->id?>" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="delete" />
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>