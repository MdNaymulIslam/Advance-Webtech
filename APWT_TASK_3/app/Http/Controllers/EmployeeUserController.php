<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EmployeeUser;
use App\Http\Requests\StoreEmployeeUserRequest;
use App\Http\Requests\UpdateEmployeeUserRequest;
use Session;
// use App\Http\Controllers\Session;

class EmployeeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeUser  $employeeUser
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeUser $employeeUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeUser  $employeeUser
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeUser $employeeUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmployeeUserRequest  $request
     * @param  \App\Models\EmployeeUser  $employeeUser
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeUserRequest $request, EmployeeUser $employeeUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeUser  $employeeUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeUser $employeeUser)
    {
        //
    }
    public function userRegistration(){
        return view("pages.user.userRegistration");
    }

    public function userRegistrationSubmit(Request $request){
        $validate=$request->validate([
            'name'=>'required|min:5|max:100',
            'email'=>'email',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address'=>'required',
            'password'=>'required'
        ],

        [
            'name.required'=>'Please put your name',
            'name.min'=>'Name must be greater than 5 charcters',
            'email'=>"Put your mail",
            'phone.required'=>"put your phone",
            'address.required'=>"put your address",
            'password.required'=>"put your password"

        ]
    );
       $user=new EmployeeUser();
       $user->name =$request->name;
       $user->email=$request->email;
       $user->phone =$request->phone;
       $user->address=$request->address;
       $user->password=$request->password;
       $user->save();
    //    $msg="Registration Successful";
        // return view('pages.student.studentRegistration') ;
        // return $student;
        // return view('pages.student.list')->with('students', $students);
         return redirect()->route('userRegistration');

    }

    public function userLogin(){
        return view('pages.user.userLogin');
    }

    // public function userLoginSubmit(){
    //     return "ok";
    // }

    public function userLoginSubmit(Request $request){
        $validate=$request->validate([
            'email'=>'required',
            'password'=>'required',
           
        ],
        [
            'email.required'=>'Please put your email',
            'password.required'=>'Please put your password',
           
    
        ]);

        $user=EmployeeUser::where("email",$request->email)
        ->where("password",$request->password)
        ->first();
        if ($user){
            // return "hi";
            $request->session()->put("userName",$user->name);
            $request->session()->put("userId",$user->id);
            $request->session()->put("userPhone",$user->phone);
            $request->session()->put("userAddress",$user->address);
            $request->session()->put("userPassword",$user->password);
            $request->session()->put("userEmail",$user->email);

            return redirect()->route("userDash");
        }
        return back();
    }

    public function userDash(){
        return view ("pages.user.userDash");
    }

    public function userLogout(){
        // session()->forget('userName');
        // session()->forget('userId');
        session()->flush();
        return redirect()->route('userLogin');
    }

   public function userUpdate(){
    //    return  $request->id;
    $id=Session::get("userId");
    // echo $id;
    // $id=(Session::get("userId"));
    $user = EmployeeUser::where('id', $id)->first();
    // echo $user;
    return view('pages.user.userUpdate')->with('user', $user);
   }

   public function userUpdateSubmitted (Request $request){
    //    return "hi";
    $user = EmployeeUser::where('id', $request->id)->first();

    // return $request->id;
    $user->name = $request->name;
    $user->email= $request->email;
    $user->phone = $request->phone;
    $user->address = $request->address;
    $user->save();
    // updating session value
    $request->session()->put("userName",$user->name);
    $request->session()->put("userEmail",$user->email);
    $request->session()->put("userPhone",$user->phone);
    $request->session()->put("userAddress",$user->address);
    $request->session()->put("userPassword",$user->password);
    return view ("pages.user.userDash");
    // return redirect()->route('userUpdate');
    // return "updated";
   }
}
