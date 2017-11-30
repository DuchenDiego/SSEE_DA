<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">BÚSQUEDA DE ESTUDIANTE</div>

                <div class="panel-body">
                    <div class="row">
                        <article class="col-md-2"></article>
                          <article class="col-md-8">
                            <div class="alert alert-success" role="alert">
                              <h2 style="text-align: center;">Lista de Diagnósticos</h2>
                            </div>
                          </article>
                        <article class="col-md-2"></article>
                    </div>
                    <div class="row">
                        <article class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Búsqueda</div>
                                <div class="panel-body">
                                    <form action="{{ route('busqueda')}}" method="POST">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <label for="busqueda" class="col-md-4 control-label">Ingrese la Credencial o Apellido Paterno del estudiante</label>
                                        <input name="busqueda" type="text" class="" required>
                                        <button type="submit" class="btn btn-primary">
                                        Buscar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </article>
                        <article class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Orden</div>
                                <div class="panel-body">
                                <form action="{{ route('ordenar') }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <label for="busqueda" class="col-md-4 control-label">Buscar por orden de:</label>
                                    <select name="orden" class="form-control">
                                      <option value="Apellido">Apellido</option>
                                      <option value="Carrera">Carrera</option>
                                      <option value="Semestre">Semestre</option>
                                    </select>
                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Buscar
                                    </button>
                                </form>
                                </div>
                            </div>
                        </article>
                    </div>
                    <div class="row">
                        <article class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading">Orden</div>
                                <div class="panel-body">
                                @yield('busqueda')
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>