@extends('parent')

@section('main')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
</div>

<form method="POST" action="{{ route('crud.update', $post->id) }}" >
 @method('PUT')
 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Titre</label>
  <div class="col-md-8">
   <input type="text" name="titre" value="{{ $post->titre }}" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Contenu</label>
  <div class="col-md-8">
   <input type="text" name="contenu" value="{{ $post->contenu }}" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="update" />
 </div>

</form>

@endsection