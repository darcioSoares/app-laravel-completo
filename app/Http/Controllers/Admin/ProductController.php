<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use App\Http\Requests\StoreUpdateProductsForm;

class ProductController extends Controller
{

    // fazendo dessa forma, todo controller já tem o meu model
    // pois o construct esta setando esses valores;
    protected $product;

    public function __construct(Product $product){

        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with('category')-> fazendo isso, já vai trazer.
        //caso contrario, ele ia fazer uma subconsulta, ia exigir mais da app
        $products = $this->product->with('category')->get();

        return view('admin.products.index', compact('products'));

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('admin.products.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProductsForm $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductsForm $request)
    {
        // uma forma de cadastrar com relacionamento
        // $category = Category::find($request->category_id);
        // //products() do model 
        // $product = $category->products()->create($request->all());

        // desse forma vai dar certo, por q o o nome do campo select
        // esta como category_id mesmo nome do campo no db, dessa forma vai dar certo
        //esse campo id e bom passar por uma validação
        $product = $this->product->create($request->all());

        return redirect()
                ->route('products.index')
                ->withSuccess('Produto cadastrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->with('category')->where('id',$id)->first();

        if(!$product)
            return redirect()->back();

        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $category = Category::all();

        if(!$product = $this->product->find($id)){
            return redirect()->back();
        }

        return view('admin.products.edit',compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreUpdateProductsForm  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductsForm $request, $id)
    {
        $product = $this->product->find($id);

        $product->update($request->all());

        return redirect()
                ->route('products.index')
                ->withSuccess('Produto Atualizado com sucesso');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();

        return redirect()
                ->route('products.index')
                ->withSuccess('Excluido com sucesso!');

        
    }
}
