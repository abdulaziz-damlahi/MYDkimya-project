<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Project;
use App\Models\Admin\ProjectSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
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
        $projects = Project::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $project_section = ProjectSection::where('language_id', $language->id)->first();

        return view('admin.project.create', compact(  'projects', 'project_section'));

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
            'title'   =>  'required|max:40',
            'order' => 'required|integer',
            'project_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_image')){

            // Get image file
            $project_image_file = $request->file('project_image');

            // Folder path
            $folder = 'uploads/img/projects/';

            // Make image name
            $project_image_name = time().'-'.$project_image_file->getClientOriginalName();

            // Original size upload file
            $project_image_file->move($folder, $project_image_name);

            // Set input
            $input['project_image']= $project_image_name;

        } else {
            // Set input
            $input['project_image']= null;
        }

        // Record to database
        Project::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => $input['desc'],
            'project_image' => $input['project_image'],
            'order' => $input['order']
        ]);

        return redirect()->route('project.create')
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
        $project = Project::findOrFail($id);

        return view('admin.project.edit', compact('project'));
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
            'title'   =>  'required|max:40',
            'order' => 'required|integer',
            'project_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048'
        ]);

        $project = Project::find($id);

        // Get All Request
        $input = $request->all();

        if($request->hasFile('project_image')){

            // Get image file
            $project_image_file = $request->file('project_image');

            // Folder path
            $folder = 'uploads/img/projects/';

            // Make image name
            $project_image_name =  time().'-'.$project_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$project->project_image));

            // Original size upload file
            $project_image_file->move($folder, $project_image_name);

            // Set input
            $input['project_image']= $project_image_name;

        }

        // Update to database
        Project::find($id)->update($input);

        return redirect()->route('project.create')
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
        $project = Project::find($id);

        // Folder path
        $folder = 'uploads/img/projects/';

        // Delete Image
        File::delete(public_path($folder.$project->project_image));

        // Delete record
        $project->delete();

        return redirect()->route('project.create')
            ->with('success', 'content.deleted_successfully');
    }
}
