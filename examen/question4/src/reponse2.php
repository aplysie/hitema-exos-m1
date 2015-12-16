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

trait TimestampableTrait
{
    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @param DateTime $updatedAt
     */
    public function setUpdatedAt(DateTime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }
}

class Person implements TimestampableInterface
{
    use TimestampableTrait;

    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
        $this->setUpdatedAt(new DateTime());
    }
}

class Media implements TimestampableInterface
{
    use TimestampableTrait;

    public function __construct()
    {
        $this->setCreatedAt(new DateTime());
        $this->setUpdatedAt(new DateTime());
    }
}

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