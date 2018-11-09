@extends('layouts.app')
@section('content')
<meta id="project_id" data-id="{{$var['project_id']}}">
<div class="container h-100">
    <div class="row justify-content-center h-100">
        <div class="col-md-8 align-self-center">
            <div class="card">
                <div class="card-header">
                    <strong>Perosnen:</strong>
                <span class="float-right">Eingeladen: {{$var['eingeladen']}}</span><br>
                <span @if (count($var['zusagen']) > 0) data-toggle="popover" title="folgende Leute haben zugesagt:" data-html="true" data-content="@foreach ($var['zusagen'] as $z){{$z->name}}<br>@endforeach" @endif class="float-right">Zusagen: {{count($var['zusagen'])}}</span><br>
                <span class="float-right" @if (count($var['absagen']) > 0) data-toggle="popover" title="folgende Leute haben abgesagt:" data-html="true" data-content="@foreach ($var['absagen'] as $z){{$z->name}}<br>@endforeach" @endif>Absagen: {{count($var['absagen'])}}</span>
                </div>
                @include('inc.messages')
                    <div class="field_wrapper form_my" >
                        @foreach ($var['names'] as $name)
                        <div class="input-group">
                        <input type="text" class="form-control" aria-describedby="button-addon2" value="{{$name->names}}" readonly>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="../home/{{$name->hash}}?nocount=1" type="button" data-id="{{$name->id}}"><i style="width: 20px; height: 20px;" class="my_but fab fa-safari"></i></a>
                                <a style="width: 46px; height: 37px;" class="btn btn-success" href="whatsapp://send?text={{urlencode('Hallo '.str_replace(',',' und ', str_replace(' ','',$name->names))).'%0D%0A%0D%0A'.$var['whattsapp'].'%0D%0A%0D%0A'.urlencode('*'.$name->bitly.'*')}}" type="button" data-id="{{$name->id}}">
                                    <i class="my_but fab fa-whatsapp"></i></a>
                                <a class="btn btn-danger del" type="button" data-id="{{$name->id}}"><i style="width: 20px; height: 20px;" class="my_but far fa-trash-alt"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div>
                    <a type="button" href="/" class="btn btn-Secondary float-left" style="margin: 10px 10px 10px 10px">zurück</a>
                    <button class="btn btn-success float-right" style="margin: 10px 10px 10px 10px" type="button" id="syn"><i class="fas fa-sync-alt"></i> Liste synchronisieren</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection