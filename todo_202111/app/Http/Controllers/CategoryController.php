<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;


class CategoryController extends Controller
{
    //➃1**➅3:30*******************************************************
    public function showTimelinePage()
    {
        $categorise = Category::latest()->get();
        // dd($categorise);
        return view('timeline', ['categorise' => $categorise]);
    }

//➄3:30 *********************************************************
    public function postCategory(Request $request)
    {
        $validator = $request->validate([
            'cat' => ['required','string','max:280'],
        ]);
        
        // dd($request);
        Category::create([
            'user_id' => Auth::user()->id,
            'cat' => $request->cat,
        ]);

        return back();
    }

    public function destroy($id)
    {
        // dd($id);
        $category =Category::find($id);
        // dd($category);
        $category ->delete();

        return redirect()->route('timeline');
    }

}