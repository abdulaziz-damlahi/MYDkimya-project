<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillSection;
use Illuminate\Http\Request;

class SkillController extends Controller
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
        $skills = Skill::where('language_id', $language->id)->orderBy('id', 'asc')->get();
        $skill_section = SkillSection::where('language_id', $language->id)->first();

        return view('admin.skill.create', compact('skills', 'skill_section'));
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
            'percent_rate' => 'required|integer',
            'title' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        //Set percent_rate > 100
        if ($input['percent_rate'] > 100) {
            $input['percent_rate'] = 100;
        }

        // Record to database
        Skill::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'percent_rate' => $input['percent_rate'],
            'order' => $input['order']
        ]);

        return redirect()->route('skill.create')
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
        $skill = Skill::findOrFail($id);

        return view('admin.skill.edit', compact('skill'));
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
            'percent_rate' => 'required|integer',
            'title' => 'required',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        //Set percent_rate > 100
        if ($input['percent_rate'] > 100) {
            $input['percent_rate'] = 100;
        }

        // Record to database
        Skill::find($id)->update($input);

        return redirect()->route('skill.create')
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
        $skill = Skill::find($id);

        // Delete record
        $skill->delete();

        return redirect()->route('skill.create')
            ->with('success', 'content.deleted_successfully');
    }
}
