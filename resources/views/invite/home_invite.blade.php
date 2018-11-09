@extends('layouts.app')

@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>Perosnen:</strong> 
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{-- @foreach ($names as $name)
                            {{$name->names}}
                        @endforeach --}}
                        <input type="text">
                    </li>
                </ul>
                <a href="/home/create" class="btn btn-success" role="button" aria-pressed="true">erstellen</a>
            </div>
        </div>
    </div>
</div>
@endsection