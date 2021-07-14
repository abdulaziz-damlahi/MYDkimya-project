<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $sponsors = Sponsor::orderBy('id', 'desc')->get();

        return view('admin.sponsor.create', compact(  'sponsors'));

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
            'order' => 'required|integer',
            'sponsor_image'  => 'required|mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('sponsor_image')){

            // Get image file
            $sponsor_image_file = $request->file('sponsor_image');

            // Folder path
            $folder = 'uploads/img/sponsors/';

            // Make image name
            $sponsor_image_name = time().'-'.$sponsor_image_file->getClientOriginalName();

            // Original size upload file
            $sponsor_image_file->move($folder, $sponsor_image_name);

            // Set input
            $input['sponsor_image']= $sponsor_image_name;

        } else {
            // Set input
            $input['sponsor_image']= null;
        }

        // Record to database
        Sponsor::create([
            'sponsor_image' => $input['sponsor_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('sponsor.create')
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
        // Retrieving models
        $sponsor = Sponsor::findOrFail($id);

        return view('admin.sponsor.edit', compact('sponsor'));
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
        $request->validate([
            'order' => 'required|integer',
            'sponsor_image' => 'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $sponsor = Sponsor::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('sponsor_image')){

            // Get image file
            $sponsor_image_file = $request->file('sponsor_image');

            // Folder path
            $folder = 'uploads/img/sponsors/';

            // Make image name
            $sponsor_image_name =  time().'-'.$sponsor_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$sponsor->sponsor_image));

            // Original size upload file
            $sponsor_image_file->move($folder, $sponsor_image_name);

            // Set input
            $input['sponsor_image']= $sponsor_image_name;

        }

        // Update to database
        Sponsor::find($id)->update($input);

        return redirect()->route('sponsor.create')
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
        $sponsor = Sponsor::find($id);

        // Folder path
        $folder = 'uploads/img/sponsors/';

        // Delete Image
        File::delete(public_path($folder.$sponsor->sponsor_image));

        // Delete record
        $sponsor->delete();

        return redirect()->route('sponsor.create')
            ->with('success', 'content.deleted_successfully');
    }
}
