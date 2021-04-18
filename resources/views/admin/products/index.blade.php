@extends('adminlte::page')

@section('title', 'Lista de categorias')

@section('content_header')
    <h1>Produtos <a href="{{route('products.create')}}" class='btn btn-success'>add</a></h1>
   
@stop

@section('content')

    <div class="content row">       

        <div class="box box-success">

            {{-- Estou add com withSuccess no controller --}}
            {{-- Atraves da sessao estou pegando aqui na view --}}
            {{-- @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif --}}

            <div class="box-body">
                #form
            </div>
        </div>

        <div class="box box-success">

            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                      <tr>                        
                        <th scope="col">Name</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Açoes</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $item)
                        
                            <tr>
                            <th scope="row">{{$item->name}}</th>
                                {{-- Ele vai pegar pelo relacionamento category->name --}}
                                <td>{{$item->category->title}}</td>
                                <td>${{$item->price}}</      td>                            
                            <td>
                                <a href="{{route('products.edit',$item->id)}}" class="bg-success badge">Editar</a>

                                <a href="{{route('products.show',$item->id)}}" class="bg-danger badge">Detalhes</a>
                            </td>
                            
                            </tr>

                        @endforeach
                     
                    </tbody>
                  </table>

                  {{-- @if (isset($data['title']))
                    {{$products->appends($data)->links()}}

                  @elseif(isset($data['url']))
                    {{$products->appends($data)->links()}}

                  @elseif(isset($data['description']))
                    {{$products->appends($data)->links()}}

                  @else
                    {{$products->links()}}

                  @endif --}}
            </div>
        </div>

    </div>
    
@stop