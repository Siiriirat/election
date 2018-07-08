<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use App\Admin;

class HeaderController extends Controller
{
    public function admin_regis(Request $request){
        Admin::create($request->all());
        $admin = Admin::all()->last();

        if($request->hasFile('image')){
            $alladmins = Admin::where('admin_id', '!=', $admin->admin_id)
                              ->get();
            $file = $request->file('image');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('images/admins', $fileName);
            $path = 'images/admins/'.$fileName;

            $created_admin = Admin::findOrFail($admin->admin_id);
            $created_admin->update(array('image'=>$fileName));
        }
    	return redirect()->action('HeaderController@admin_area',['admin_id'=>$admin->admin_id]);
    }

    public function admin_area(Request $request){
        $alladmins = Admin::get();
        $admin = Admin::findOrFail($request->admin_id);
        return view('header.admin_area')->with('alladmins',$alladmins)
                                        ->with('admin_id',$admin->admin_id)
                                        ->with('admin_name',$admin->admin_name);
    }

    public function select_area(){
        $alladmins = Admin::get();
        return view('header.admin_area')->with('alladmins',$alladmins);
    }

  
}
