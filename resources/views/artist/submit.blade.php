@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Who is playin?</h1>
        </div>
        <div class="row">

            <form id="artist" action="/artist/submit" method="post" enctype="multipart/form-data">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Nada inputs
                    </div>
                @endif

                {!! csrf_field() !!}

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Artist</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}"
                           autocomplete="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="text" class="col-md-4 col-form-label">Description</label>
                </div>
                <div class="md-form">
                        <textarea id="text"
                                  type="text"
                                  rows="5"
                                  class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}"
                                  name="text"
                                  value="{{ old('text') }}"
                                  autocomplete="text" autofocus>></textarea>
                    @if ($errors->has('text'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="apple_music" class="col-md-4 col-form-label">apple_music</label>

                    <input id="apple_music"
                           type="url"
                           class="form-control{{ $errors->has('apple_music') ? ' is-invalid' : '' }}"
                           name="apple_music"
                           value="{{ old('apple_music') }}"
                           autocomplete="apple_music" autofocus>

                    @if ($errors->has('apple_music'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('apple_music') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="spotify_id" class="col-md-4 col-form-label">spotify_id</label>

                    <input id="spotify_id"
                           type="url"
                           class="form-control{{ $errors->has('spotify_id') ? ' is-invalid' : '' }}"
                           name="spotify_id"
                           value="{{ old('spotify_id') }}"
                           autocomplete="spotify_id" autofocus>

                    @if ($errors->has('spotify_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('spotify_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="youtube_id" class="col-md-4 col-form-label">youtube_id</label>

                    <input id="youtube_id"
                           type="url"
                           class="form-control{{ $errors->has('youtube_id') ? ' is-invalid' : '' }}"
                           name="youtube_id"
                           value="{{ old('youtube_id') }}"
                           autocomplete="youtube_id" autofocus>

                    @if ($errors->has('youtube_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('youtube_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="band_camp_id" class="col-md-4 col-form-label">band_camp_id</label>

                    <input id="band_camp_id"
                           type="url"
                           class="form-control{{ $errors->has('band_camp_id') ? ' is-invalid' : '' }}"
                           name="band_camp_id"
                           value="{{ old('band_camp_id') }}"
                           autocomplete="band_camp_id" autofocus>

                    @if ($errors->has('band_camp_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('band_camp_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="soundcloud_id" class="col-md-4 col-form-label">soundcloud_id</label>

                    <input id="soundcloud_id"
                           type="url"
                           class="form-control{{ $errors->has('soundcloud_id') ? ' is-invalid' : '' }}"
                           name="soundcloud_id"
                           value="{{ old('soundcloud_id') }}"
                           autocomplete="soundcloud_id" autofocus>

                    @if ($errors->has('soundcloud_id'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('soundcloud_id') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="webpage" class="col-md-4 col-form-label">Webpage</label>

                    <input id="webpage"
                           type="url"
                           class="form-control{{ $errors->has('webpage') ? ' is-invalid' : '' }}"
                           name="webpage"
                           value="{{ old('webpage') }}"
                           autocomplete="webpage" autofocus>

                    @if ($errors->has('webpage'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('webpage') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">

                    <label for="image" class="col-md-4 col-form-label">Image</label>

                    <input id="image"
                           type="file"
                           class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}"
                           name="image"
                           value="{{ old('image') }}"
                           autocomplete="image" autofocus>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </form>
        </div>
        <div class="row pt-1">
            <button type="submit" class="btn btn-primary" form="artist">Submit</button>
        </div>
    </div>
@endsection
