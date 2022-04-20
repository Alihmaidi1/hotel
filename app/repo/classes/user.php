<?php

namespace App\repo\classes;

use App\Models\User as ModelsUser;
use App\repo\interfaces\user as userInterface;
use Illuminate\Support\Facades\Hash;

class user  implements userInterface{


    public function getAllUser()
    {
        return ModelsUser::all();
    }

    public function store($request)
    {
        ModelsUser::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "avatar"=>"not found",
            "role"=>$request->role
        ]);

    }

    public function update($request)
    {
        $user=ModelsUser::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->avatar="update";
        $user->save();

    }


    public function delete($id){

        return ModelsUser::find($id)->delete();

    }



}
