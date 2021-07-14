<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SkillSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillSectionController extends Controller
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
            'skill_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image = $request->file('skill_image');

            // Folder path
            $folder ='uploads/img/skill/';

            // Make image name
            $skill_image_name =  time().'-'.$skill_image->getClientOriginalName();

            // Upload image
            $skill_image->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        } else {
            // Set input
            $input['skill_image']= null;
        }


        // Record to database
        SkillSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'top_title' => $input['top_title'],
            'title' => $input['title'],
            'desc' => $input['desc'],
            'skill_image' => $input['skill_image']
        ]);

        return redirect()->route('skill.create')
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
            'skill_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);


        // Get model
        $skill_section = SkillSection::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image = $request->file('skill_image');

            // Folder path
            $folder ='uploads/img/skill/';

            // Make image name
            $skill_image_name =  time().'-'.$skill_image->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$skill_section->skill_image));

            // Upload image
            $skill_image->move($folder, $skill_image_name);

            // Set input
            $input['skill_image'] = $skill_image_name;

        }

        // Update model
        SkillSection::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }
}
