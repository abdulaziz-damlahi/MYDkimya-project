<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendTwoGroupKeyword extends Model
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
        'leave_a_comment',
        'your_name',
        'your_email',
        'your_comment',
        'post_comment',
        'search',
        'search_results',
        'search_here',
        'nothing_found',
        'categories',
        'links',
        'contact_us',
        'view_more',
        'name',
        'email',
        'subject',
        'message',
        'tags',
        'admin',
    ];

}
