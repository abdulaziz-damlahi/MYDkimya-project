<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentThreeGroupKeyword extends Model
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
        'percent_rate',
        'projects',
        'add_project',
        'edit_project',
        'sponsors',
        'add_sponsor',
        'edit_sponsor',
        'prices',
        'add_price',
        'edit_price',
        'currency',
        'price',
        'time',
        'monthly',
        'annually',
        'please_take_with_features_semicolon',
        'faqs',
        'add_faqs',
        'edit_faqs',
        'question',
        'answer',
        'testimonials',
        'add_testimonial',
        'edit_testimonial',
        'shadow_text',
        'star',
        'galleries',
        'add_gallery',
        'edit_gallery',
        'pages',
        'add_page',
        'edit_page',
    ];
}
