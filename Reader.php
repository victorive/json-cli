<?php

class Reader implements ReaderInterface {

    public function read(string $input):OfferCollectionInterface{

        return new OfferCollection(json_decode($input, true));
    }

    // public function readendpoint(string $url):OfferCollectionInterface{
        
    //     $ch = curl_init();

    //     return new OfferCollection(json_decode($input, true));

        // curl_setopt($ch, CURLOPT_URL, $this->url);
        // curl_setopt($ch, CURLOPT_HEADER, $this->header);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // }

}