<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSixGroupKeyword extends Model
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
        'current_password',
        'new_password',
        'confirm_password',
        'add_faq',
        'edit_faq',
        'favicon_image',
        'admin_logo_image',
        'pending_approval',
        'approval',
        'which_language',
        'reminding',
    ];

}
