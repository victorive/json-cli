<?php
/**
 * Interface for the Collection class that contains Offers
 */

interface OfferCollectionInterface {

    public function get(int $index):OfferInterface;

    public function getIterator():Iterator;

    //Receive the data from reader and specify methods get and getIterator


}