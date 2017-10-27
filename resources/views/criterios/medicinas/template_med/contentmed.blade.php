<div class="central">
      <div class="container-fluid">
        <div class="main row">
          <article class="col-md-12 text-center">
            <div class="row">
              <br><br>
              <article class="col-md-12">
                <div class="alert alert-info" role="alert">
                  Por Favor Responda a las siguientes preguntas
                </div>
                <br>
              </article>
            </div>
            <div class="row">
             <div class="panel-warning">
               <div class="panel-heading">Medicamentos <span class="glyphicon glyphicon-erase"></span></div>
               <br><br>
               <div class="panel-body">
                   <div class="col-md-12 col-lg-12 ">
                     <div class="form-group">
                        @yield('destinoform')
                        <div class="row">
                          <div class="col-md-9 col-lg-9 ">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <h3 class="bg-light">
                              @yield('pregunta')
                            </h3>
                          </div>
                          <div class="col-md-3 col-lg-3 ">
                             <div class="btn-group" data-toggle="buttons">
                              <label class="btn btn-success btn-lg">
                                <input type="radio" name="si" id="option1" autocomplete="off" > Si <span class="glyphicon glyphicon-ok"></span>
                              </label>
                              <label class="btn btn-danger btn-lg active">
                                <input type="radio" name="no" id="option2" autocomplete="off" > No <span class="glyphicon glyphicon-remove"></span>
                              </label>
                            </div>
                          </div>
                        </div>
                            <div class="row">
                              <div class="col-md-9 col-lg-9">
                                <p>@yield('tratamientos')</p>
                              </div>
                              <div class="col-md-3 col-lg-3"></div>
                            </div>
                            <div class="row">
                              <br><br>  
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Siguiente <span class="glyphicon glyphicon-menu-right"></span></button>  
                            </div>
                        </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          </article>
        </div>
      </div>
    </div>   
