<?php


namespace IdentifyDigital\Contacts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contact
 * @package IdentifyDigital\Contacts\Models
 */
class Contact extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'type',
        'label',
        'value',
        'relation_type',
        'relation_id'
    ];
}
