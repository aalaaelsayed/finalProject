<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\models\Carlist;
use App\models\Category;

class CarAdminController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Carlists =Carlist::get();
        return view ('admin.cars' ,compact("Carlists"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view ('admin.addCar', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $messages = $this->messages();
        $data =$request->validate([
        'carName'=>'required|string|max:50',
        'content'=>'required|string',
        'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        'categoryId'=>'required',
        'doors'=>'required',
        'passengers'=>'required',
        'luggage'=>'required',
        'price'=>'required',
        ] ,$messages);
        $fileName = $this->uploadFile($request->image, 'assets/images');    
                $data['image'] = $fileName;
        $data['active'] =isset($request->active);

            Carlist::create($data);
            return redirect('admin/cars');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $Carlists = Carlist::findOrFail($id);
        $categories=Category::get();
        return view ('admin.editCar',compact("Carlists","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Carlist::find($id);
        $messages = $this->messages();
        $data = $request->validate([
            'carName'=>'required|string|max:50',
            'content'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'categoryId'=>'required',
            'doors'=>'required',
            'passengers'=>'required',
            'luggage'=>'required',
            'price'=>'required',
        ], $messages);
    if ($request->hasFile('image')) {
        $fileName = $this->uploadFile($request->image, 'assets/images');    
        $data['image'] = $fileName;
    }
        $data['active'] = isset($request->active);
    Carlist::where('id',$id)->update($data);
    return redirect('admin/cars');
    // dd($request->all()); 
 }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Carlist::where ('id',$id) ->forceDelete();
        return redirect('admin/cars');
    }
    public function messages(){
        return [
            'carName.required'=>'الاسم  المطلوب',
            'content.string'=>'Should be string',
            'price.required'=>'Should be number',
            'doors.required'=>'Should be number',
            'categoryId.required'=>'Should be number',
            'passengers.required'=>'Should be number',
            'luggage.required'=>'Should be number',
            'image.required'=> 'please insrt image',
            'image.mimes'=> 'Incorrect image type',
            'image.max'=> 'Max file size exceeded',
            ];
 
    }
}
