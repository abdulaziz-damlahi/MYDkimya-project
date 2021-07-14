<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeamSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamSectionController extends Controller
{
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
            'bg_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('bg_image')){

            // Get image file
            $bg_image = $request->file('bg_image');

            // Folder path
            $folder ='uploads/img/teams/';

            // Make image name
            $bg_image_name =  time().'-'.$bg_image->getClientOriginalName();

            // Upload image
            $bg_image->move($folder, $bg_image_name);

            // Set input
            $input['bg_image']= $bg_image_name;

        } else {
            // Set input
            $input['bg_image']= null;
        }


        // Record to database
        TeamSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'bg_image' => $input['bg_image']
        ]);

        return redirect()->route('team.create')
            ->with('success', 'content.created_successfully');
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
            'bg_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);


        // Get model
        $team_section = TeamSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('bg_image')){

            // Get image file
            $bg_image = $request->file('bg_image');

            // Folder path
            $folder ='uploads/img/teams/';

            // Make image name
            $bg_image_name =  time().'-'.$bg_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$team_section->bg_image));

            // Upload image
            $bg_image->move($folder, $bg_image_name);

            // Set input
            $input['bg_image'] = $bg_image_name;

        }

        // Update model
        TeamSection::find($id)->update($input);

        return redirect()->route('team.create')
            ->with('success', 'content.updated_successfully');
    }

}
