<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    //
    public function index()
    {
        //
        $Users =User::get();
        return view ('admin.users' ,compact("Users"));
    }
    //////////////////////////////////////////////////////////////////
    public function create()
    {
    return view ('admin.addUser');
    }
    ///////////////////////////////////////////////////////////////////
    public function store(Request $request)
    {
        //
        $messages = $this->messages();
        $data =$request->validate([
        'name'=>'required|string|max:50',
        'email'=>'required|string',
        'username'=>'required',
        'password'=>'required',
        ] ,$messages);
        $data['active'] =isset($request->active);

             User::create($data);
            return redirect('admin/users');
    }
    /////////////////////////////////////////////////////////////////////
  
    public function edit(string $id)
    {
        //
        $Users = User::findOrFail($id);
        return view ('admin.edituser',compact("Users"));
    }

    //////////////////////////////////////////////////////////
        public function update(Request $request, string $id)
        {
            $data = User::find($id);
            $messages = $this->messages();
            $data = $request->validate([
                'name'=>'required|string|max:50',
                'email'=>'required|string',
                'username'=>'required',
                'password'=>'required',
            ], $messages);
   
            $data['active'] =isset($request->active);
            User::where('id',$id)->update($data);
            return redirect('admin/users');
        // dd($request->all()); 
    }
 public function messages(){
    return [
        'name.required'=>'الاسم  المطلوب',
        'email.string'=>'Should be string',
        'username.required'=>'Should be string',
        'password.required'=>'Should be string',
    
        ];

}
}