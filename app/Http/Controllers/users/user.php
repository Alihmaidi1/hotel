<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\repo\interfaces\user as userInterface;
use App\repo\interfaces\customer as customerInterface;
class user extends Controller
{

    public $user;
    public $customer;
    public function __construct(userInterface $user,customerInterface $customer)
    {

        $this->user=$user;
        $this->customer=$customer;

    }

    public function login(Request $request){

        if(Auth::attempt($request->only("email","password"))){

            return redirect("dashborad")->with("success","Welcome ".Auth::user()->name);

        }

        return redirect()->back()->withErrors(["error"=>"the Email Or Password is uncorrect"]);

    }

    public function index(){
        $users=$this->user->getAllUser();
        $customers=$this->customer->getAllCustomer();
        return view("user.index",compact("users","customers"));
    }
    public function create(){
        return view("user.create");
    }

    public function store(Request $request){
        $this->user->store($request);
        return redirect()->route("user.index")->with("success","the User Was Added Successfully");
    }
    public function edit($id){
        $user=ModelsUser::find($id);
        return view("user.edit",compact("user"));
    }



    public function update(Request $request){
        $this->user->update($request);
        return redirect()->route("user.index")->with("success","The User  Data Was Updated Successfully");
    }
    public function delete($id){
        $this->user->delete($id);
        return redirect()->back()->with("success","The User Was Deleted Successfully") ;
    }


}

