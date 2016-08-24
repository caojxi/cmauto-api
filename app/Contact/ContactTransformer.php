<?php

namespace LearnGP\Contact;

class ContactTransformer
{
    /**
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'id' => $contact->getKey(),
            'myob_id' => $contact->myob_id,
            'email' => $contact->email,
            'mobile' => $contact->mobile,
            'full_name' => trim("{$contact->first_name} {$contact->last_name}"),
            'first_name' => $contact->first_name,
            'last_name' => $contact->last_name,
            'full_address' => $contact->full_address,
            'type' => $contact->type,
        ];
    }
}
