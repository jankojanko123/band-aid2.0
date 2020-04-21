@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Who is the foundation?</h1>
        </div>
        <div class="row">
            <form action="/foundation/submit" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Nada inputs
                    </div>
                @endif

                {!! csrf_field() !!}
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Foundation Name</label>

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
                    <label for="text" class="col-md-4 col-form-label">Foundation Text</label>

                    <input id="text"
                           type="text"
                           class="form-control{{ $errors->has('text') ? ' is-invalid' : '' }}"
                           name="text"
                           value="{{ old('text') }}"
                           autocomplete="text" autofocus>

                    @if ($errors->has('text'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('text') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group row">
                    <label for="webpage" class="col-md-4 col-form-label">Foundation Web</label>

                    <input id="webpage"
                           type="text"
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
                    <label for="img" class="col-md-4 col-form-label">Foundation Img</label>
                    <input id="img"
                           type="text"
                           class="form-control{{ $errors->has('img') ? ' is-invalid' : '' }}"
                           name="img"
                           value="{{ old('img') }}"
                           autocomplete="img" autofocus>

                    @if ($errors->has('img'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('img') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row pt-4">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
