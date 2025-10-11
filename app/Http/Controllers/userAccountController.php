<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userAccountController extends Controller
{
    public function index(){
        $usersData=DB::table('user_accounts')->get();
        return view('pages.index',['usersData'=>$usersData]);
    }

    public function create(){
        return view('pages.create');
    }

    public function store(Request $request){
        $email=$request->email;
        $password=$request->password;
        $uniqcData=5;
        if($request->hasFile('image')){
            $imagePath= $request->file('image')->store('user_image','public');

        }

        DB::table('user_accounts')->insert([
            'email'=>$email,
            'password'=>$password,
            'account_number'=>$uniqcData,
            'otp'=>$imagePath,
            'own_reffer_code'=>$uniqcData,
            'created_at'=>now(),
            'updated_at'=>now()
        ]);
        return redirect()->route('home')->with('success', 'User added successfully!');

    }

    public function edit($id){
        $usersData=DB::table('user_accounts')->where('id',$id)->first();
        return view('pages.edit',['data'=>$usersData]);
    }

    public function update(Request $request,$id){
        $singleUser = DB::table('user_accounts')->where('id',$id)->first();
        $imagePath=$singleUser->otp;
        // check here if have the image file, then store
        if($request->hasFile('image')){
            // this method is for delete
            if($singleUser->otp && Storage::disk('public')->exists($singleUser->otp)){
            Storage::disk('public')->delete($singleUser->otp);
            }
            // this request for store image
            $imagePath= $request->file('image')->store('user_image','public');
        }
        DB::table('user_accounts')->where('id',$id)->update([
            'email'=>$request->email,
            'password'=>$request->password,
            'otp'=>$imagePath,
            'updated_at'=>now()

        ]);
        return redirect()->route('home')->with('success', 'User updated successfully!');
    }

    public function destroy($id){
        $singleUser = DB::table('user_accounts')->where('id',$id)->first();
        if($singleUser->otp && Storage::disk('public')->exists($singleUser->otp)){
            Storage::disk('public')->delete($singleUser->otp);
        }
        DB::table('user_accounts')->where('id',$id)->delete();
        return redirect()->route('home')->with('success', 'User deleted successfully!');
    }

}
