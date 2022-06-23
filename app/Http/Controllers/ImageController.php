<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller {
    public function show() {
        //return all images
    }

    public function store( Request $request ) {
        //validate the incoming file
        if ( ! $request->hasFile( 'image' ) ) {
            return response()->json( [ 'error' => 'Nu exista nici o imagine' ], 400 );
        }

        $request->validate( [
            'image' => 'required|file|image'
        ] );
        //save the file in storage
        $path        = $request->file( 'image' )->store( '/public/images' );
        $public_path = $request->file( 'image' )->store( '/storage/images' );

        if ( ! $path ) {
            return response()->json( [ 'error' => 'Fisierul nu a putut fi salvat', 500 ] );
        }

        $uploadedFile = $request->file( 'image' );
        //create image model
        $image = Image::create( [
            'name'      => $uploadedFile->hashName(),
            'path'      => $public_path,
            'extension' => $uploadedFile->extension(),
            'size'      => $uploadedFile->getSize(),
        ] );

        //return that image model back to the frontend
        return $image;
    }
}
