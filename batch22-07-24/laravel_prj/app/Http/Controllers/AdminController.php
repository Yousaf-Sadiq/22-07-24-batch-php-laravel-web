<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;



class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function OldIndex()
    {
        // $adminData = Admin::paginate(10);

        // dd($adminData);

        // $adminData = Admin::select("email","admin_id","Username")
        // ->where([
        //     "email"=>"lynikamojy@mailinator.com",
        //     "admin_id"=>"2"
        // ])
        // ->paginate(1);

        // WHERE admin_id = "value"


        // dd($adminData);
        // $b = Address::with("admin")->get();
        // dd($b);

        $adminData = Admin::with("address")->paginate(10);
        /* `dd(->all());` is a debugging statement in PHP that stands for "Dump and Die". It is
        used to dump the contents of the `` object, which represents the incoming request, and
        then halt the execution of the script. This statement is commonly used to inspect the data
        being sent in the request during development and debugging to understand the structure and
        values of the request data. */
        return view("admin.dashboard", compact("adminData"));
    }



    public function signup()
    {
        // dd(Auth::guard("admin")->user());
        if (Auth::guard("admin")->check()) {

            return redirect()->route("admin.dashboard")->with("error", "you already login or registered");
        } else {
            return view("auth.admin.register");
        }


    }

    public function login()
    {
        if (Auth::guard("admin")->check()) {

            return redirect()->route("admin.dashboard")->with("error", "you already login or registered");
        } else {
            return view("auth.admin.login");
        }
    }





    public function login_submit(Request $request)
    {
        $rules = [


            "Email" => "required|email",

            "pswd" => "required|between:1,8|string"
        ];
        $customMessage = [


            "Email.required" => "EMAIL IS REQUIRED",
            "Email.email" => "EMAIL FORMAT INVALID",



            "pswd.required" => "PASSWORD IS REQUIRED",
            "pswd.between" => "PASSWORD MUST BETWEEN 1 to 8 "
        ];


        $request->validate($rules, $customMessage);


        $email = $request->input("Email");

        $pswd = $request->input("pswd");


        $data = [
            "email" => $email,
            "password" => $pswd
        ];

        if (Auth::guard("admin")->attempt($data)) {

            return redirect()->route("admin.dashboard")->with("success", "LOGIN SUCCESSFULL");
        } else {
            return redirect()->route("login.get")->with("error", "YOU ARE NOT REGISTERED IN OUR PORTAL");
        }





    }


    public function logouts()
    {
        Auth::guard("admin")->logout();
        // Auth::guard("admin")->
        return redirect()->route("login.get")->with("success", "LOGOUT SUCCESSFULL");

    }


    public function signup_submit(Request $request)
    {

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

            $auth = [
                "email" => $email,
                "password" => $pswd
            ];

            // dd($auth);
            if (Auth::guard("admin")->attempt($auth)) {


                return redirect()->route("admin.dashboard")->with("success", "DATA HAS BEEN INSERTED");
            } else {
                return redirect()->route("register.get")->with("error", "REGISTER ERROR");
            }



        } else {
            return redirect()->route("admin.dashboard")->with("error", "INSERTION ERROR");
        }

    }

    public function index()
    {
        $adminAuth = Auth::guard("admin");




        // dd($admin);

        if ($adminAuth->check()) {

            $adminData = Admin::where("admin_id", $adminAuth->user()->admin_id)->
                with("address")
                ->paginate(10);

            return view("admin.dashboard", compact("adminData"));
        } else {
            return redirect()->route("login.get")->with("error", "PLEASE LOGIN OR REGISTER");
        }


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
        $admin = Admin::with("address")->findOrFail($id);
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


    public function upload(Request $req)
    {
        // dd($req);

        $rules = [
            "profile" => "required|mimes:jpg,jpeg,png"
        ];

        $req->validate($rules);

        $file = FIleUpload($req, "profile", "upload/admin");

        if (!$file) {

            dd("File UPloading error");
        }

        echo $file;

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



        if ($req->hasFile("profile")) {


            $rules["profile"] = "required|mimes:jpg,jpeg,png";

            $customMessage["profile.required"] = "PROFILE FIELD IS REQUIRED";
            $customMessage["profile.mimes"] = "ONLY JPG PNG AND JPEG ALLOWED";
        }

        $req->validate($rules, $customMessage);


        $email = $req->input("Email");
        $user_name = $req->input("user_name");
        $pswd = $req->input("pswd");
        $file = NULL;

        // $email=$request->Email;
        $adres = Address::where("user_id", $admin_id)->get();

        if ($req->hasFile("profile")) {




            //  old image remove
            if (count($adres) > 0) {

                if (isset($adres[0]->image) && !empty($adres[0]->image)) {


                    $oldImage = public_path($adres[0]->image);

                    if (File::exists($oldImage)) {
                        File::delete($oldImage);
                    }
                }
            }


            //  new file upload
            $file = FIleUpload($req, "profile", "upload/admin");

        } else {


            if (count($adres) > 0) {

                if (isset($adres[0]->image) && !empty($adres[0]->image)) {
                    $file = $adres[0]->image;
                }
            }


        }





        $hashed = Hash::make($pswd);
        $encrypt = Crypt::encrypt($pswd);






        $data2 = [
            "image" => $file,
            // "user_id"=>$admin->admin_id
            "user_id" => $admin_id
        ];


        $adrs = Address::updateOrCreate(
            [
                "user_id" => $admin_id,
            ],
            $data2
        );

        // dd($adrs);


        $data = [
            "Username" => $user_name,
            "email" => $email,
            "password" => $hashed,
            "ptoken" => $encrypt,
            "address_id" => $adrs->adrs_id
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


    public function destroy2(Request $req, string $id = null)
    {


        $id = $req->input("user_id");


        $admin = Admin::findOrFail($id);

        $address = Address::where("user_id", $admin->admin_id)->get();


        if (count($address) > 0) {

            if (isset($address["image"]) && !empty($address["image"])) {

                $img = public_path($address["image"]);

                if (File::exists($img)) {
                    File::delete($img);
                }
            }


            $address[0]->delete();
        }

        $a = $admin->delete();

        // $status["msg"] = "DATA HAS BEEN DELETE";
        // $status["error"] = 0;
        // return response()->json($status);


        if ($a) {
            return redirect()->route("admin.dashboard")->with("success", "DATA HAS BEEN DELETED");
        } else {
            return redirect()->route("admin.dashboard")->with("error", "DELETED ERROR");
        }

    }
    public function destroy(Request $req, string $id = null)
    {
        // dd($req->all());
        $id = $req->input("user_id");
        $admin = Admin::findOrFail($id);

        $address = Address::where("user_id", $admin->admin_id)->get();
        if (count($address) > 0) {

            if (isset($address["image"]) && !empty($address["image"])) {

                $img = public_path($address["image"]);

                if (File::exists($img)) {
                    File::delete($img);
                }
            }


            $address[0]->delete();
        }

        $admin->delete();

        $status["msg"] = "DATA HAS BEEN DELETE";
        $status["error"] = 0;
        return response()->json($status);

    }
}
