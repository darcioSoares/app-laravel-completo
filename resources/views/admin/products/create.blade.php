@extends('adminlte::page')

@section('title', 'Cadastre um novo produto')

@section('content_header')
    <h1>Produtos cadastro<a href="{{route('products.create')}}" class='btn btn-success'>add</a></h1>
   
@stop

@section('content')

    <div class="content row">
        <div class="box box-success">

            @if($errors->any())
                <div class="alert alert-danger mt-2">
                    @foreach ($errors->all() as $item)
                        <p>{{$item}}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{route('products.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nome" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="url" placeholder="url" class="form-control">
                </div>

                <div class="form-group">
                    <input type="text" name="price" placeholder="price" class="form-control">
                </div>

                <div class="form-group">
                    <select name="category_id" class="form-control">
                        <option value=""></option>
                        @foreach ($category as $item)
                          <option value="{{$item->id}}">{{$item->title}}</option>
                            
                        @endforeach
                    </select>    
                </div>

                <div class="form-group">
                    <textarea name="description" class="form-group" cols="50" rows="10">
                    </textarea>    
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>

            </form>
        </div>
    </div>


@stop