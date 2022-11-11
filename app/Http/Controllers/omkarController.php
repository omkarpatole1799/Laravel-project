<?php

namespace App\Http\Controllers;
use App\Models\omkarModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class omkarController extends Controller
{
    function index(){
        $url = url('/register');
        $data = compact('url'); 
        return view('register')->with($data);
    }

    function sign_up(Request $request){

        return view('signup');
    }

    function register_user(Request $request){

        $omkarModel = new omkarModel;

        $omkarModel->first_name = $request['first_name'];
        $omkarModel->last_name = $request['last_name'];
        $omkarModel->Email = $request['Email'];
        $omkarModel->password = $request['password'];
        $omkarModel->status = $request['status'];
        $omkarModel->save();

        return redirect('view');
    }

    function view_db(Request $request){

        // $data1['n_search'] = $request['n_search'];
        // $data1['e_search'] = $request['e_search'];
        // $data1['d_f_search'] = $request['d_f_search'];
        // $data1['d_t_search'] = $request['d_t_search'];
        $n_search = $request['n_search'];
        $e_search = $request['e_search'];
        $d_f_search = $request['d_f_search'];
        $d_t_search = $request['d_t_search'];
        
        if($n_search != "" ){
            $users = omkarModel::Where('first_name','LIKE','%' . $n_search. '%')->get();
            // ->orWhere('Email','LIKE','%' . $e_search . '%')
            // ->WhereBetween('created_at',[$d_f_search, $d_t_search])
            // ->get();
        }
        else if ($e_search != ""){
            $users = omkarModel::Where('Email','LIKE','%' . $e_search . '%')->get();
        } 
        else if($d_f_search != "" && $d_t_search != ""){
            $users = omkarModel::WhereBetween('created_at',[$d_f_search, $d_t_search])->get();
        }
        else{
            $users = omkarModel::get();
        }   
        // dd("hi");
        $data = compact('users','n_search','e_search','d_f_search','d_t_search');
        return view('view')->with($data); 
    }

    function delete_user($id){
        omkarModel::find($id)->delete();
        return redirect('view');
    }

    function edit_user($id){

        $user = omkarModel::find($id);
        // dd($user);
        $title = "Update User Data";
        $url = url('/user/update')."/".$id;
        $data = compact('user','url','title');
        return view('register')->with($data);   

    }

    function update($id, Request $request){

        $omkarModel = omkarModel::find($id);

        $omkarModel->first_name = $request['first_name'];
        $omkarModel->last_name = $request['last_name'];
        $omkarModel->Email = $request['Email'];
        $omkarModel->password = $request['password'];
        $omkarModel->status = $request['status'];
        $omkarModel->save();

        return redirect('view');
    }
    
    function status_update($id){
        $omkarModel = omkarModel::find($id);
        // dd($omkarModel);
        $data = $omkarModel->status;
        if($data == 1){
            $omkarModel->status = 0;
        }
        else{
            $omkarModel->status = 1;
        }
        $omkarModel->save();

        return redirect('view');

    }

    function view_data($id)
    {
        $omkarModel = omkarModel::find($id);
        $data['first_name'] = $omkarModel->first_name;
        $data['last_name'] = $omkarModel->last_name;
        $data['Email'] = $omkarModel->Email;

        $pop_data = "<p> ".$data['first_name']." ".$data['last_name']." ".$data['Email']." "."</p>";

        return $pop_data;
    }

    function viewWithId($id)
    {
        dd('hi');
        $omkarModel = omkarModel::find($id);
        $data['first_name'] =$omkarModel->first_name;
        $data['last_name'] = $omkarModel->last_name;
        $data['Email'] = $omkarModel->Email;
        $data['password'] =$omkarModel->password;
        $data['status'] =$omkarModel->status;
        return $data;
    }
}
