**9.** Soit la classe suivante se servant de la classe précédente (8.):
   
    class AddressService
    {
        private $geocoder;
        
        public function __construct()
        {
            $this->geocoder = new GoogleMapsProvider();
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
    
Proposez une implémentation permettant d'utiliser le même service de "geocoding" dans un autre service sans duplication de code ni d'héritage.

*Question bonus*: Quel pattern peut être appliqué (ou a été appliqué) aux deux questions (8 et 9) précédentes ?