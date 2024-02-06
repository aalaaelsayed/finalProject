<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Category;
use App\models\Carlist;

class CategoryController extends Controller
{
    //
    public function index()
    {
        //
       $categories =Category::get();
        return view ('admin.categories' ,compact("categories"));
    }
    public function create()
    {
    return view ('admin.addCategory');
    }

    public function store(Request $request)
    {
   
            $messages = $this->messages();
            $data =$request->validate([
            'categoryName'=>'required',
                        ] ,$messages);
            Category::create($data);
            return redirect('admin/Category');
    }

    public function edit(string $id)
    {
        //
        $categories = Category::findOrFail($id);
        return view ('admin.editCategory',compact("categories"));
    }

    public function update(Request $request, string $id)
    {
        //
        $data = Category::find($id);
        $messages = $this->messages();
            $data =$request->validate([
            'categoryName'=>'required',
                        ] ,$messages);
    
        Category::where('id',$id)->update($data);
       return redirect('admin/Category');
    }
    public function destroy(string $categoryId)
    {
        //
        $categories = Category::find($categoryId);
        if ($categories->Carlist()->count() == 0) {
            $categories->forceDelete();
        }
        return redirect('admin/Category');

    }
    public function messages(){
        return [
            'categoryName.required'=>'Should be string',
     
            ];
    }
}
