<?php


namespace IdentifyDigital\Contacts\Traits;

use IdentifyDigital\Contacts\Models\Contact;

/**
 * Trait Contactable
 * @package IdentifyDigital\Contacts\Traits
 */
trait Contactable
{
    /**
     * Initialising the Relationship
     *
     * @return mixed
     */
    public function contacts(){
        return $this->morphMany(Contact::class, 'relation');
    }

    /**
     * Adds a contact method to the User
     *
     * @param String $type
     * @param String $label
     * @param String $value
     * @return mixed
     */
    public function addContactMethod(String $type, String $label, String $value){
        return $this->contacts()->create(
            array(
                'type' => $type,
                'label' => $label,
                'value' => $value
            )
        );
    }

    /**
     * Gets all the contact methods of the user, this can be filtered down using the parameters
     *
     * @param String|null $type
     * @param String|null $label
     * @param bool|null $phonesOnly
     * @return mixed
     */
    public function getContactMethods(String $type = null, String $label = null, Bool $phonesOnly = null){
        return $this->contacts()
                    ->when($type, function ($q) use ($type){
                        $q->where('type',$type);
                    })
                    ->when($label, function ($q) use ($label){
                        $q->where('label',$label);
                    })
                    ->when($phonesOnly, function ($q) use($phonesOnly){
                        $q->where('type','<>','email');
                    })
                    ->get();
    }

    /**
     * @return mixed
     */
    public function getAllLandlines(){
        return $this->getContactMethods('landline');
    }

    /**
     * @return mixed
     */
    public function getAllMobiles(){
        return $this->getContactMethods('mobile');
    }

    /**
     * @return mixed
     */
    public function getAllWorkPhones(){
        return $this->getContactMethods(null, 'work',true);
    }

    /**
     * @return mixed
     */
    public function getAllEmails(){
        return $this->getContactMethods('email');
    }

}
