<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor');
    }

    public function index(){
        $announcement=Announcement::where('is_accepted', null)->orderBy('created_at', 'asc')->first();
        return view('revisors.homepage', compact('announcement'));
    }

    private function setAccepted($announcement_id, $value){
        $announcement=Announcement::find($announcement_id);
        $announcement->is_accepted=$value;
        $announcement->save();
        return redirect(route('revisor.homepage'));
    }

    public function accept($announcement_id){
        return $this->setAccepted($announcement_id, true);
    }

    public function reject($announcement_id){
        return $this->setAccepted($announcement_id, false);
    }

    public function deleted(){
        $announcements=Announcement::where('is_accepted', '!=', null)->orderBy('created_at', 'desc')->paginate(10);
        return view('revisors.deleted', compact('announcements'));
    }

    public function restore($announcement_id){
        $announcement=Announcement::find($announcement_id);
        $announcement->is_accepted=null;
        $announcement->save();
        return redirect (route('revisor.deleted'))->with('status', "L'annuncio è stato ripristinato, è tornato in revisione.");
    }

    public function revisorsearch(Request $request)
    {
        $q= $request->input('q');
        $announcements= Announcement::search($q)->get();
        return view('revisors.deletedsearched', compact('q' , 'announcements'));
    }
}
