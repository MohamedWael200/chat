<?php

namespace App\Http\Controllers;

use App\Models\Albom;
use App\Models\Pictures;
use App\Trait\UploadImageTrait;
use Illuminate\Http\Request;

class PicturesController extends Controller
{
    //
    use UploadImageTrait;
    public function pictures()
    {
        $pictures = Pictures::all();
        return view('albums.index');
    }

    public function create()
    {
        $albom = Albom::all();
        return view('Pictures.addPictures',['albom' => $albom]);
    }

    public function addPicture(Request $request) {
        $path = $this->uploadImage($request->photo,'AlbomPictures');
        $Pictures = Pictures::create([
            'name' => $request->name,
            'albom_id'=>$request->albom,
            'path' =>$path,
        ]);

            return redirect()->route('index');
    }

    public function edit($id)
    {
        $albom = Albom::all();
        $Pictures = Pictures::where('id',$id)->first();
        return view('Pictures.editePictures',['Pictures' => $Pictures , 'albom' => $albom]);
    }

    public function updatePicture(Request $request ,$id){
        $path = $this->uploadImage($request->photo,'AlbomPictures');
        $pictures = Pictures::findorfail($id);
        $pictures->update([
            'name'=>$request->name,
            'path' => $path,
            'albom_id' => $request->albom,
        ]);
        return redirect()->route('index');
    }

    public function AllPic($id) {
        $details = Albom::findorfail($id)->pictures;
        return view('pictures',['details' => $details]);
    }


    public function destroyPic($id){
        $delete = Pictures::destroy($id);
        return redirect()->route('index');
    }
}
