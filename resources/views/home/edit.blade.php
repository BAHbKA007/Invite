@extends('layouts.app')
@section('content')
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 align-self-center">
            <div class="card">
            <div class="card-header"><strong>Projekt "{{$project->title}}" bearbeiten</strong></div>
                @include('inc.messages')
                {!! Form::open(['action' => ['HomeController@update', $project->id], 'method' => 'POST', 'files' => true, 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group form_my">
                        {{Form::label('title', 'Titel:')}}
                        {{Form::text('title', $project->title, ['class' => 'form-control', 'placeholder' => 'Titel', 'required'])}}
                    </div>
                    <div class="form-group form_my">
                        {{Form::label('welcome_text', 'Willkommensnachricht:')}}
                        {{Form::textarea('welcome_text', $project->welcome_text, ['class' => 'form-control', 'placeholder' => '...', 'rows' => '3'])}}
                    </div>
                    <div class="form-group form_my">
                        {{Form::label('welcome_text_plural', 'Willkommensnachricht Plural:')}}
                        {{Form::textarea('welcome_text_plural', $project->welcome_text_plural, ['class' => 'form-control', 'placeholder' => '...', 'rows' => '3'])}}
                    </div>                    
                    <div class="form-group form_my">
                        {{Form::label('location_text', 'Location:')}}
                        {{Form::textarea('location_text', $project->location_text, ['class' => 'form-control', 'placeholder' => '...', 'rows' => '3'])}}
                    </div>
                    <div class="form-group form_my">
                        {{Form::label('phone', 'Telefonnummer :')}}
                        {{Form::text('phone', $project->phone, ['class' => 'form-control', 'placeholder' => '49'])}}
                    </div>
                    <div class="form-group form_my">
                        {{Form::label('pic_jpg', 'Bild Startseite:')}}<br>
                        {{Form::file('pic_jpg')}}
                    </div>
                    <div class="form-group form_my">
                        {{Form::label('bg_jpg', 'Hintergrund:')}}<br>
                        {{Form::file('bg_jpg')}}
                    </div>
                    {{Form::hidden('_method', 'PUT')}}
                    {{Form::submit('Daten aktualisieren', ['class' => 'btn btn-primary float-right', 'style' => 'margin: 10px 10px 10px 10px'])}}
                    <a type="button" href="/" class="btn btn-Secondary float-left" style="margin: 10px 10px 10px 10px">zurück</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function change_card_navbar() {
        document.getElementById("navbar").classList.remove("fixed-top");
        document.getElementsByTagName("main")[0].classList.remove("h-100");
        document.getElementsByClassName('card')[0].setAttribute("style", "margin: 14px 0 14px 0;");
    }
</script>
@endsection