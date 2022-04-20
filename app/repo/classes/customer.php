<?php 

namespace App\repo\classes;

use App\Models\customer as ModelsCustomer;
use App\repo\interfaces\customer as customerInterface;
use Illuminate\Support\Facades\Hash;
use App\repo\interfaces\image as imageInterface;
class customer implements customerInterface{


    public $image;
    public function __construct(imageInterface $image)
    {
        $this->image=$image;
    }

    public function getAllCustomer(){

        return ModelsCustomer::all();

    }

    public function store($request,$name)
    {
        
        ModelsCustomer::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "address"=>$request->address,
            "gender"=>$request->gender,
            "job"=>$request->job,
            "birthDate"=>$request->birthdate,
            "avatar"=>$name
            
        ]);

    }


    public function update($request)
    {

        
        $customer=ModelsCustomer::find($request->id);
        if($request->file("avatar")){
            $this->image->deleteImage("upload/customer/",$customer->avatar);
            $name=$this->image->imageStore($request,"avatar","customer");
            $customer->avatar=$name;
        }
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->gender=$request->gender;
        $customer->job=$request->job;
        $customer->birthDate=$request->birthdate;
        $customer->save();
        
    }


    public function delete($id)
    {
        
        $customer=ModelsCustomer::find($id);
        $customer->delete();

    }

}