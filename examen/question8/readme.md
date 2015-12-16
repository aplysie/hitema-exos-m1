**8.** Soit la classe suivante:

    class GoogleMapsProvider
    {
        private $provider;
    
        public function __construct()
        {
            return new GoogleMaps('proApiToken', 'proApiSecret');
        }
        
        public function geocode($address)
        {
            $this->provider->geocode($address);           
            $result = new AddressResult();
            // Hydrate address
            return $result;
        }
        
        public function reverseGeocode($lat, $lng)
        {
            $this->provider->reverseGeocode($lat, $lng);           
            $result = new AddressResult();
            // Hydrate address
            return $result;
        }       
    }
    
Proposez une implémentation permettant de pouvoir utiliser d'autres services de "geocoding" dynamiquement et de rendre les paramètres nécessaires aux services de "geocoding" configurables

ATTENTION! Une erreur s'est glissé dans l'énoncé. Il ne faut pas lire:
        
        private $provider;
        
        public function __construct()
        {
            return new GoogleMaps('proApiToken', 'proApiSecret');
        }
        
mais:
        
        private $provider;
        
        public function __construct()
        {
            $this->provider = new GoogleMaps('proApiToken', 'proApiSecret');
        }
