@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Articulo: {{ $articulo->nombre}}</h3>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
            {!!Form::model($articulo, ['method'=>'PATCH', 'route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"  require value="{{$articulo->nombre}}" class="form-control" >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label >Categorias</label>
                <select name="idcategoria" class="form-control">
                    @foreach ($categorias as $cat)
                        @if($cat->idcategoria == $articulo->idcategoria)
                            <option value=" {{$cat -> idcategoria}} " selected> {{$cat -> nombre}}</option>
                        @else 
                            <option value=" {{$cat -> idcategoria}} "> {{$cat -> nombre}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label for="codigo">Codigo</label>
                <input type="text" name="codigo"  require value="{{$articulo->codigo}}" class="form-control"  >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="text" name="stock"  require value="{{$articulo->stock}}" class="form-control">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion"  value="{{$articulo->descripcion}}" class="form-control" placeholder="Descripcion del Articulo..." >
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" name="imagen" class="form-control">
                @if(($articulo->imagen)!="")
                    <img src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" height="300px" width="300px">
                @endif
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>       
            {!!Form::close()!!}

@endsection 