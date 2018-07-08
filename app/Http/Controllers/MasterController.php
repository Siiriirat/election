<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Header;
use App\Area;
use App\Admin;
use App\Score;
use DB;

class MasterController extends Controller
{
    public function header_regis(Request $request){

        Header::create( $request->all() );
        $header = Header::all()->last();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $fileName = md5(($file->getClientOriginalName(). time()) . time()) . "_o." . $file->getClientOriginalExtension();
            $file->move('images/headers', $fileName);
            $path = 'images/headers/'.$fileName;
            $created_header = Header::findOrFail($header->header_id);
            $created_header->update(array('image'=>$fileName));
        }
     	return redirect('/show_member');
    }
    public function score(){
    	return view('admin.score');
    }

    public function showmember(Request $request){
        $NUM_PAGE = 5;
        $headers = Header::where('master_id',1)
                         ->orderBy('updated_at','desc')
                         ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        return view('master.show_member')->with('headers',$headers)
                                         ->with('page',$page)
                                         ->with('NUM_PAGE',$NUM_PAGE);
    }

    public function deleteheader($header_id)
    {
        $header = Header::where('header_id', $header_id)->delete();
        return back();
    }

    public function editheader($header_id)
    {
        $header = Header::findOrFail($header_id);
        return view('master.header_edit')->with('header', $header);
    }

    public function updateheader(Request $request,$header_id)
    {
        $header = Header::findOrFail($header_id);
        $header->update($request->all());
        return redirect('/show_member');
    }

    public function showadmin(Request $request,$header_id)
    {
        $NUM_PAGE = 5;
        $admins = Admin::where('header_id',$header_id)
                       ->orderBy('updated_at','desc')
                       ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $header = Header::findOrFail($header_id);
        $scores = Score::get();
        return view('header.show_admin')->with('admins',$admins)
                                        ->with('header',$header)
                                        ->with('page',$page)
                                        ->with('scores',$scores)
                                        ->with('NUM_PAGE',$NUM_PAGE);
    }

}
