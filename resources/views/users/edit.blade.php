@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">User edit</div>
                    <div class="panel-body">
                        <form action="{{url('/users/' . $user->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-8 col-md-offset-2">
                                    <label for="name" class="col-md-4 control-label">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-8 col-md-offset-2">
                                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <label for="sex" class="col-md-4 control-label">Sex</label>
                                    <select class="form-control" id="sex" name="sex">
                                        <option value="m" @if ($user->sex == 'm') selected @endif >male</option>
                                        <option value="f" @if ($user->sex == 'f') selected @endif>female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-md-8 col-md-offset-2">
                                    <label for="password" class="col-md-4 control-label">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        save
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection