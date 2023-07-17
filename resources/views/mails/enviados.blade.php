@extends('layouts.app')
@section('script')
@vite([ 'resources/js/bandeja.js'])
@endsection
@section('content')

@auth
    

<div class="container ">
    <div class="row">
        <div class="col-12 col-sm-12  col-lg-12 mx-auto">
            <div class="bg-white shadow rounded py-3 px-4" >
                <div class="d-flex justify-content-between align-items-center ">
                    <h1 class="display-4 mb-0">@lang("Bandeja de entrada")</h1>
                    <a class="btn btn-primary"href="{{route('mails.create')}}">Redactar Mail </a>
                    
                </div>
                <hr>    
                @include('partials.tools')
                <p class="lead text-secondary">Mails enviados.</p>
                <hr>
                <ul class="list-group">
                    
                        @forelse ($mails as $mail)
                    
                            <li id="mail-{{$mail->id}}" class="mail-content list-group-item list-group-item-action  mb-3 shadow-sm align-item-center border-0" >
                                <a class="mail d-flex justify-content-between "
                                href="{{route('bandeja.show', $mail)}}">
                                
                                    <span class="text-secondary font-weight-bold d-inline name-mail" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <input class=" mycheck form-check-input" type="checkbox" data-mail-id="{{$mail->id}}"> 
                                        Para:<strong>  {{$mail->userTo->name}}</strong>
                                    </span>          
                                <span class="text-black-50 d-inline content-mail" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <strong>{{$mail->asunto}}</strong> - {{$mail->contenido}}
                                </span>
                                <span class="text-black-50 d-inline date-mail " style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{$mail->created_at->format('Y-m-d')}}
                                </span>
                                    
                                </a>
                            </li>
                        @empty
                            <li class="list-group-item border-0 mb-3 shadow-sm bg-light align-item-center">
                                No hay Mails disponibles.
                            </li>
                        @endforelse
                        {{$mails->links()}}
                </ul>
            </div>
        </div>
    </div>
</div>
@endauth
@endsection