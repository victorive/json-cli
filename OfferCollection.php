<?php

class OfferCollection implements OfferCollectionInterface{

    private $offers = [];

    public function __construct($jsonArray)
    {
        //insert the props of the new object into offers array at the given index
        foreach($jsonArray as $jsonValue){
            $this->offers[] = new Offer(
                $jsonValue['offerId'],
                $jsonValue['productTitle'],
                $jsonValue['vendorId'],
                $jsonValue['price']
            );
        }
    }

    public function get(int $index):OfferInterface{

        assert(array_key_exists($index, $this->offers));

        return $this->offers[$index];
    }

    public function getIterator():Iterator{

        return new ArrayIterator($this->offers);
    }
}