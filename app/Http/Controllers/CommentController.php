<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $this->validate($request, [
            'text' => 'required',
            
        ]);
        
        // Create Post
        $comment = new Comment;
        $comment->text = $request->input('text');
        $comment->post_id = $request->input('post_id');
        $comment->user_id = auth()->user()->id;
        //$post_id = $request->input('post_id');
        $comment->save();
        $post = Post::find($request->input('post_id'));

        $email= $post->user['email'];

        $data = array('name'=>$post->user['name'],"body"=>"มีการตอบกลับใหม่" );

        Mail::send('cssp.mail',$data,function($message) use ($email){
        $message->to($email,'To Staff')->subject('New Comment');
        $message->from('CSS@css.com','Customer Support Service');            
        });
        return redirect('/posts/'.$post->id)->with('success', 'Updated');
        //return view('web.appointment.index');
        return back()->with('success', 'Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
