<?php

class Offer implements OfferInterface{

    private int $offerId;
    private string $productTitle;
    private int $vendorId;
    private int $price;

    public function __construct(int $offerId, string $productTitle, int $vendorId, int $price)
    {
        $this->offerId = $offerId;
        $this->productTitle = $productTitle;
        $this->vendorId = $vendorId;
        $this->price = $price;
    }

    public function getPrice():int
    {
        return $this->price;
    }

    public function getVendorId():int
    {
        return $this->vendorId;
    }

}