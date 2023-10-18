<?php
namespace App\Http\Controllers;
use App\Models\Admin;
use App\HTTP\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

Session_start();

class AdminController extends Controller
{
    public function index(){
        return view('admin.admin_login');
    }

    public function Show_Dashboard(Request $request){
        $admin_email=$request->email;
        $admin_password=$request->password;
        $result=Admin::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            return Redirect::to('/dashboard');
        }
        else{
            Session::put('message','Email or Password Invalid');
            return Redirect::to('/_admin');
        }
    }
}