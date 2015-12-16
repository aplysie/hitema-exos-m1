<?php

/**
 * Class AddressResult
 * Cette classe n'était pas demandée, pour l'exercice nous l'implémentons
 */
class AddressResult
{
    private $address = '5 rue du chemin';
    private $postalCode = "75020";
    private $city = "PARIS";
    private $latitude = 48.8534100;
    private $longitude = 2.3488000;
}

/**
 * Class GoogleMaps
 * Cette classe n'était pas demandée, pour l'exercice nous l'implémentons
 */
class GoogleMaps
{
    /**
     * GoogleMaps constructor.
     *
     * @param string $token
     * @param string $secret
     */
    public function __construct($token, $secret)
    {
        $this->token = $token;
        $this->secret = $secret;
    }

    /**
     * @param $address
     *
     * @return array
     */
    public function geocode($address)
    {
        return array();
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return array
     */
    public function reverseGeocode($latitude, $longitude)
    {
        return array();
    }
}

/**
 * Class YahooMaps
 * Cette classe n'était pas demandée, pour l'exercice nous l'implémentons
 */
class YahooMaps
{
    /**
     * YahooMaps constructor.
     *
     * @param string $token
     * @param string $secret
     */
    public function __construct($token, $secret)
    {
        $this->token = $token;
        $this->secret = $secret;
    }

    /**
     * @param $address
     *
     * @return array
     */
    public function geocode($address)
    {
        return array();
    }

    /**
     * @param float $latitude
     * @param float $longitude
     *
     * @return array
     */
    public function reverseGeocode($latitude, $longitude)
    {
        return array();
    }
}

interface MapsProviderInterface
{
    /**
     * @param string $address
     *
     * @return AddressResult
     */
    public function geocode($address);

    /**
     * @param float $lat
     * @param float $lng
     *
     * @return AddressResult
     */
    public function reverseGeocode($lat, $lng);
}

class GoogleMapsProvider implements MapsProviderInterface
{
    private $provider;

    /**
     * GoogleMapsProvider constructor.
     */
    public function __construct(GoogleMaps $googleMaps)
    {
        $this->provider = $googleMaps;
    }

    /**
     * @param $address
     *
     * @return AddressResult
     */
    public function geocode($address)
    {
        $data = $this->provider->geocode($address);
        $result = new AddressResult();
        // Hydrate address
        return $result;
    }

    public function reverseGeocode($lat, $lng)
    {
        $data = $this->provider->reverseGeocode($lat, $lng);
        $result = new AddressResult();
        // Hydrate address
        return $result;
    }
}

class YahooMapsProvider implements MapsProviderInterface
{
    /**
     * YahooMapsProvider constructor.
     *
     * @param YahooMaps $yahooMaps
     */
    public function __construct(YahooMaps $yahooMaps)
    {
        $this->provider = $yahooMaps;
    }

    /**
     * @param $address
     *
     * @return AddressResult
     */
    public function geocode($address)
    {
        $data = $this->provider->geocode($address);
        $result = new AddressResult();
        // Hydrate address
        return $result;
    }

    public function reverseGeocode($lat, $lng)
    {
        $data = $this->provider->reverseGeocode($lat, $lng);
        $result = new AddressResult();
        // Hydrate address
        return $result;
    }
}