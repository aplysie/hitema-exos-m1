Suite à un petit oubli dans la déclaration de la première classe la méthode ne retourne qu'une chaîne vide.
Nous avons donc ici fourni une valeur par défaut à la propriété "test".

Il fallait ajouter une méthode, de préférence "protected", afin que les classes filles puissent récupérer la valeur de cette propriété.

    class MyClass
    {
        /**
         * @var string
         */
        private $test = 'quelquechose';
    
        /**
         * @return string
         */
        protected function getTest()
        {
            return $this->test;
        }
    }
    
Il était également possible de modifier la portée de la propriété "private" à "protected".    