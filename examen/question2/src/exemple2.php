<?php

class Article
{
    const STATUS_DRAFT = 'draft'; // Brouillon
    const STATUS_SUBMITTED = 'submitted'; // Submitted to validation
    const STATUS_VALIDATED = 'validated'; // Validated
    const STATUS_REFUSED = 'refused'; // Refused

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return array(
            self::STATUS_DRAFT,
            self::STATUS_SUBMITTED,
            self::STATUS_VALIDATED,
            self::STATUS_REFUSED
        );
    }
}

// Ici nous avons ajouté une méthode statique qui nous retourne la liste des statuts sous forme de tableau
var_dump(Article::getStatusList());


