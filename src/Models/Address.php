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

//    /**
//     * @return string
//     */
//    public function AddressToString(){
//        $AddressString = "";
//        $this->makeHidden('country_id');
//        dd($this->visible);
//
//        foreach ($this->attributes as $field){
//
//            $AddressString .= ($field != null ? "{$field},\n\r":'');
//        }
//        return $AddressString;
//    }

}
