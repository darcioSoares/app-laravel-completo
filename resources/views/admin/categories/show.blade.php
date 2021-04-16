@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')

    <h1>Detalhes Categorias: {{$category->title}}</h1>
   
@stop

@section('content')

   <div class="content row">
       <div class="box box-success">
           <div class="box-body">
               <p><strong>ID: </strong>{{$category->id}}</p>
               <p><strong>Titulo: </strong>{{$category->title}}</p>
               <p><strong>URL: </strong>{{$category->url}}</p>
               <p><strong>Description: </strong>{{$category->description}}</p>

               <hr>

               <form action="{{route('categories.destroy',$category->id)}}"      method="POST">
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
