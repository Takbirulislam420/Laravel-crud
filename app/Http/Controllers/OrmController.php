<?php

namespace App\Http\Controllers;
use App\Models\UserAccount;
use App\Models\UserProfile;
use PhpParser\Node\Expr\Print_;

class OrmController extends Controller
{
    public function ormExample(){
        $user_account=UserAccount::all();
        //$user_account=UserAccount::select('id','email','password')->where('id',25)->first();

        //  For insert DATA
            // $add_user=new UserAccount();
            // $add_user->email="applwa";
            // $add_user->password='123456';
            // $add_user->account_number='11214';
            // $add_user->own_reffer_code='12d2';
            // $storeUser=$add_user->save();


        // insert array  if want to store multiple data then use like this->    
        // UserAccount::insert($newUserArray); and if single array then use create method
            // $newUserArray=[
            //     [
            //         'email'=>'Orangesdf',
            //         'password'=>23324,
            //         'account_number'=> 121322,
            //         'own_reffer_code'=>234
            //     ],
            //     [
            //         'email'=>'Orangesd',
            //         'password'=>23324,
            //         'account_number'=> 121352,
            //         'own_reffer_code'=>235
            //     ]
            // ];
            // UserAccount::insert($newUserArray);



            // update query
                // $update_user=UserAccount::find(24);
                // $update_user->email="tasiba@gmail.com";
                // $update_user->password= 2342423;
                // $update_user->save();

            // $totalUser=UserAccount::count();  // count all of user
            // $totalUserBalance= UserAccount::sum('user_accounts');  // sum of user_accounts column
            // $everageBalance= UserAccount::avg('balance');  // avg of the avg column
            // $mexBalance= UserAccount::max('balance');   // mex balance of the max column




            return view('orm.index',compact('user_account'));



        // if ($storeUser==true) {
            
        // } else {
        //     return view('orm.index',compact('user_account'))->with('success','orm successfull');
        // }

    }
}
