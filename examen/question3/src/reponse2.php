<?php

class Article
{
    const STATUS_DRAFT = 'draft'; // Brouillon
    const STATUS_SUBMITTED = 'submitted'; // Submitted to validation
    const STATUS_VALIDATED = 'validated'; // Validated
    const STATUS_REFUSED = 'refused'; // Refused

    /**
     * @var string
     */
    private $status;

    private $createdAt;

    public function __construct()
    {
        $this->status = self::STATUS_DRAFT;
        $this->createdAt = new \DateTime();
    }

    /**
     * Cette méthode n'était pas demandée elle permet juste ici d'obtenir le résultat de ce qu'on a appliqué
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Cette méthode n'était pas demandée elle permet juste ici d'obtenir le résultat de ce qu'on a appliqué
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}

$article = new Article();

var_dump($article->getStatus());
var_dump($article->getCreatedAt()->format('Y-m-d H:i'));