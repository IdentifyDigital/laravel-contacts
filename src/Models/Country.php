<?php


namespace IdentifyDigital\Contacts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Countries
 * @package IdentifyDigital\Contacts\Models
 */
class Country extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'region'
    ];
}
