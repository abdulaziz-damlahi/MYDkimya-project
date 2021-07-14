<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrontendOneGroupKeyword extends Model
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
        'home',
        'about',
        'services',
        'teams',
        'projects',
        'news',
        'pricing',
        'faqs',
        'skills',
        'contact',
        'gallery',
        'galleries',
        'office_address',
        'social_list',
        'read_more',
        'call_us_now',
        'more_question',
        'testimonials',
        'all_news',
        'your_message_has_been_delivered',
        'your_comment_is_pending_approval',
        'help',
        'contact_info',
        'submit_now',
        'updating',
        'all',
        'recent_posts',
        'by',
        'pages',
        'per_monthly',
        'per_annual',
        'comments',
    ];

}
