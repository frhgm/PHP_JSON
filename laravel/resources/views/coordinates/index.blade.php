@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">coordinates</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>[id]</td>
          <td>[user id]</td>
          <td>[lat]</td>
          <td>[lng]</td>
          <td colspan = 2>[actions]</td>
        </tr>
    </thead>
    <div>
    <a style="margin: 19px;" href="{{ route('coordinates.create')}}" class="btn btn-primary">[new]</a>
    </div>
    <tbody>
        @foreach($coordinates as $coordinates)
        <tr>
            <td>{{$coordinates->id}}</td>
            <td>{{$coordinates->user_id}}</td>
            <td>{{$coordinates->lat}}</td>
            <td>{{$coordinates->lng}}</td>
            <td>
                <a href="{{ route('coordinates.edit',$coordinates->id)}}" class="btn btn-primary">[edit]</a>
            </td>
            <td>
                <form action="{{ route('coordinates.destroy', $coordinates->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">[delete]</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
<div class="col-sm-12">
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
@endif
</div>
@endsection