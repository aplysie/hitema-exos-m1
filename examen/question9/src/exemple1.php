<?php

require_once __DIR__ . '/../../question8/src/lib.php';

class Address
{
    /**
     * @return string
     */
    public function getFormattedAddress()
    {
        return '';
    }

    /**
     * @param AddressResult $addressResult
     */
    public function updateFromAddressResult(AddressResult $addressResult)
    {
        ;
    }
}

class AddressService
{
    private $geocoder;

    public function __construct(MapsProviderInterface $geocoder)
    {
        $this->geocoder = $geocoder;
    }

    public function normalizeAddress(Address $address)
    {
        $addressResult = $this->geocoder->geocode($address->getFormattedAddress());

        $address->updateFromAddressResult($addressResult);
    }

    public function createAddressFromCoordinates($lat, $lng)
    {
        $addressResult = $this->geocoder->reverseGeocode($lat, $lng);
        $address = new Address();
        $address->updateFromAddressResult($addressResult);

        return $address;
    }
}
