<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialSectionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get All Request
        $input = $request->all();

        // Record to database
        TestimonialSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'shadow_text' => $input['shadow_text'],
            'top_title' => $input['top_title'],
            'title' => $input['title']
        ]);

        return redirect()->route('testimonial.create')
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
        // Get All Request
        $input = $request->all();

        // Update model
        TestimonialSection::find($id)->update($input);

        return redirect()->route('testimonial.create')
            ->with('success', 'content.updated_successfully');
    }

}
