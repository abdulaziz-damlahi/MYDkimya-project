<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFourGroupKeyword extends Model
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
        'map_iframe',
        'map_iframe_desc_placeholder',
        'contact',
        'add_contact',
        'edit_contact',
        'socials',
        'add_social',
        'edit_social',
        'link',
        'email',
        'subject',
        'message',
        'read_status',
        'mark_all_as_read',
        'mark',
        'messages',
        'site_info',
        'copyright',
        'address',
        'address_map_link',
        'phone',
        'site_images',
        'favicon',
        'admin_logo',
        'admin_small_logo_image',
        'site_white_logo_image',
        'site_colored_logo_image',
        'google_analytic',
        'external_url',
        'breadcrumb',
        'sections',
        'seo',
    ];
}
