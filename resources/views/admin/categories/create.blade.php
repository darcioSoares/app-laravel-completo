@extends('adminlte::page')

@section('title', 'Cadastro de Categoria')

@section('content_header')
    <h1>Cadastrar Categorias </h1>
   
@stop

@section('content')

   <div class="content row">
       <div class="box box-success">

        <div class="box-body">        

        @if($errors->any())
            <div class="alert alert-danger mt-2">
                @foreach ($errors->all() as $item)
                    <p>{{$item}}</p>
                @endforeach
            </div>
        @endif

           <form action="{{route('categories.store')}}" method="POST" class="form">
            @include('admin.categories._partials.form')
           </form>
        </div>
       </div>
   </div>
    
@stop