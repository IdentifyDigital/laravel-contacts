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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'address_string'
    ];

    /**
     * Magic Method
     * Gets a String of the full address
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getAddressStringAttribute();
    }

    /**
     * Gets a String of the full address
     *
     * @return string
     */
    public function getAddressStringAttribute()
    {
        $string = "";
        $requiredAttributes = ['line_1', 'line_2', 'line_3', 'city', 'postcode'];
        foreach ($requiredAttributes as $key => $attribute){
            if ($key == 0) {
                $string .= $this->{$attribute};
            }
            else {
                if ($this->{$attribute} !== null) {
                    $string .= ', ' . $this->{$attribute};
                }
            }
        }
        return $string;
    }

}
