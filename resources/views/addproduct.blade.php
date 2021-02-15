
@extends('layouts.app')

@section('modal')
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Enhorabuena, estás dado de alta, verifica tu cuenta para iniciar sesión.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="example2ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example2ModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Para poder iniciar sesión hay que verificar el correo, se le acaba de enviar un correo de verificación nuevo.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="example3ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example3ModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La cuenta se ha verificado correctamente, ya puede iniciar sesión.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="restoreEmailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel11" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel11">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Enhorabuena, se ha restablecido tu correo anterior o no: 
        @if (Session::get('restoreemail'))
          Modificado.
        @else
          No modificado.
        
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    
                    <form method="post" action="{{ url('storeproduct') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="iduser" class="col-md-4 col-form-label text-md-right">Id User</label>
                            <div class="col-md-6">
                                <input id="iduser" type="hidden" class="form-control" placeholder="{{ Session::get('id') }}" name="iduser" value="{{ Session::get('id') }}" required  autofocus>
                            </div>
                        </div>
                        
                        
                         
                        @if(isset($categorias))
                        <div class="form-group row">
                        <select name="idcategoria" id="idcategoria" required class="form-control select-control">
                            <option value="" disabled selected>Select categoria</option>
                            @foreach($categorias as $categoria)
                            
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria}}</option>
                            
                            @endforeach
                        </select>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">nombre</label>
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">descripcion</label>
                            <div class="col-md-6">
                                <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="uso" class="col-md-4 col-form-label text-md-right">uso</label>
                            <div class="col-md-6">
                                <input id="uso" type="text" class="form-control" name="uso" value="{{ old('uso') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="precio" class="col-md-4 col-form-label text-md-right">precio</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" class="form-control" name="precio" value="{{ old('precio') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="fecha" class="col-md-4 col-form-label text-md-right">fecha</label>

                            <div class="col-md-6">
                                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">estado</label>

                            <div class="col-md-6">
                              <select name="estado" class="form-control select-control">
                                <option id="estado" name="estado" value="Enventa">En venta</option>
                                <option id="estado" name="estado" value="Vendido">Vendido</option>
                                <option id="estado" name="estado" value="Censurado">Censurado</option>
                                <option id="estado" name="estado" value="Retirado">Retirado</option>
                                <option id="estado" name="estado" value="Otros">Otros</option>
                              </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">foto</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto') }}" required>
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
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