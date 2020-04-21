@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Who is playin?</h1>
            <form action="/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Nada inputs
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                    <label for="name">Artist</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Artist name" value="{{ old('name') }}">
                    @if($errors->has('name'))
                        <span class="help-block">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                    <label for="text">Description</label>
                    <textarea class="form-control" id="text" name="text" placeholder="description">{{ old('text') }}</textarea>
                    @if($errors->has('text'))
                        <span class="help-block">{{ $errors->first('text') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
@endsection
