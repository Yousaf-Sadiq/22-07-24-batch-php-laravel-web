<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $adminData = Admin::paginate(10);
        // $adminData = Admin::select("email","admin_id","Username")
        // ->where([
        //     "email"=>"lynikamojy@mailinator.com",
        //     "admin_id"=>"2"
        // ])
        // ->paginate(1);

        // WHERE admin_id = "value"


        // dd($adminData);
        return view("admin.dashboard", compact("adminData"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(vars: $request->all());

        $rules = [
            "user_name" => "required|string",

            "Email" => "required|email|unique:admins,email",

            "pswd" => "required|between:1,8|string"
        ];
        $customMessage = [
            "user_name.required" => "USER NAME IS REQUIRED",
            // "user_name.between" =    > "USER NAME MUST BETWEEN 1 to 6 CHARACTOR",


            "Email.required" => "EMAIL IS REQUIRED",
            "Email.email" => "EMAIL FORMAT INVALID",
            "Email.unique" => "EMAIL ALREADY EXIST",


            "pswd.required" => "PASSWORD IS REQUIRED",
            "pswd.between" => "PASSWORD MUST BETWEEN 1 to 8 "
        ];


        $request->validate($rules, $customMessage);


        $email = $request->input("Email");
        $user_name = $request->input("user_name");
        $pswd = $request->input("pswd");

        // $email=$request->Email;





        $hashed = Hash::make($pswd);
        $encrypt = Crypt::encrypt($pswd);



        $data = [
            "Username" => $user_name,
            "email" => $email,
            "password" => $hashed,
            "ptoken" => $encrypt
        ];

        $admin = Admin::create($data);


        if ($admin) {
            return redirect()->route("admin.dashboard")->with("success", "DATA HAS BEEN INSERTED");
        } else {
            return redirect()->route("admin.dashboard")->with("error", "INSERTION ERROR");
        }


        // Validator::make($request->all(), $rules);

        // if (validator()->fails()) {

        //     return redirect()->route("admin.dashboard")->with("errors", validator()->fails());
        // }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);
        // dd($admin);
        return view("admin.update", compact("admin"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id = null)
    {

        $admin_id = $req->input("adminId");

        $admin = Admin::findOrFail($admin_id);


        $rules = [
            "user_name" => "required|string",

            "Email" => "required|email|unique:admins,email," . $admin_id . ",admin_id",

            "pswd" => "required|between:1,8|string"
        ];
        $customMessage = [
            "user_name.required" => "USER NAME IS REQUIRED",
            // "user_name.between" =    > "USER NAME MUST BETWEEN 1 to 6 CHARACTOR",


            "Email.required" => "EMAIL IS REQUIRED",
            "Email.email" => "EMAIL FORMAT INVALID",
            "Email.unique" => "EMAIL ALREADY EXIST",


            "pswd.required" => "PASSWORD IS REQUIRED",
            "pswd.between" => "PASSWORD MUST BETWEEN 1 to 8 "
        ];


        $req->validate($rules, $customMessage);


        $email = $req->input("Email");
        $user_name = $req->input("user_name");
        $pswd = $req->input("pswd");

        // $email=$request->Email;





        $hashed = Hash::make($pswd);
        $encrypt = Crypt::encrypt($pswd);



        $data = [
            "Username" => $user_name,
            "email" => $email,
            "password" => $hashed,
            "ptoken" => $encrypt
        ];

        // $admin = Admin::where("admin_id", "=", $admin_id)->update($data);

        $admin = Admin::updateOrCreate(
            [
                "admin_id" => $admin_id,
            ],
            $data
        );

        if ($admin) {
            return redirect()->route("admin.dashboard")->with("success", "DATA HAS BEEN UPDATE");
        } else {
            return redirect()->route("admin.dashboard")->with("error", "UPDATION ERROR");
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
