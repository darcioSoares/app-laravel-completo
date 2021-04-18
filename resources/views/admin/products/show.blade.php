@extends('adminlte::page')

@section('title', 'Editar Produto')

@section('content_header')

    <h1>Detalhes Produto: {{$product->title}}</h1>
   
@stop

@section('content')

   <div class="content row">
       <div class="box box-success">
           <div class="box-body">
               <p><strong>ID: </strong>{{$product->id}}</p>
               <p><strong>Nome: </strong>{{$product->name}}</p>
               <p><strong>Categoria: </strong>{{$product->category->title}}</p>
               <p><strong>Preco: </strong>{{$product->price}}</p>
               <p><strong>Description: </strong>{{$product->description}}</p>

               <hr>

               <form action="{{route('products.destroy',$product->id)}}"      method="POST">
                @method('DELETE')             
                @csrf
                {{-- <input type='hidden' name="_method" value="DELETE"> --}}

                   <button type="submit" class="btn btn-danger">Deletar</button>
               </form>
              {{-- <a href="{{route('categories.destroy',$category->id)}}" class="btn btn-danger">Deletar</a> --}}
           </div>
       </div>

   </div>
    
@stop
