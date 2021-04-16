<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = DB::table('categories')
            ->orderBy('id','desc')
            ->paginate(3);

       // dd($category);
        
        return view('admin.categories.index',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCategory $request)
    {
        DB::table('categories')->insert([
            'title'=>$request->title,
            'url'=>$request->url,
            'description'=>$request->description
        ]);

        return redirect()                   
                   ->route('categories.index')
                   ->withSuccess('Sucesso ao cadastrar');
                // ->withSuccess -> joga essa msg em uma sessao temporaria
                //assim consigo pegar na view
                //    ->with('success','Sucesso ao cadastrar') 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();

        if(!$category){
            return redirect()->back();
        }

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();

        if(!$category){
            return redirect()->back();
        }        

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateCategory $request, $id)
    {
        DB::table("categories")
                    ->where('id',$id)
                    ->update([
                        'title'=>$request->title,
                        'url'=>$request->url,
                        'description'=>$request->description
                    ]);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();

        return redirect()->route('categories.index');
    }


    public function search(Request $request){

        //referente ao search que filtra todos os campos

        // $category = DB::table('categories')
        //         ->where('title', $request->search)
        //         ->orWhere('url', $request->search)
        //         ->orWhere('description', 'LIKE',"%{$request->search}%")
        //         ->get();

        $data = $request->except('_token');

        $category = DB::table('categories')
                ->where(function ($query) use($data) {

                    if(isset($data['title'])){
                        $query->where('title', $data['title']);

                    }elseif(isset($data['url'])){
                        $query->where('url', $data['url']);

                    }elseif(isset($data['description'])){
                        $desc = $data['description'];
                        $query->where('description', 'LIKE', "%{$desc}%");
                    }
                })  
        ->orderBy('id','desc')                    
        ->paginate(3);



                

        return view('admin.categories.index', compact('category','data'));
    }


}
//emd class
