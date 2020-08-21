@inject('categorie','App\Categorie')
@extends('parent')

@section('main')

<div class="" align="right">
    <a href="{{ route('crud.create') }}">Add</a>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-secondary">
    <p> {{$message}} </p>
</div>
@endif

<table class="table table-bordered table-striped">
    <tr>
        <th width="35%">titre</th>
        <th width="30%">contenu</th>
        <th width="30%">Categorie</th>
    </tr>
    @foreach($data as $row)
    <tr>
        <td>{{ $row->titre }}</td>
        <td>{{ $row->contenu }}</td>
        <td>{{ $row->nom}}</td>
        <td>

            <a class="dropdown-item" href='{{ route("crud.destroy",$row->id) }}' onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                Suprimer
            </a>

            <form id="logout-form" action='{{ route("crud.destroy",$row->id) }}' method="POST" style="display: none;">
                @method('DELETE')
                @csrf
            </form>
        </td>
        <td>
            <a href='{{ route("crud.edit",$row->id) }}' class="btn btn-btn-dark"> Modifier </a>
        </td>
    </tr>
    @endforeach
</table>
{!! $data->links() !!}
@endsection