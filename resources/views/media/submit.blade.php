@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>What is playin?</h1>
        </div>
        <div class="row">
            <form action="/media/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Nada inputs
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('media_id') ? ' has-error' : '' }}">
                    <label for="name">ID</label>
                    <input type="text" class="form-control" id="media_id" name="media_id" placeholder="Enter id"
                           value="{{ old('media_id') }}">
                    @if($errors->has('media_id'))
                        <span class="help-block">{{ $errors->first('media_id') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                    <label for="username">Twich Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Twich username"
                           value="{{ old('username') }}">
                    @if($errors->has('username'))
                        <span class="help-block">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                    <label for="name">Type</label>
                    <input type="text" class="form-control" id="type" name="type" placeholder="Enter 'video'/'stream'"
                           value="{{ old('type') }}">
                    @if($errors->has('type'))
                        <span class="help-block">{{ $errors->first('type') }}</span>
                    @endif
                </div>
                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
