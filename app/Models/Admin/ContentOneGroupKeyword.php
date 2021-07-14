<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentOneGroupKeyword extends Model
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
        'sliders',
        'add_slider',
        'edit_slider',
        'add_new',
        'title',
        'desc',
        'btn_name',
        'btn_link',
        'order',
        'image',
        'size',
        'recommended_size',
        'submit',
        'action',
        'created_successfully',
        'updated_successfully',
        'deleted_successfully',
        'current_image',
        'not_yet_created',
        'delete',
        'close',
        'you_wont_be_able_to_revert_this',
        'cancel',
        'yes_delete_it',
        'categories',
        'add_category',
        'edit_category',
        'category_name',
        'status',
        'select_your_option',
        'enable',
        'disable',
    ];
}
