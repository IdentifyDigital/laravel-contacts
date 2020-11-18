<?php
namespace IdentifyDigital\Contacts\Traits;

use IdentifyDigital\Contacts\Models\Address;
use IdentifyDigital\Contacts\Models\Countries;

/**
 * Trait HasAddresses
 * @package IdentifyDigital\Contacts\Traits
 */
trait HasAddresses
{
    /**
     * @return mixed
     */
    public function addresses(){
        return $this->morphMany(Address::class, 'relation')
                    ->join('countries','countries.id','=','addresses.country_id')
                    ->select(['addresses.*','countries.name as country_name','countries.region']);
    }

    /**
     * @return mixed
     */
    public function getAllAddresses(){
        return $this->addresses()
                    ->get();
    }

    /**
     * @return mixed
     */
    public function getLatestAddress(){
        return $this->addresses()
                    ->latest('addresses.created_at')
                    ->first();
    }

    /**
     * @return mixed
     */
    public function getOldestAddress(){
        return $this->addresses()
                    ->oldest('addresses.created_at')
                    ->first();
    }

    /**
     * @param String $line1
     * @param String $line2
     * @param String $line3
     * @param String $city
     * @param String $county
     * @param String $postcode
     * @param String $country
     * @param String|null $longitude
     * @param String|null $latitude
     * @return mixed
     */
    public function addAddress(String $line1, String $line2, String $line3, String $city, String $county,
                               String $postcode, String $country, String $longitude = null, String $latitude = null
    ){
        $country = Countries::where('name',$country)->firstOrFail();
        return $this->addresses()->create(
            array(
                'line_1'=> $line1,
                'line_2'=> $line2,
                'line_3'=> $line3,
                'city'=> $city,
                'county'=> $county,
                'postcode'=> $postcode,
                'longitude'=> $longitude,
                'latitude'=> $latitude,
                'country_id'=>$country->id
            )
        );
    }
}
