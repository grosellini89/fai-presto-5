<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Mail\RevisorMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionWatermark;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())),16,36));
        return view ('announcement.create', compact('uniqueSecret'));
    
    }
    
    public function uploadImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName= $request->file('file')->store("public/temp/{$uniqueSecret}");
        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));
        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(
            [
                'id'=>$fileName
            ]
        );

    }

    public function removeImage(Request $request)
    {
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName=$request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    public function getImages(Request $request)
    {
        $uniqueSecret= $request->input('uniqueSecret');
        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);

        $images=array_diff($images, $removedImages);
        $data=[];

        foreach($images as $image)
        {
            $data[] = [
                'id'=>$image,
                'src'=>AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }

    public function store(AnnouncementRequest $request)
    {
        $user=Auth::user();
        $announcement=$user->announcements()->create([
            'title'=>$request->input('title'),
            'body'=>$request->input('body'),
            'price'=>$request->input('price'),
            'category_id'=>$request->input('category'),
        ]);

        $uniqueSecret= $request->input('uniqueSecret');
        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images=array_diff($images, $removedImages);

        foreach ($images as $image ){
            $i=new AnnouncementImage();

            $fileName= basename($image);
            $newFileName = "public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image, $newFileName);        
            $i->file = $newFileName;
            $i->announcement_id= $announcement->id;
            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new GoogleVisionWatermark($i->id),
                new ResizeImage($i->file,300,300),
                new ResizeImage($i->file,250,210),
                new ResizeImage($i->file,500,500),
                new ResizeImage($i->file,100,100)
                ])->dispatch($i->id);
        }

        File::deleteDirectory(storage_path("app/public/temp/{$uniqueSecret}"));
        
        return redirect (route('thankyou'))->with('status', 'Il tuo annuncio è in revisione, sarà pubblicato a breve se conforme.');

    }

    public function edit(Announcement $announcement)
    {
        //
    }

    public function update(Request $request, Announcement $announcement)
    {
        //
    }

    public function destroy(Announcement $announcement)
    {
        //
    }

    public function thankyou(){
        return view('thankyou');
    }
    
    public function workwithus(){
        return view('revisors.workwithus');
    }

    public function askwork(Request $request ){
        
        $name= $request->input('name');
        $message= $request->input('message');
        $email= $request->input('email');
        $contact= compact('name','message','email');
        Mail::to($email)->send(new RevisorMail($contact));
    
        return redirect (route('thankyou'))->with('status', 'Grazie per la richiesta, verrà contattato a breve.');
    }
}
