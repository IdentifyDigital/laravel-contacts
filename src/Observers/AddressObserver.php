<?php

namespace IdentifyDigital\Contacts\Observers;

use IdentifyDigital\Contacts\Models\Address;
use Illuminate\Support\Facades\Log;
use Jabranr\PostcodesIO\PostcodesIO;

class AddressObserver
{
    public function creating(Address $address){
        if (empty($address->latitude) && empty($address->longitude)){
            $postcodeFinder = new PostcodesIO();
            try {
                $postcodeResults = $postcodeFinder->find($address->postcode);
                if(isset($postcodeResults->result)){
                    $address->latitude = $postcodeResults->result->latitude;
                    $address->longitude = $postcodeResults->result->longitude;
                }
            }
            catch (\Exception $e){
                Log::error('Address not found');
            }
        }
    }
}
