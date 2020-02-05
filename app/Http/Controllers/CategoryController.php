<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Post_category;
use Session;

class CategoryController extends Controller
{
    public function __construct() {

            $this->middleware('auth');
        }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('cssp.categories.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function addcate(Request $request)
    {
        $category = new Post_category;
        $category->post_id = $request->post_id;
        $category->category_id = $request->cate_id;
        $category->save();

        Session::flash('success', 'เพิ่มปัญหาในหมวดหมู่นี้เรียบร้อย');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save a new category and then redirect back to index
        $this->validate($request, array(
            'name' => 'required|max:255|unique:categories'
            ));
        $category = new Category;
        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'สร้างหมวหมู่ใหม่เรียบร้อย');
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate = category::find($id);
        $postcategory = Post_category::where('category_id',$id)->get();
        $postcate = $postcategory;
        $category = $postcate;
        $posts = post::all();
        return view('cssp.categories.show',compact('posts',$posts,'cate',$cate,'postcate',$postcate,'category',$category))->with('cate',$cate,'posts',$posts,'postcate',$postcate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::find($id);
        return view('cssp.categories.edit')->with('cate',$cate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cate = Category::find($id);
        $this->validate($request, ['name' => 'required|max:255']);
        $cate->name = $request->name;

        $cate->save();
        return redirect()->route('categories.show', $cate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
        $cate->posts()->detach();
        $cate->delete();
        Session::flash('success', 'ลบหมวดหมู่นี้เรียบร้อย');
        return redirect()->route('categories.index');
    }
}
