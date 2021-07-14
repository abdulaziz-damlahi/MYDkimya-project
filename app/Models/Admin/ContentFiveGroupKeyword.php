<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFiveGroupKeyword extends Model
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
        'site_name',
        'site_desc',
        'site_keywords',
        'please_create_a_category',
        'languages',
        'add_language',
        'edit_language',
        'language_name',
        'language_code',
        'direction',
        'keywords',
        'for_admin_panel',
        'for_frontend',
        'content_group',
        'menu',
        'hide',
        'show',
        'yes',
        'no',
        'display_footer_menu',
        'display_dropdown',
        'default_site_language',
        'please_try_again',
        'you_are_not_authorized',
        'comment',
        'comments',
        'approval_status',
        'mark_all_as_approval',
        'read',
        'unread',
        'profile',
        'change_password',
    ];
}
