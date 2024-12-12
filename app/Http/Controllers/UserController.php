<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\user;

class UserController extends Controller
{
    public function mod_user(Request $request){

        $validated = $request->validate([
            'name' => 'required|max:255|regex:/^[a-zA-Z\s]+$/',
            'email' => 'required|email|unique:users,email,' . $request->post('id'),
            'mobile' => 'required|digits:10|regex:/^[0-9]{10}$/',
            'password' => 'required|min:8|max:20',
            'cpassword' => 'required|same:password|min:8|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ],[
                'name.regex' => 'The name may only contain letters and spaces.'
            ]
        );
        $id =  $request->post('id');
        if(!empty($id)){
            $user = user::find($id);
            $msg="Data Updated sucessfully";
        }else{
            $msg = "Data Inserted sucessfully";
            $user = new user();
        }
        $imagePath = null;
        $img_name = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img_name = pathinfo(substr($file->getClientOriginalName(), PATHINFO_FILENAME),4)
                    . '_' . time()
                    . '.' . $file->getClientOriginalExtension();

           $imagePath = $file->storeAs('public/image', $img_name);
           $user->profile_photo_path = $img_name;
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->mobile = $request['mobile'];
        $user->password = $request['password'];
        $insert_id = $user->save();
        if($insert_id > 0){
            // $request->session()->flash('message',$msg);
            return redirect('/')->with('success', $msg);
        }
        return redirect('mod_form/')->with('error', 'Failed to insert data');
    }

    public function index($id=null){
        if($id){
            $user = user::find($id);
            $data['user'] = $user;
            // $data = compact('user');
            return view('mod_form')->with($data);
        }
        $result['data']=User::orderBy('id', 'desc')->get();
        return view('form',$result);
    }
    public function delete($id=null){
        if($id){
            $user = user::find($id);
            if(!is_null($user)){
                $user->delete();
            }
            return redirect('/');
        }
    }
}
