@extends('layouts/main')
@section('content')
    <div class="callout primary">
        <article class="grid-container text-center">
            <div class="">
                <h1>Forget Password</h1>
            </div>
        </article>
    </div>
    <div class="row small-up-2 medium-up-3 large-up-4">
        <div class="maindiv">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="button">
                            Send Password Reset Link
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

