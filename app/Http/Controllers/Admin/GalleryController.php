<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $galleries = Gallery::all();

        return view('admin.gallery.create', compact('galleries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'gallery_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('gallery_image')){

            // Get image file
            $gallery_image = $request->file('gallery_image');

            // Folder path
            $folder ='uploads/img/galleries/';

            // Make image name
            $gallery_image_name = time().'-'.$gallery_image->getClientOriginalName();

            // Upload image
            $gallery_image->move($folder, $gallery_image_name);

            // Set input
            $input['gallery_image']= $gallery_image_name;

        }

        // Record to database
        Gallery::firstOrCreate([
            'order' => $input['order'],
            'gallery_image' => $input['gallery_image']
        ]);

        return redirect()->route('gallery.create')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Retrieving a model
        $gallery = Gallery::findOrFail($id);

        return view('admin.gallery.edit', compact( 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'gallery_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        // Get model
        $gallery = Gallery::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('gallery_image')){

            // Get image file
            $gallery_image = $request->file('gallery_image');

            // Folder path
            $folder ='uploads/img/galleries/';

            // Make image name
            $gallery_image_name =  time().'-'.$gallery_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$gallery->gallery_image));

            // Upload image
            $gallery_image->move($folder, $gallery_image_name);

            // Set input
            $input['gallery_image'] = $gallery_image_name;

        }

        // Update user
        Gallery::find($id)->update($input);

        return redirect()->route('gallery.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Retrieve a model
        $gallery = Gallery::find($id);

        // Folder path
        $folder = 'uploads/img/galleries/';

        // Delete Image
        File::delete(public_path($folder.$gallery->gallery_image));

        // Delete record
        $gallery->delete();

        return redirect()->route('gallery.create')
            ->with('success', 'content.deleted_successfully');
    }
}
