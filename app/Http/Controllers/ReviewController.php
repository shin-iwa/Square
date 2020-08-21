<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('status', 1)->orderBy('updated_at','DESC')->paginate(9);
        return view('index',compact('reviews'));
    }

    public function show(Review $review)
    {
        return view('show')->with('review', $review);
    }

    public function create()
    {
        return view('review');
    }

    public function edit(Review $review)
    {
        return view('edit')->with('review', $review);
    }

    public function update(Request $request, Review $review)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $review->title = $request->title;
        $review->body = $request->body;
        $review->image = $request->image;
        $review->save();
        return view('show')->with('review', $review)->with('flash_message', '修正が完了しました');

    }

    public function store(Request $request)
    {
        $post = $request->all();

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
        
            $request->file('image')->store('/public/images');
            $data = ['user_id' => \Auth::id(), 'title'=> $post['title'],'body'=> $post['body'],'image'=> $request->file('image')->hashName()];

        }else{
            $data= ['user_id'=>\Auth::id(),'title'=>$post['title'],'body'=>$post['body']];
        }

        Review::insert($data);

        return redirect('/')->with('flash_message', '投稿が完了しました');

    }
}
