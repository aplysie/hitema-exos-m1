<?php

interface TimestampableInterface
{
    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @return \DateTime
     */
    public function getUpdatedAt();
}

class Person implements TimestampableInterface
{
    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return new \DateTime();
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return new \DateTime();
    }
}

class Media implements TimestampableInterface
{
    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return new \DateTime();
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return new \DateTime();
    }
}

?>
Nous voyons ici que l'interface nous permet d'obtenir un comportement commun aux deux classes très différentes
Cependant ici nous n'imposons pas l'implémentation même si avec les annotations nous montrons bien ce que l'on souhaite obtenir.
Pour cela il aurait fallu utiliser par exemple une classe abstraite, ce qui était exclu dans la question (pas d'héritage).
cf. la réponse 2 allait avec la question bonus et impliquait l'utilisation des "traits" disponibles avec php 5.4

<?php

$person = new Person();
$media = new Media();

var_dump(
    'media',
    $media->getCreatedAt(),
    $media->getUpdatedAt()
);

var_dump(
    'person',
    $person->getCreatedAt(),
    $person->getUpdatedAt()
);

?>
