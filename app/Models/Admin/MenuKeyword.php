<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuKeyword extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'dashboard',
        'banner',
        'sliders',
        'categories',
        'blogs',
        'features',
        'about',
        'counters',
        'services',
        'teams',
        'skills',
        'projects',
        'sponsors',
        'prices',
        'faqs',
        'testimonials',
        'contact',
        'contact_info',
        'socials',
        'messages',
        'pages',
        'settings',
        'site_info',
        'site_images',
        'homepage_versions',
        'google_analytic',
        'external_url',
        'breadcrumb',
        'sections',
        'seo',
        'languages',
        'optimizer',
        'logout',
        'notifications',
        'profile',
        'change_password',
        'data_language',
        'comments',
        'galleries',
        'which_language',
        'reminding',
    ];
}
