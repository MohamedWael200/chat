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
        return view('index' , ['albums' => $albums , 'picture' => $picture]);
    }

    public function create()
    {
        return view('albums.addAlbum');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Albom::create($request->all());

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
        dd($info);
    }

    public function changePicAlbom(Request $request, $id){
//        $albom = Albom::findorfail($id)->pictures;
        $albumId = $request->input('albom');
        $pictures = Pictures::where('albom_id', $albumId)->get();
        dd($albumId);
        foreach ($pictures as $picture) {
            dd($picture->albom_id);
            $picture->update(['albom_id' => $request->albom]);
        }
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
