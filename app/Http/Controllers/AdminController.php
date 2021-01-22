<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }

    public function pickrevisor(){
        $users=User::paginate(5);
        return view('admin.pickrevisor', compact('users'));
    }

    public function acceptrevisor($id){
        $user=User::find($id);
        $user->is_revisor=true;
        $user->save();
        return redirect(route('pickrevisor'))->with('status', "L'utente è ora revisor!");
    }

    public function removerevisor($id){
        $user=User::find($id);
        $user->is_revisor=false;
        $user->save();
        return redirect(route('pickrevisor'))->with('status', "L'utente non è più revisor!");
    }

    public function acceptadmin($id){
        $user=User::find($id);
        $user->is_admin=true;
        $user->is_revisor=true;
        $user->save();
        return redirect(route('pickrevisor'))->with('status', "L'utente è ora admin!");
    }

    public function removeadmin($id){
        $user=User::find($id);
        $user->is_admin=false;
        $user->save();
        return redirect(route('pickrevisor'))->with('status', "L'utente non è più admin!");
    }

    public function adminsearch(Request $request)
    {
        $q= $request->input('q');
        $users= User::search($q)->paginate(5);
        return view('admin.searched', compact('q' , 'users'));
    }
}
