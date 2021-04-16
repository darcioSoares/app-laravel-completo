@extends('adminlte::page')

@section('title', 'Lista de categorias')

@section('content_header')
    <h1>Categorias <a href="{{route('categories.create')}}" class='btn btn-success'>add</a></h1>
   
@stop

@section('content')

    <div class="content row">       

        <div class="box box-success">

            {{-- Estou add com withSuccess no controller --}}
            {{-- Atraves da sessao estou pegando aqui na view --}}
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif

            <div class="box-body">
                <form action="{{route('categories.search')}}" method="POST"class="form form-inline">
                    @csrf
                    {{-- <input type="text"  name="search" placeholder="Pesquisar" class="form-control"> --}}

                    <input type="text"  name="title" placeholder="Titulo" class="form-control" value={{$data['title'] ?? ''}}>

                    <input type="text"  name="url" placeholder="url" class="form-control" value="{{$data['url'] ?? ''}}">

                    <input type="text"  name="description" placeholder="Descrição" class="form-control" value="{{$data['description'] ?? ''}}">


                    <button type="submit" class="btn btn-success">Pesquisar</button>
                </form>

                {{-- esta dando um reflesh e limpando os campos --}}
                @if (isset($data))
                    <a href="" class="btn btn-warning"> (x) Limpar Filtro</a>
                @endif
            </div>
        </div>

        <div class="box box-success">

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">url</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Açoes</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                        
                            <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->title}}</td>
                            <td>{{$item->url}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <a href="{{route('categories.edit',$item->id)}}" class="bg-success badge">Editar</a>

                                <a href="{{route('categories.show',$item->id)}}" class="bg-danger badge">Detalhes</a>
                            </td>
                            
                            </tr>

                        @endforeach
                     
                    </tbody>
                  </table>

                  @if (isset($data['title']))
                    {{$category->appends($data)->links()}}

                  @elseif(isset($data['url']))
                    {{$category->appends($data)->links()}}

                  @elseif(isset($data['description']))
                    {{$category->appends($data)->links()}}

                  @else
                    {{$category->links()}}

                  @endif
            </div>
        </div>

    </div>
    
@stop