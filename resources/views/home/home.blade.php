@extends('layouts.app')
@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div style="z-index:200" class="card-header">
                    @if (count($projects) == 0)
                        <strong>Sie haben noch keine Projekte angelegt.</strong>
                    @else
                        <strong>{{count($projects)}} Projekt<?php if (count($projects) > 1) {echo 'e';} ?> angelegt:</strong>
                    @endif
                </div>
                <ul style="z-index:100" class="list-group list-group-flush">
                    @foreach ($projects as $project)
                        <div style="background-image: url('https://leichtbewaff.net/invite/storage/app/public/cover_images/{{$project->pic_jpg}}');filter: blur(4px);-webkit-filter: blur(4px);height: 60px;background-position: center;background-repeat: no-repeat;background-size: cover;"></div>
                        <li style="z-index:100" class="list-group-item">{{$project->title}} <small>erstellt am {{\Carbon\Carbon::parse($project->created_at)->format('d.m.Y')}}</small>
                        <div>
                            <a href="/invite/{{$project->id}}" class="btn btn-primary float-right" role="button" aria-pressed="true">einladen</a>
                            {!! Form::open(['action' => ['HomeController@destroy', $project->id], 'method' => 'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('löschen', ['class' => 'btn btn-danger float-left', 'style' => 'margin:0 4px 0 0'])}}
                            {!! Form::close() !!}
                            <a href="/home/{{$project->id}}/edit" class="btn btn-info float-left" style="color:white" role="button" aria-pressed="true">bearbeiten</a>
                        </div></li>
                    @endforeach
                </ul>
                <a href="/home/create" class="btn btn-success" role="button" aria-pressed="true">erstellen</a>
            </div>
        </div>
    </div>
</div>
@endsection
