<?php

namespace App\Http\Controllers;

use App\Models\NewFeature;
use Illuminate\Http\Request;

class NewFeatureController extends Controller
{
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

     public function index()

     {
 
         $new_features = NewFeature::all();
 
         return view('new_features.index',compact('new_features'))->with('i', (request()->input('page', 1) - 1) * 5);
 
     }
 
 
     /**
 
      * Show the form for creating a new resource.
 
      *
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function create()
 
     {
 
         return view('new_features.create');
 
     }
 
 
     /**
 
      * Store a newly created resource in storage.
 
      *
 
      * @param  \Illuminate\Http\Request  $request
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function store(Request $request)
 
     {
 
         request()->validate([
 
             'title' => 'required',
 
             'content' => 'required',
 
         ]);
 
 

        $request->validate([
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $imageName = time().'.'.$request->thumbnail->extension();  
     
        $request->thumbnail->move(public_path('images'), $imageName);


        // NewFeature::create($request->all());
        NewFeature::create([
            'title' => $request->title,
            'content' => $request->content,
            'thumbnail' => $imageName
        ]);
 
 
         return redirect()->route('new-features.index')
 
                         ->with('success','New Feature created successfully.');
 
     }
 
 
     /**
 
      * Display the specified resource.
 
      *
 
      * @param  \App\Book  $book
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function show(NewFeature $new_feature)
 
     {
 
         return view('new_features.show',compact('new_feature'));
 
     }
 
 
     /**
 
      * Show the form for editing the specified resource.
 
      *
 
      * @param  \App\Book  $book
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function edit(NewFeature $new_feature)
 
     {
 
         return view('new_features.edit',compact('new_feature'));
 
     }
 
 
     /**
 
      * Update the specified resource in storage.
 
      *
 
      * @param  \Illuminate\Http\Request  $request
 
      * @param  \App\Book  $book
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function update(Request $request, NewFeature $new_feature)
 
     {
 
          request()->validate([
 
             'title' => 'required',
 
             'content' => 'required',
 
         ]);
 
 
         $new_feature->update($request->all());
 
 
         return redirect()->route('new-features.index')
 
                         ->with('success','New Feature updated successfully');
 
     }
 
     /**
 
      * Remove the specified resource from storage.
 
      *
 
      * @param  \App\Book  $book
 
      * @return \Illuminate\Http\Response
 
      */
 
     public function destroy(NewFeature $new_feature)
 
     {
 
         $new_feature->delete();
 
 
         return redirect()->route('new-features.index')
 
                         ->with('success','New Feature deleted successfully');
 
     }
}
