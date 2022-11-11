<?php

namespace App\Http\Controllers;
use App\Models\omkarModel;
use App\Models\fileupload;

use Illuminate\Http\Request;

class apiController extends Controller
{
    public function view(){
        $result = omkarModel::all();
        if (!empty($result)) {
            $data['status'] = 200;
            $data['message'] = "success";
            $data['all_data'] = $result;

        } else {
            $data['status'] = 400;
            $data['message'] = "data not found";
            $data['all_data'] = $result;
        }
        return $data;
    }

    public function save(Request $request){

        $omkarModel = new omkarModel;
    
        $first_name = $omkarModel->first_name = $request['first_name'];
        $last_name = $omkarModel->last_name = $request['last_name'];
        $Email = $omkarModel->Email = $request['email'];
        $password = $omkarModel->password = $request['password'];
        $status=$omkarModel->status = $request['status'];
        // $save_status = $omkarModel->save();
        
        // $aRequsest = $request->all();
        $empty = false;
        if(!empty($request)){
            if(empty($first_name)){
                $empty = true;
                $field = "First Name";
            }
            if(empty($last_name)){
                $empty = true;
                $field = "Last Name";
            }
            if(empty($Email)){
                $empty = true;
                $field = "Email";
            }
            if(empty($password)){
                $empty = true;
                $field = "Password";
            }
            // if(empty($status)){
            //     $empty = true;
            //     $field = "Status";
            // }
        }
        if(!$empty){
            $query = $omkarModel->save();
            $data['status']=200;
            $data['message']="success";
        }
        else{
            $data['status']= 400;
            $data['message'] = $field . " is empty";
        }
        return response()->json($data);

        
    }

    function viewWithId($id)
    {
        // dd('hi');
        $omkarModel = omkarModel::find($id);
        $data['first_name'] =$omkarModel->first_name;
        $data['last_name'] = $omkarModel->last_name;
        $data['Email'] = $omkarModel->Email;
        $data['password'] =$omkarModel->password;
        $data['status'] =$omkarModel->status;
        $data['id'] = $omkarModel->id;
        
        return $data;
    }

    public function update(Request $request){

        $omkarModel = omkarModel::find($request->id);
        
        $omkarModel->first_name = $request['first_name'];
        $omkarModel->last_name = $request['last_name'];
        $omkarModel->Email = $request['email'];
        $omkarModel->password = $request['password'];
        $omkarModel->status = $request['status'];
        
        $save_status = $omkarModel->save();
        // dd($save_status);
        if ($save_status){
            $data['status'] = 200;
            $data['message'] = "Success";
        }
        else{
            $data['status'] = 400;
            $data['message'] = "error";
        }
        return response()->json($data);

    }


    public function search($name){
        
        if(!empty($name)){
            $result = omkarModel::Where('first_name','LIKE',"%" . $name . "%")->get();
            if($name != $result){
                $data['status'] = 400;
                $data['message'] = $name. "not found";
                $data['all_data'] = $result;                    
            }
            else{
                $data['status'] = 200;
                $data['message'] = $name. " found";
                $data['all_data'] = $result;
            }
        }
        return $data;
    }


    public function delete($id){

        $result = omkarModel::find($id);
        // dd($dresult);
        if($result){
            $result->delete();
            $data['status'] = 200;
            $data['message'] = $id." delete success";
        }
        else {
            $data['status'] = 400;
            $data['message'] = "Cant delete " . $id. " not present";
        }
        return response()->json($data);

    }


    public function upload(Request $request){
        $request->validate([
            'image.*' => 'mimes:jpeg,png,jpg',
            'size:100',
        ]);
        dd('hi');
        dd($request);
        $fileupload1 = new fileupload;

        if($request->image) {

            $image = $request->file('image');
            $destination_path = public_path() . '/images';
            $image_Name = $image->getClientOriginalName();
            $path = $image->move($destination_path, $image_Name);
            $fileupload1->image = $path;
            $fileupload1->save();
            $data['status'] = 200;
            $data['message'] = "file upload success";
        }

        else{
            $data['status'] = 400;
            $data['message'] = "file upload failed";
        }
        return response()->json($data);
   }

   

}
