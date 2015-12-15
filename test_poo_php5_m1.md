**HITEMA - M1 - TEST POO PHP5**

**1.** Implémentez une méthode rendant accessible la propriété "test" aux enfants de la classe suivante:
    
    class MyClass
    {
        private $test;
    }

**2.** Soit la classe suivante:
    
    class Article
    {
        const STATUS_DRAFT = 'draft'; // Brouillon
        const STATUS_SUBMITTED = 'submitted'; // Submitted to validation
        const STATUS_VALIDATED = 'validated'; // Validated
        const STATUS_REFUSED = 'refused'; // Refused
    }

Indiquez une façon de récupérer ces différents statuts sans instancier la classe.

**3.** Soit la classe précédente, nous ajoutons les propriétés "createdAt" (une date) et "status" (le statut brouillon). Proposez une implémentation afin que ces deux propriétés possèdent une valeur par défaut avant d'être enregistrés en bdd par exemple.

**4.** Nous souhaiterions implémenter des méthodes communes "getCreatedAt", "getUpdatedAt" à des classes très différentes sans utiliser l'heritage. Présentez un exemple d'implémentation pour deux classes "Media" et "Person".

*Question bonus:* en PHP5 comment partager ces deux méthodes sans répéter le code dans chacune de ces classes.

**5.** Soit la classe suivante:

    class TextBlock
    {
        private $title;
        private $content;
        
        public function getTitle() { return $this->title; }
        public function getContent() { return $this->content; }
    }

Nous souhaitons implémenter d'autres types de blocs: "image", "link" etc. Ces blocs partagent les propriétés "title" et "content" et doivent pouvoir être différenciés selon leur "type". Présentez une implémentation possible de ce "pattern". Pour l'exemple nous restreindrons le type de blocs à "text" et "image".

**6.** Soit l'interface et la classe suivante

    interface LogInterface
    {
        const LOG_INFO = 'info';
        const LOG_WARNING = 'warning';
        const LOG_ERROR = 'error';      
        
        public function log($message, $type);   
    }
    
    class SimpleLog implements LogInterface
    {              
        public function log($message, $type) { echo $type . ': ' . $message; }
    }
    
Présentez une implémentation "TaggedLog" permettant d'afficher le message de log en utilisant une balise autour du message. Ex: <warning>le message</warning>
    
*Question bonus:* Quel design pattern peut être appliqué (ou a été appliqué) à cette implémentation ?

**7.** Soit la classe suivante:

    class Templating
    {
        public function render($template, $params = array())
        {
            $keys = array_map(
                function ($key) {
                    return '%' . $key . '%';
                },
                array_keys($params)
            );
            echo str_replace($keys, array_values($params), $template);
        }
    }
    
Nous souhaiterions rendre évolutive la méthode render de cet objet sans nous servir de l'héritage et en permettant d'implémenter des moteurs de rendu plus efficaces ou puissants.
Par exemple, charger un template à partir de la variable template:
    
    $text = file_get_contents($template);
    
Ou simplement en modifiant la façon de remplacer dans le template les valeurs fournies par le tableau de paramètres.

*Question bonus* Quel design pattern peut être appliqué (ou a été appliqué) à cette implémentation ?

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

**10.** Modifiez l'implémentation ci-dessous de façon à la rendre plus réutilisable

    // bootstrap.php:
    require __DIR__ . '/services/service.1.php';
    require __DIR__ . '/services/service.2.php';
    require __DIR__ . '/services/service.3.php';
    require __DIR__ . '/services/service.4.php';
    
    // index.php:   
    require __DIR__ . '/boostrap.php';
   
    $service1 = new Service1("param1", "param2");
    $service2 = new Service2($service1);
    $service3 = new Service3($service2, $service2);
    $service4 = new Service4($service1, $service3);
    
    $service3->faitQuelqueChose();
        
    // page1.php
    require __DIR__ . '/boostrap.php';
    
    $service1 = new Service1("param1", "param2");
    $service2 = new Service2($service1);
    
    $service2->faitQuelqueChose();
     
*Bonus*: Le service1 ne devrait pas être utilisé directement dans l'application mais uniquement à l'intérieur des services qui en dépendent. Proposez dans votre implémentation cette possibilité.

**Question bonus 11:** Qu'est-ce que l'injection de dépendance ?

**Question bonus 12:** De quelle façon utiliser au mieux l'injection de dépendance afin d'alléger et d'automatiser son utilisation ?
