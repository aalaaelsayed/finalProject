<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\models\Contact;
use Illuminate\Support\Facades\Auth;

class MassagesController extends Controller
{
    //
    public function index(){
        $Contacts =Contact::get();
        return view ('admin.messages' ,compact("Contacts"));
    }
    public function show(string $id){

        $contact = Contact::findOrFail($id);
       // DB::table('contact')->where('id', $id)->update(array('read_at'=> 1));
        $contact->update(['read_at' => 1]);
        return view ('admin.showMessage',compact("contact"));
    }
    public function destroy(string $id){
        Contact::where ('id',$id) ->forceDelete();
        return redirect('admin/massagelist');
    }


}
