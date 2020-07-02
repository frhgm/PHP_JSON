@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">update coordinates</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('coordinates.update', $coordinates->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">
            <label for="user_id">[user id]]</label>
                <input type="text" class="form-control" name="user_id" value={{ $coordinates->user_id }} />
            </div>
            <div class="form-group">
                <label for="lat">[lat]</label>
                <input type="text" class="form-control" name="lat" value={{ $coordinates->lat }} />
            </div>
            <div class="form-group">
                <label for="lng">[lng]</label>
                <input type="text" class="form-control" name="lng" value={{ $coordinates->lng }} />
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection