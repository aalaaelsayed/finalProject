<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

use App\models\Testimonial;

class TestimonialsController extends Controller
{
    use Common;

    //
    public function index()
    {
        //
        $Testimonials =Testimonial::get();
        return view ('admin.testimonials' ,compact("Testimonials"));
    }
    public function create()
    {
    return view ('admin.addTestimonials');
    }
    public function store(Request $request)
    {
        
            $messages = $this->messages();
            $data =$request->validate([
            'clientName'=>'required|string|max:50',
            'profession'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'content'=>'required',
                        ] ,$messages);
            $fileName = $this->uploadFile($request->image, 'assets/images');    
            $data['image'] = $fileName;
            $data['published'] =isset($request->published);
            Testimonial::create($data);
            return redirect('admin/Testimonial');
    }
    public function edit(string $id)
    {
        //
        $Testimonials = Testimonial::findOrFail($id);
        return view ('admin.editTestimonials',compact("Testimonials"));
    }
    public function update(Request $request, string $id)
    {
        $data = Testimonial::find($id);
        $messages = $this->messages();
        $data = $request->validate([
            'clientName'=>'required|string|max:50',
            'profession'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'content'=>'required',
        ], $messages);
    if ($request->hasFile('image')) {
        $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;
    }
        $data['published'] = isset($request->published);
        Testimonial::where('id',$id)->update($data);
    return redirect('admin/Testimonial');
    // dd($request->all()); 
 }
 public function destroy(string $id)
 {
     //
     Testimonial::where ('id',$id) ->forceDelete();
     return redirect('admin/Testimonial');
 }
 public function messages(){
     return [
         'clientName.string'=>'Should be string',
         'profession.required'=>'Should be string',
         'content.required'=>'Should be string',
         'image.sometimes'=> 'please insrt image',
         'image.mimes'=> 'Incorrect image type',
         'image.max'=> 'Max file size exceeded',
         ];

 }
}
