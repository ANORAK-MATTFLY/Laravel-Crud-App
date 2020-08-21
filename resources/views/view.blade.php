@extends('parent')

@section('main')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('crud.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <h3>titre - {{ $data->titre }} </h3>
 <h3>contenu - {{ $data->contenu }}</h3>
</div>
@endsection