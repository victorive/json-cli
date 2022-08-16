<?php

class VendorIdIterator extends FilterIterator{

    private int $vendorId;

    public function __construct(Iterator $iterator, int $vendorId)
    {
        parent::__construct($iterator);
        $this->vendorId = $vendorId;
    }

    public function accept() : bool
    {
        return parent::current()->getVendorId() === $this->vendorId;
    }

}