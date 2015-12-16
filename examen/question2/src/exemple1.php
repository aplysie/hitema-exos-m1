<?php

class Article
{
    const STATUS_DRAFT = 'draft'; // Brouillon
    const STATUS_SUBMITTED = 'submitted'; // Submitted to validation
    const STATUS_VALIDATED = 'validated'; // Validated
    const STATUS_REFUSED = 'refused'; // Refused
}

// On récupère chacune des constantes sans instancier la classe
echo Article::STATUS_DRAFT . PHP_EOL;
echo Article::STATUS_SUBMITTED . PHP_EOL;


