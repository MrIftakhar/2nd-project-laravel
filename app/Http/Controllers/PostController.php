<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(){
        return view('create');
    }
    public function ourfilestore(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'discription' => 'required',
            'image' => 'nullable',
        ]);

         ///uplode image
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        }
        //add new post
        $post = new Post;

        $post->name = $request->name;
        $post->discription = $request->discription;
        $post->image = $imageName;

        $post->save();
        flash()->success('Post is Submited!');
        return redirect()->route('home');
    }

    public function editData($id){
        $post = post::findOrFail($id);
        return view('edit', ['ourPost' => $post ]);
    }


    public function updateData($id, Request $request){
        
        $validated = $request->validate([
            'name' => 'required',
            'discription' => 'required',
            'image' => 'nullable',
        ]);

         
        
        $post = post::findOrFail($id);
        $post->name = $request->name;
        $post->discription = $request->discription;
        //uplode image
        if(isset($request->image)){
            $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'),$imageName);
        $post->image = $imageName;
        }
        
        

        $post->save();
        flash()->success('Post is Updateded!');
        return redirect()->route('home');
    }

public function deleteData($id){
    $post = Post::findOrFail($id);

    $post->delete();
    flash()->success('Post is Deleted!');
    return redirect()->route('home');
}

}