<?php

namespace App\Http\Controllers;

use App\Models\CosmosAdmin;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    public function showAdmin(){
        $cosmosAdmins = CosmosAdmin::orderBy('id', 'desc')->get();
        return view('backEnd.administration.admin', ['cosmosAdmins' => $cosmosAdmins]);
    }

    protected function adminValidation($request){
        $request->validate([
            'admin' => 'required | numeric',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required_with:confirm_password | same:confirm_password',
            'confirm_password' => 'required',
            'status' => 'required',
        ]);
    }

    public function registerAdmin(Request $request){
        $this->adminValidation($request);
        $cosmosAdmin = new CosmosAdmin();
        $cosmosAdmin->admin = $request->admin;
        $cosmosAdmin->name = $request->name;
        $cosmosAdmin->email = $request->email;
        $cosmosAdmin->phone_number = $request->phone_number;
        $cosmosAdmin->password =  bcrypt($request->password);
        $cosmosAdmin->status = $request->status;
        $cosmosAdmin->save();
        session()->flash('type', 'success');
        session()->flash('message', 'New Admin Registration Successfully !!!');
        return back();
    }

    public function updateAdmin(Request $request){
        $request->validate([
            'id' => 'required',
            'admin' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
        ]);
        $cosmosAdmin = CosmosAdmin::where('id', $request->id)->first();
        if($request->password != null){
            $request->validate([
                'password' => 'required_with:confirm_password | same:confirm_password',
                'confirm_password' => 'required',
            ]);
            $cosmosAdmin->password = bcrypt($request->password);
        }
        $cosmosAdmin->admin = $request->admin;
        $cosmosAdmin->name = $request->name;
        $cosmosAdmin->email = $request->email;
        $cosmosAdmin->phone_number = $request->phone_number;
        $cosmosAdmin->status = $request->status;
        $cosmosAdmin->update();
        session()->flash('type', 'success');
        session()->flash('message', 'Admin Updated Successfully !!!');
        return back();
    }

    public function deleteAdmin($id){
        $cosmosAdmin = CosmosAdmin::where('id', $id)->first();
        $cosmosAdmin->delete();
        session()->flash('type', 'danger');
        session()->flash('message', 'Admin Deleted Successfully !!!');
        return back();
    }

    public function showLogin(Request $request){
        return view('backEnd.login');
    }

    public function authLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $admin = CosmosAdmin::where('email', $request->email)->where('status', 1)->first();
        if($admin){
            if (password_verify($request->password, $admin->password)){
                Session::put('admin_id', $admin->id);
                Session::put('admin_name', $admin->name);
                Session::put('admin', $admin->admin);
                return redirect('/apanel/dashboard');
            }else{
                session()->flash('color', 'red');
                session()->flash('message', 'Invalid Password !!!');
                return back();
            }
        }else{
            session()->flash('color', 'red');
            session()->flash('message', 'Invalid Email Address !!!');
            return back();
        }
    }

    public function logout(Request $request){
         $request->session()->invalidate();
         session()->flash('color', 'red');
         session()->flash('message', 'Your Are Logout From This Application !!!');
         return redirect('/cosmosapanel');
    }

}
