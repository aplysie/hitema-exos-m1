Il s'agissait simplement ici, comme dans la question précédente, était de fournir ici un GeocoderInterface au constructeur du service AddressService:


    interface GeocoderInterface
    {
        public function geocode($address);
        public function reverseGeocode($lat, $lng);
    }
    
    public function __construct(GeocoderInterface $geocoder)
    {
        $this->geocoder = $geocoder;
    }
       
Le GeocoderInterface pourrait par exemple être ajouté directement à l'interface vue dans la question8 et dans ce cas là on pourrait fournir directement les YahooGoogleMapProvider et GoogleMapProvider:    
       
    interface MapProviderInterface extends GeocoderInterface
    {
        // Peut faire d'autres choses que geocoder
    }
    
Ou bien implémenter un Geocoder:
    
    class Geocoder implements GeocoderInterface
    {
        public function __construct(MapProviderInterface $provider)
        {
            $this->provider = $provider;
        }
    }
    
Du coup on passe à nos classes AddressService et par exemple StoreService qui ont tous les deux besoins de géocoder quelque chose.

Question bonus: il fallait ici dire qu'on avait à faire à de l'injection de dépendance.


