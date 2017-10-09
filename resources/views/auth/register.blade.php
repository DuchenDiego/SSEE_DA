@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('appaterno') ? ' has-error' : '' }}">
                            <label for="appaterno" class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input id="appaterno" type="text" class="form-control" name="appaterno" value="{{ old('appaterno') }}" required autofocus>

                                @if ($errors->has('appaterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('appaterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('apmaterno') ? ' has-error' : '' }}">
                            <label for="apmaterno" class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input id="apmaterno" type="text" class="form-control" name="apmaterno" value="{{ old('apmaterno') }}" required autofocus>

                                @if ($errors->has('apmaterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apmaterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('carrera') ? ' has-error' : '' }}">
                            <label for="carrera" class="col-md-4 control-label">Carrera</label>

                            <div class="col-md-6">
                                <input id="carrera" type="text" class="form-control" name="carrera" value="{{ old('carrera') }}" required autofocus>

                                @if ($errors->has('carrera'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carrera') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('semestre') ? ' has-error' : '' }}">
                            <label for="semestre" class="col-md-4 control-label">Semestre</label>

                            <div class="col-md-6">

                                <select name="semestre" class="form-control">
                                  <option value="1">1er</option>
                                  <option value="2">2do</option>
                                  <option value="3">3er</option>
                                  <option value="4">4to</option>
                                  <option value="5">5to</option>
                                  <option value="6">6to</option>
                                  <option value="7">7mo</option>
                                  <option value="8">8vo</option>
                                  <option value="9">9no</option>
                                  <option value="10">10mo</option>
                                </select>

                                @if ($errors->has('semestre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('semestre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fechanac') ? ' has-error' : '' }}">
                            <label for="fechanac" class="col-md-4 control-label">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fechanac" type="text" class="form-control" name="fechanac" value="{{ old('fechanac') }}" required>

                                @if ($errors->has('fechanac'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fechanac') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('idcredencial') ? ' has-error' : '' }}">
                            <label for="idcredencial" class="col-md-4 control-label">Cuenta Credencial</label>

                            <div class="col-md-6">
                                <input id="idcredencial" type="text" class="form-control" name="idcredencial" value="{{ old('idcredencial') }}" required>

                                @if ($errors->has('idcredencial'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('idcredencial') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
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
