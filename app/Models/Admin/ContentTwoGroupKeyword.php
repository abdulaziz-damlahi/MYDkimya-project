<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTwoGroupKeyword extends Model
{
    use HasFactory;

    public $timestamps = FALSE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'section_title_and_desc',
        'top_title',
        'blogs',
        'add_blog',
        'edit_blog',
        'short_desc',
        'tag',
        'seperate_with_commas',
        'author',
        'category',
        'post_date',
        'view',
        'features',
        'add_feature',
        'edit_feature',
        'about',
        'counters',
        'add_counter',
        'edit_counter',
        'icon',
        'timer',
        'services',
        'add_service',
        'edit_service',
        'teams',
        'add_team',
        'edit_team',
        'name',
        'job',
        'skills',
        'add_skill',
        'edit_skill',
    ];
}
