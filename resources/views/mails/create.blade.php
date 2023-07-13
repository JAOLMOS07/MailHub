@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12 col-sm-10  col-lg-6 mx-auto">


            <form class="bg-white shadow rounded py-3 px-4" 
                method="post" 
                action="{{route('mails.store')}}">
                @csrf   
                <h1 class="display-4">@lang("Send Emal")</h1>
                <hr>  
                
                <div class="form-group">
                    <label for="email">@lang("Email")</label>
                    <input class="form-control bg-light @error('email') is-invalid @else border-0 @enderror shadow-sm " 
                    id="email"
                    name="email" 
                    placeholder="@lang("Email")..." 
                    value="">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>      
                @enderror
                </div>   
                
                <div class="form-group">
                    <label for="subject">@lang("Subject")</label>
                    <input class="form-control bg-light @error('subject') is-invalid @else border-0 @enderror shadow-sm " 
                    id="subject"
                    name="subject" 
                    placeholder="@lang("Subject")..." 
                    value="{{old('subject')}}">
                @error('subject')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>      
                @enderror
                </div>
    
    
                <div class="form-group">
                    <label for="content">@lang("Content")</label>
                    <textarea class="form-control bg-light @error('content') is-invalid @else border-0 @enderror shadow-sm " 
                    id="content"
                    name="content" 
                    placeholder="@lang("Content")..." 
                    >{{old('content')}}</textarea>
                @error('content')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>      
                @enderror
                </div>
                <br>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="importante" name="importante">
                    <label class="form-check-label" for="importante">@lang("Importante")</label>
                </div>
                @error('importante')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>      
                @enderror
                <button class="btn btn-primary btn-lg col-12 my-3">Enviar</button><br>
    
            </form>
        </div>
    </div>

</div>
@endsection