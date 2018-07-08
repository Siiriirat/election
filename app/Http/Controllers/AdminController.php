<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Score;
use App\Area;
use App\Admin;
use App\Header;
use DB;

class AdminController extends Controller
{
    public function area(Request $request){
        $admin_id = $request->get('admin_id');
        $area_name = $request->get('area_name');
            for($i=0;$i<count($area_name);$i++){
             $data = new Area;
             $data->admin_id = $admin_id;
             $data->area_name = $area_name[$i];
             $data->save();
        }
        return redirect()->action('AdminController@showarea',['admin_id'=> $admin_id]);
    }

    public function getscore(){
      $admin = Admin::findOrFail(1);//อ้างอิงจาก admin ที่กำลัง login
      $header= Header::findOrFail($admin->header_id);
      $master= DB::table('masters')->where('master_id',$header->header_id)
                                   ->get();
      $areas= Area::where('admin_id',$admin->admin_id)
                  ->get();
      return view('admin.score')->with('master',$master)
                                ->with('header',$header)
                                ->with('admin',$admin)
                                ->with('areas',$areas);
    }


    public function score(Request $request){
        Score::create($request->all());
        $score = Score::all()->last();
    	  return redirect()->action('AdminController@showarea',['admin_id'=>$request->admin_id]);
    }

    public function showarea(Request $request, $admin_id){

        $NUM_PAGE = 5;
        $areas = Area::where('admin_id',$admin_id)
                     ->orderBy('updated_at','desc')
                     ->paginate($NUM_PAGE);
        $page = $request->input('page');
        $page = ($page != null)?$page:1;
        $admin = Admin::findOrFail($admin_id);
        $header= Header::findOrFail($admin->header_id);
        $join = DB::table('areas')
                    ->select('area_name','score','areas.area_id')
                    ->join('scores', 'scores.area_id', '=', 'areas.area_id')
                    ->where('areas.admin_id',$admin_id)
                    ->get();
        return view('admin.show_area')->with('areas',$areas)
                                      ->with('header',$header)
                                      ->with('page',$page)
                                      ->with('NUM_PAGE',$NUM_PAGE)
                                      ->with('join',$join);
    }

    public function editadmin(Request $request, $admin_id){
        $admin = Admin::findOrFail($admin_id);
        $header= Header::findOrFail($admin->header_id);
        return view('header.admin_edit')->with('admin',$admin)
                                        ->with('header',$header);
    }

    public function updateadmin(Request $request,$admin_id)
    {

        $admin = Admin::findOrFail($admin_id);

        $admin->admin_name = $request->get('admin_name');
        $admin->username = $request->get('username');
        $admin->tel = $request->get('tel');
        $admin->email = $request->get('email');
        $admin->password = $request->get('password');
        $admin->save();
        return redirect()->action('MasterController@showadmin',['header_id'=>$admin->header_id]);
    }

    public function editarea(Request $request, $area_id){
        $area  = Area::findOrFail($area_id);
        $admin = Admin::findOrFail($area->admin_id);
        $header= Header::findOrFail($admin->header_id);
        return view('admin.area_edit')->with('area',$area)
                                      ->with('header',$header);
    }

    public function updatearea(Request $request,$area_id)
    {
      dd($area_id);
        $area = Area::findOrFail($area_id);
        $area->update($request->all());
        return redirect()->action('AdminController@showarea',['admin_id'=>$area->admin_id]);
    }

    public function deletearea($area_id)
    {
        $area = Area::findOrFail($area_id);
        $score = Score::where('area_id',$area->area_id)
                      ->delete();
        $area = Area::findOrFail($area_id)->delete();
        return back();
    }

    public function showscore()
    {
        $scores = Score::get();
        return view('admin.showscore')->with('scores',$scores);
    }

    public function addscore($area_id)
    {
        $admin = Admin::findOrFail(1);//อ้างอิงจาก admin ที่กำลัง login
        $header= Header::findOrFail($admin->header_id);
        $master= DB::table('masters')->where('master_id',$header->header_id)
                                     ->get();
        $area = Area::findOrFail($area_id);
        return view('admin.score')->with('admin',$admin)
                                  ->with('header',$header)
                                  ->with('area',$area)
                                  ->with('master',$master);
    }

    public function scoreadd(){
        $admin = Admin::findOrFail(1);//อ้างอิงจาก admin ที่กำลัง login
        $header= Header::findOrFail($admin->header_id);
        $master= DB::table('masters')->where('master_id',$header->header_id)
                                     ->get();
        $areas = Area::where('admin_id',$admin->admin_id)
                     ->get();
        return view('admin.score_add')->with('admin',$admin)
                                      ->with('header',$header)
                                      ->with('master',$master)
                                      ->with('areas',$areas);
    }

    public function search(Request $request){
        $show = Score::where('area_id',$request->get('area_id'))
                      ->where('date',$request->get('date'))
                      ->get();

        if(count($show) > 0){
          $score = Score::findOrFail($show[0]->score_id);
          $admin = Admin::findOrFail($score->admin_id);
          $header= Header::findOrFail($admin->header_id);
          $allareas = Area::where('admin_id',1)
                          ->get();
          return view('score_test')->with('score',$score)
                                   ->with('header',$header)
                                   ->with('allareas',$allareas);
        }

        else {
          $admin = Admin::findOrFail(1);//อ้างอิงจาก admin ที่กำลัง login
          $header= Header::findOrFail($admin->header_id);
          $master= DB::table('masters')->where('master_id',$header->header_id)
                                       ->get();
          $area1 = Area::findOrFail($request->get('area_id'));
          $allareas = Area::where('admin_id',1)
                          ->get();
          $date = $request->get('date');
          return view('score_test')->with('admin',$admin)
                                   ->with('header',$header)
                                   ->with('master',$master)
                                   ->with('area1',$area1)
                                   ->with('allareas',$allareas)
                                   ->with('date',$date);
        }

    }

    public function allarea(){
         $allareas = Area::where('admin_id',1)
                         ->get();
         return view('score_test')->with('allareas',$allareas);
    }



    public function action(Request $request){
        $update = $request->get('update');
        $delete = $request->get('delete');
        if($update == "update"){
            $checkbox = $request->get('checkbox');
            $score_get = $request->get('score');
            $count = count($checkbox);
            for ($i=0; $i<$count; $i++){
                $score_id = (int)$checkbox[$i];
                $score = Score::findOrFail($score_id);
                $score->score = $score_get[$i];
                $score->save();
            }
        }
        if($delete == "delete"){
            $checkbox = $request->get('checkbox');
            $count = count($checkbox);
            for ($i = 0; $i < $count; $i++) {
                $score_id = (int)$checkbox[$i];
                Score::destroy($score_id);
            }
        }
        return redirect('/showscore1');
    }

    public function scoreshow(Request $request){
      $NUM_PAGE = 5;
      $scores = DB::table('scores')->select('score_id','score','date','district','amphoe','province','area_name')
                                    ->join('areas','areas.area_id', '=', 'scores.area_id')
                                    ->join('admins', 'admins.admin_id', '=', 'scores.admin_id')
                                    ->join('headers','admins.header_id', '=', 'headers.header_id')
                                    ->where('scores.admin_id', 1)
                                    ->orderBy('date', 'desc')
                                    ->paginate($NUM_PAGE);
      $page = $request->input('page');
      $page = ($page != null)?$page:1;;
      return view('admin.showscore1')->with('scores',$scores)
                                     ->with('page',$page)
                                     ->with('NUM_PAGE',$NUM_PAGE);

    }


}
