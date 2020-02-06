<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AuthenticatesUsers;
use App\Post;
use App\Comment;
use App\Category;
use App\Post_category;
use App\Program;
use DB;
use App\Tag;
use Mail;
//use Auth;
use CheckApproved;
//use App\Http\Middleware\CheckApproved;



class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        
        //$auth = Auth::user();
        //$auth = auth()->user()->approve;
        $this->middleware('auth');
        $this->middleware('approved');
        
        /*if(auth()->user()->approve !== $null){ 
            Auth::logout();
            redirect('/home');
            //return redirect('/approval')->with('error', 'Unauthorized Page');
        };*/
        //if(is_null(auth()->user()->approve)){
        /*if(!empty(Auth::user()->approve)){        
        };*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $posts = Post::where('posttype_id','1')->orderBy('created_at','desc')->paginate(10);
        $users = auth()->user();
        $usercom = $users->company;
        return view('web.posts.index',compact('posts', $posts,'usercom',$usercom))->with('posts', $posts,'usercom',$usercom);
    }
    public function indexnews()
    {
        $posts = Post::where('posttype_id','2')->orderBy('created_at','desc')->paginate(10);
        $users = auth()->user();
        $usercom = $users->company;
        return view('web.posts.news',compact('posts', $posts,'usercom',$usercom))->with('posts', $posts,'usercom',$usercom);
    }

    public function createquestion()
    {
        $categories = Category::all();
        $users = auth()->user();
        $program = $users->company->program;
        //$tags = Tag::all();
        //$tags = Tag::pluck ( 'name', 'id' );
        //return redirect('/posts/createquestion');
        return view('web.posts.createquestion',compact(/*'tags',$tags,*/'program',$program))->with('categories', $categories,/*'tags',$tags,*/'program',$program);
    }

    public function createtalk()
    {
        $categories = Category::all();
        //$tags = Tag::all();
        //$tags = Tag::pluck ( 'name', 'id' );
        
        return view('web.posts.createtalk')->with('categories', $categories);
    }

    public function createnews()
    {
        $categories = Category::all();
        $program = Program::all();
        //$tags = Tag::all();
        //$tags = Tag::pluck ( 'name', 'id' );
        return view('web.posts.createnews',compact('program',$program))->with('categories', $categories,'program',$program);
    }

    public function table()
    {
        /*$user_id
        $posts = Post::orderBy('created_at','desc')->paginate(20);
        return view('web.posts.index')->with('posts', $posts);*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        //$tags = Tag::all();
        //$tags = Tag::pluck ( 'name', 'id' );
        return view('web.posts.create')->with('categories', $categories);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = DB::table('posts')->where('title','like','%'.$search.'%')
                ->orWhere('text','like','%'.$search.'%')->paginate(5);
        return view('web.posts.index',['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            
        ]);
        //$category = implode(",",$request->get('category[]'));
        
        // Create Post
        $post = new Post;
        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->pro_id = $request->input('pro_id');
        //$post->category_id = $request->category_id;
        $post->posttype_id = $request->input('postype_id');
        $post->user_id = auth()->user()->id;
        //$id = $post->id;  // get last id after insert.
        //$post->cover_image = $fileNameToStore;
        $post->save();
        
        //$post->tags()->sync($request->tags, false);
        //if($request->input('postype_id') === 1){

        $data = array('name'=>"admin","body"=>"มีโพสใหม่");
        Mail::send('cssp.mail',$data,function($message){
        $message->to('benz02359@hotmail.com','To Admin')->subject('New Posts');
        $message->from('CSS@css.com','Customer Support Service');            
        });
        //}
        return redirect('/posts/'.$post->id)->with('success', 'Post Created');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        //$pro = $post->program['name'];
        //$comment = Comment::where('post_id',$id)->first();
        $comments = $post['comments'];
        return view('web.posts.show',compact('comments',$comments,'post',$post))->with('post',$post,'comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        /*$categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;
        }*/
        $cate = Category::pluck('name','id');

        $tags = tag::pluck('name','id');
        $id = auth()->user()->role_id;
        //$admin = ;
        // Check for correct user
        if((auth()->user()->id !==$post->user_id) && (auth()->user()->role_id !== 1) && (auth()->user()->role_id !== 2)){
            return redirect('/posts')->with('error', 'Unauthorized Page');                        
        }
        

        return view('web.posts.edit',compact('cate',$cate,'tags',$tags))->with('post',$post,'cates',$cate,'tags',$tags);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);
        
        // Create Post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->text = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->save();
        /*if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync(array());
        }*/
        return redirect('/posts/'.$post->id)->with('success', 'Post Updated');
        //return view('web.post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }
}
