@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')

    <h1>Editar Categorias: {{$category->title}}</h1>
   
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

           <form action="{{route('categories.update',$category->id)}}" method="POST" class="form">
            @method('PATCH')
            {{-- <input type="hidden" name="_method" value="PATCH"> --}}
              @include('admin.categories._partials.form')
           </form>
        </div>
       </div>
   </div>
    
@stop