<?php


namespace IdentifyDigital\Contacts\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Address
 * @package IdentifyDigital\Contacts\Models
 */
class Address extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'line_1',
        'line_2',
        'line_3',
        'city',
        'county',
        'postcode',
        'country_id',
        'longitude',
        'latitude',
        'relation_type',
        'relation_id'
    ];

    protected $appends = [
        'address_string'
    ];

    public function getAddressStringAttribute()
    {
        return "{$this->line_1}, {$this->line_2}, {$this->city}, {$this->postcode}";
    }

}
