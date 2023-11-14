<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index()
    {
         try {
 
             $tags = Tag::all();
             return view('administrator.tags.index',compact('tags'));
         } catch(\Illuminate\Database\QueryException $e){
             throw $e;
         }
         
    }

    public function getTags(Request $request)
    {
        try {
            $data = $request->all();
            $tags = Tag::where('name','Like','%'.$data['keyword'].'%')->get();
            $tagContent = "<ul>";
            foreach ($tags as $key => $value) {
                $tagContent .= '<li data-id="'.$value->id.'" ><span class="mdi mdi-tag-plus"></span>'.$value->name.'</li>';
            }  
            $tagContent .= "</ul>";
            return $tagContent;
        } catch(\Illuminate\Database\QueryException $e){
            throw $e;
        }
    }

    

    public function show($id)
    {
        try {
            $tag = Tag::find($id);
            $listTags = Tag::all();
            return view('administrator.tags.show',compact('tag','listTags'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            
            $validatedData = $request->validate([
                'title' => 'required',
                'slug' => 'required',
                'status' => 'required',
                'utm_campaign' => 'required',
                'utm_source' => 'required',
            ]);

            if($data['tag_id'] <= 0){
                Tag::create($data);
            } else {
                $tag = Tag::findOrFail($data['tag_id']);
                $tag->update($data);
            }
            return redirect()->back()->with('message', 'Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    
    public function delete($id) {
        $course = Tag::findOrFail($id);
        $course->delete();
        return redirect('/administrator/tags');
    }


}
