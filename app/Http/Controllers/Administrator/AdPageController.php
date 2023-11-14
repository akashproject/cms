<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adspage;
use App\Models\CourseType;
use App\Models\Center;
use App\Models\Course;
use Illuminate\Support\Facades\DB;

class AdPageController extends Controller
{
    public function index()
    {
        try {
            $adPages = Adspage::all();
            
            return view('administrator.adPages.index',compact('adPages'));

        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }        
    }

    public function add() {
        try {
            $courseCategories = CourseType::all();
            $courses = Course::all();
            $centers = Center::all();
            return view('administrator.adPages.add',compact('courseCategories','centers','courses'));
        } catch(\Illuminate\Database\QueryException $e){
            //throw $th;
        }
    }

    public function show($id)
    {
        try {
            $courseCategories = CourseType::all();
            $courses = Course::all();
            $centers = Center::all();
            $adPage = Adspage::findorFail($id);
            return view('administrator.adPages.show',compact('adPage','courseCategories','centers','courses'));
        } catch(\Illuminate\Database\QueryException $e){
        }        
    }

    public function save(Request $request) {
        try {
            $data = $request->all();
            $validatedData = $request->validate([
                'title' => 'required',
                'slug' => 'required',
            ]);

            // if (isset($data['course_type_id']) && $data['course_type_id']!='') {
            //     $data['course_type_id'] = json_encode($data['course_type_id']);
            // }

            if($data['adPage_id'] <= 0){
                $adPage = Adspage::create($data);
            } else {
                $adPage = Adspage::findOrFail($data['adPage_id']);
                $adPage->update($data);
            }

            // Update Faq Meta
            if (isset($data['faq']) && $data['faq']!='' ) {

                $data['faq'] = json_encode($data['faq']);
                $faq = DB::table('faq_meta')->select('id')->where('model','AdPage')->where('model_id',$adPage->id)->first();
                if($faq === null){
                    DB::table('faq_meta')->insert(['model'=>'AdPage','model_id'=>$adPage->id,'faqs'=>$data['faq']]);
                } else {
                    DB::table('faq_meta')->where('id', $faq->id)->update(['faqs'=>$data['faq']]);
                }
                
            }

            return redirect()->back()->with('message', 'Ad Page updated successfully!');
        } catch(\Illuminate\Database\QueryException $e){
            var_dump($e->getMessage()); 
        }
    }

    public function delete($id) {
        $course = Adspage::findOrFail($id);
        $course->delete();
        return redirect('/administrator/ad-pages');
    }
}
