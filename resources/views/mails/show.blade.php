@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row card col-12 col-sm-10  col-lg-6 mx-auto">
        <div class="  bg-white shadow rounded py-3 px-4">
            <div class="card-body">
                <h5 class="card-title">{{$mail->asunto}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    De: {{$mail->user->name}}, «<small>{{$mail->user->email}}</small>»<br>
                    Para: {{$mail->userTo->name}}, «<small>{{$mail->userTo->email}}</small>»<br>
                </h6>
                <p class="card-text">{{$mail->contenido}}</p>
                <a href="#" class="card-link btn btn-primary">Responder</a>
                <a href="{{route('bandeja')}}" class="card-link btn btn-outline-primary" >Regresar</a>
            </div>
        </div>
    </div>

</div>
@endsection