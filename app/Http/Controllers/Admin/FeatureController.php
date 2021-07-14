<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving a model
        $language = getLanguage();
        $features = Feature::where('language_id', $language->id)->get();

        return view('admin.feature.create', compact('features'));
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
            'feature_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('feature_image')){

            // Get image file
            $feature_image = $request->file('feature_image');

            // Folder path
            $folder ='uploads/img/features/';

            // Make image name
            $feature_image_name =  time().'-'.$feature_image->getClientOriginalName();

            // Upload image
            $feature_image->move($folder, $feature_image_name);

            // Set input
            $input['feature_image']= $feature_image_name;

        } else {
            // Set input
            $input['feature_image']= null;
        }

        // Record to database
        Feature::create([
            'language_id' => getLanguage()->id,
            'feature_image' => $input['feature_image'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'btn_link' => $input['btn_link'],
            'order' => $input['order']
        ]);

        return redirect()->route('feature.create')
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
        $feature = Feature::findOrFail($id);

        return view('admin.feature.edit', compact('feature'));
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
            'order' => 'required|integer',
            'feature_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get model
        $feature = Feature::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('feature_image')){

            // Get image file
            $feature_image = $request->file('feature_image');

            // Folder path
            $folder ='uploads/img/features/';

            // Make image name
            $feature_image_name =  time().'-'.$feature_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$feature->feature_image));

            // Upload image
            $feature_image->move($folder, $feature_image_name);

            // Set input
            $input['feature_image'] = $feature_image_name;

        }

        // Record to database
        Feature::find($id)->update($input);

        return redirect()->route('feature.create')
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
        $feature = Feature::find($id);

        // Folder path
        $folder = 'uploads/img/features/';

        // Delete Image
        File::delete(public_path($folder.$feature->feature_image));

        // Delete record
        $feature->delete();

        return redirect()->route('feature.create')
            ->with('success', 'content.deleted_successfully');
    }
}
