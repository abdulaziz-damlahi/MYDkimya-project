<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\BlogSection;
use Illuminate\Http\Request;

class BlogSectionController extends Controller
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
        BlogSection::firstOrCreate([
            'language_id' => getLanguage()->id,
            'top_title' => $input['top_title'],
            'title' => $input['title']
        ]);

        return redirect()->route('blog.index')
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
        BlogSection::find($id)->update($input);

        return redirect()->route('blog.index')
            ->with('success', 'content.updated_successfully');
    }

}
