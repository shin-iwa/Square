<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Storage;
use Auth;
use Validator;

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
        
        if($request->hasFile('image')) {
            // Review::delete('public/image/' . $review->image);
            $request->file('image')->store('/public/images');
            $data = ['image'=> $request->file('image')->hashName()];

        }else{
            $data= ['user_id'=>\Auth::id(),'title'=>$review['title'],'body'=>$review['body']];
        }

        $review->save(); 
        return view('show')->with('review', $review)->with('flash_message', '修正が完了しました');
    }

    public function store(Request $request)
    {
    
        $validator = Validator::make($request->all() , ['title' => 'required|max:255', 'body' => 'required', 'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',]);

        //バリデーションの結果がエラーの場合
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        // モデル作成
        $review = new Review;
        $review->title = $request->title;
        $review->body = $request->body;
        $review->user_id = Auth::user()->id;
        $review->save();
        
        if ($request->hasFile('image')) {
            $review->image = $request->image->storeAs('public/post_images', $review->id . '.jpg');
            $review->save();
        }
        
        return redirect('/')->with('flash_message', '投稿が完了しました');

    }

    public function destroy($review_id)
    {
        $review = Review::find($review_id);
        $review->delete();
        return redirect('/')->with('flash_message', '削除が完了しました');
    }
}
