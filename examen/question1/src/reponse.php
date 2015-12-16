<?php

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

class MyClassExtended extends MyClass
{
    /**
     * @return string
     */
    public function getMyHiddenTest()
    {
        return $this->getTest();
    }
}

$myClassExtended = new MyClassExtended();

echo $myClassExtended->getMyHiddenTest();

// Le rendu sera ici: "quelquechose"
// Suite à un petit oubli dans la déclaration de la première classe la méthode ne retourne qu'une chaîne vide.
// Nous avons donc ici fourni une valeur par défaut à la propriété test
