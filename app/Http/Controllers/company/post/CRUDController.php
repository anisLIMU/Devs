<?php

namespace App\Http\Controllers\company\post;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function index()
    {
        $post = post::all();
         return response()->json([
            'message' => 'Employees found successfully',
            'post' => $post,
        ], 200);
    }
    public function create(Request $request)
    {
        // 'company_id','category_id','title','description','postDate','image'
        $this->validate($request, [
            'company_id'=>'required',
            'category_id'=>'required',
            'title' => 'required',
            'description' => 'required',
            'postDate' => 'required',
            'image' => 'required',
        ]);
        $post = post::create([
            'title' => $request->title,
            'description' => $request->description,
            'postDate' => $request->postDate, 
            'image' => $request->required,           
         ]);
         return response()->json([
            'message' => 'post created successfully',
            'post' => $post,
        ], 201);
    }
     public function update(Request $request, $id)
    {
        $this->validate($request, [
            'company_id' => 'required|exiests:companies,id', 
        ]);
        $post = post::find($id);
        $post->update([
            'title' => $request->title ? $request->title : $post->title,
            'description' => $request->description ? $request->description : $post->description,
            'postDate' => $request->postDate ? $request->postDate : $post->postDate,
            'image' => $request->image ? $request->image : $post->image,           
         ]);
         return response()->json([
            'message' => 'post updated successfully',
            'post' => $post,
        ], 200);
    }
     public function delete($id)
    {
        $post = post::find($id);
        $post->delete();
         return response()->json([
            'message' => 'post deleted successfully',
        ], 200);
    }

}
