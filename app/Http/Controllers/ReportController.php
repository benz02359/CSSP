<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Sale;
use App\posttype;
use App\program;
use DB;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        $posttype = posttype::all();
        $program = program::all();
        //$price = program::sum('price');
        $price = program::all()->sum('price');
        $maxp = Post::all()->max('pro_id');
        /*foreach ($program as $pro){
        $mostp = Post::where('pro_id','=',$pro->id)->sum('pro_id');
        }*/
        $mostp = Post::groupBy('pro_id')->havingRaw('COUNT(*) > 1')->get();
        /*$mostp = DB::table('Posts')->join('programs','posts.pro_id','=','programs.id')
        ->groupBy('posts.pro_id')->sum('posts.pro_id');*/
        //$mostp = program::find($most); 
        //$maxmostp = max($mostp);
        $sales = sale::all();
        $post1 = Post::where('posttype_id','=','1')->count();
        $post2 = Post::where('posttype_id','=','2')->count();
        return view('cssp.report.index',
        compact(('posts'),$posts,'sales',$sales,('post1'),$post1,('post2'),$post2,('price'),$price,('mostp'),$mostp
        ));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
