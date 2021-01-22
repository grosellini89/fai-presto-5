<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announcements = Announcement::where('is_accepted', true)->orderBy('created_at', 'desc')->take(5)->get();
        return view('homepage', compact('announcements'));
    }

    public function filtercategory($name, $id) {
        $category=Category::find($id);
        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);

        return view('filtercategory', compact('category', 'announcements'));
    }
    public function show($id)
    {
        $announcement=Announcement::find($id);
        return view('announcement.show', compact('announcement'));
    }

    public function search(Request $request)
    {
        $q= $request->input('q');
        $announcements= Announcement::search($q)->where('is_accepted', true)->get();
        return view('searched', compact('q' , 'announcements'));
    }

    public function headersearch(Request $request)
    {
        $q= $request->input('q');
        $id_category=$request->input('category');
        $articles= Announcement::search($q)->where('is_accepted', true)->get();
        $announcements=[];
        foreach ($articles as $article)
        {
            if($article->category_id == $id_category)
            {
                $announcements[]=$article;
            }
        }
        return view('searched', compact('q' , 'announcements'));
    }

    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
