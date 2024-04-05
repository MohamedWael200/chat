<?php

namespace App\Http\Controllers;

use App\Models\Albom;
use App\Models\Pictures;
use App\Trait\UploadImageTrait;
use Illuminate\Http\Request;

class AlbomController extends Controller
{
    //
    use UploadImageTrait;
    public function album()
    {
        $albums = Albom::all();
        $picture = Pictures::first();
        $count = Albom::count();
        return view('index' , ['albums' => $albums , 'picture' => $picture , 'count' => $count]);
    }

    public function create()
    {
        return view('albums.addAlbum');
    }

    public function store(Request $request)
    {

        $path = $this->uploadImage($request->photo,'AlbomPCover');
        $Albom = Albom::create([
            'name' => $request->name,
            'cover' =>$path,
        ]);

        return redirect()->route('index');
    }

    public function edit($id)
    {
        $Alboms = Albom::where('id',$id)->first();
        return view('albums.editeAlbum',['Alboms' => $Alboms]);
    }


    public function update(Request $request,$id){
        $albom = Albom::findOrFail($id);
        $albom->update([
            'name'=>$request->name,
        ]);
        return redirect()->route('index');
    }


    public function movePicture($id){
        $albom = Albom::all();
        $info = Albom::findOrFail($id);
        return view('move',['albom' => $albom , 'info' => $info]);
    }

    public function changePicAlbom(Request $request){
//        $albom = Albom::findorfail($id)->pictures;
        $albumId = $request->input('albomId');
        $pictures = Pictures::where('albom_id', $albumId)->get();
        foreach ($pictures as $picture) {
            $picture->update(['albom_id' => $request->albom]);
        }
        Albom::destroy($albumId);
//        foreach ($albom as $pic){
//            $pic->update([
//                'albom_id' => $request->albom,
//            ]);
//        }

        return redirect()->route('index');
    }

    public function destories(Request $request, $id){
        Albom::destroy($id);
        return redirect()->route('index');
    }

}
