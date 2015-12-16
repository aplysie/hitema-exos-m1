L'idée ici était d'introduire la définition d'une classe "Container" capable de gérer l'instanciation de tous ces services.

Cela permettait d'alléger le code sur toutes les pages et permettait d'implémenter de façon optimale l'injection de dépendance.

    class Container
    {
        private $service1;
        private $service2;
        private $service3;
        private $service4;
        private $parameters;
        
        public function __construct(array $parameters = array())
        {
            $this->parameters = $parameters;
        }
    
        public function getParameter($key, $default = null)
        {                
            if (array_key_exists($key, $this->parameters)) {
                return $this->parameters[$key]; 
            }
            
            return $default;
        }       
        
        protected function getService1()
        {
            if (null === $this->service1) {
                $this->service1 = new Service1($this->getParameter("param1"), $this->getParameter("param2"));
            }
            
            return $this->service1;
        }
        
        public function getService2()
        {
            if (null === $this->service2) {
                $this->service2 = new Service2($this->getService1());
            }
            
            return $this->service2;
        }

        public function getService3()
        {
            if (null === $this->service3) {
                $this->service3 = new Service3($this->getService1(), $this->getService2());
            }
            
            return $this->service3;
        }
        
        public function getService4()
        {
            if (null === $this->service4) {
                $this->service4 = new Service4($this->getService1(), $this->getService3());
            }
            
            return $this->service4;
        }        
    }
    
Exemple d'instanciation et d'utilisation:
    
    $parameters = array(
        'param1' => 'param1',
        'param2' => 'param2'
    );
    
    $container = new Container($parameters);
    
En reprenant les exemples dans le Readme (vous pouviez simplement l'expliquer):

    // bootstrap.php:
    require __DIR__ . '/services/service.1.php';
    require __DIR__ . '/services/service.2.php';
    require __DIR__ . '/services/service.3.php';
    require __DIR__ . '/services/service.4.php';
    
    $parameters = array(
        'param1' => 'param1',
        'param2' => 'param2'
    );
    
    // index.php:   
    require __DIR__ . '/boostrap.php';
   
    $container = new Container($parameters);
    
    $container->getService3()->faitQuelqueChose();
    $container->getService4()->faitQuelqueChose();
        
    // page1.php
    require __DIR__ . '/boostrap.php';
    
    $container = new Container($parameters);
    
    $container->getService2()->faitQuelqueChose();
    
    
On remarque ici que le container soulage énormément le code et permet de centraliser tout le processus de configuration et d'instanciation des services utilisées dans l'application.

De plus et c'était la question bonus, il est possible de rendre un service disponible pour les autres services mais pas utilisables dans l'application:

    // Provoque une erreur PHP
    $container->getService1();
    
On peut penser par exemple à des services qui sont utiles à d'autres services mais qui n'ont pas d'intérêt au niveau applicatif.

Les services GoogleMaps et YahooMaps n'ont pas vraiment d'intérêt à être utilisées dans l'application directement.

On préfère dans ce cas rendre disponible les différents Provider qui fournissent une implémentation plus proches du fonctionnel de l'application.

    
    