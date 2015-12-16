<?php

interface LogInterface
{
    const LOG_INFO = 'info';
    const LOG_WARNING = 'warning';
    const LOG_ERROR = 'error';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getMessage();

    /**
     * @return mixed
     */
    public function log();
}

class SimpleLog implements LogInterface
{
    private $message;
    private $type;

    /**
     * SimpleLog constructor.
     *
     * @param $message
     * @param $type
     */
    public function __construct($message, $type)
    {
        $this->message = $message;
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function log()
    {
        return $this->type . ': ' . $this->message;
    }
}

class TaggedLog implements LogInterface
{
    private $log;

    /**
     * TaggedLog constructor.
     *
     * @param LogInterface $log
     */
    public function __construct(LogInterface $log)
    {
        $this->log = $log;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->log->getType();
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->log->getMessage();
    }

    /**
     * @return string
     */
    public function log()
    {
        return sprintf(
            '<%s>%s</%s>',
            $this->getType(),
            $this->getMessage(),
            $this->getType()
        );
    }
}

?>
Une erreur s'est glissée dans la définition de la question. L'objectif ici était de présenter le pattern "decorator".
L'idée était ici de modifier le comportement de la méthode log.
Dans le SimpleLog cette méthode devait renvoyer un format simpliste: "type: message"
Le TaggedLog prend en paramètre un objet de type LogInterface et modifie le format de sortie en utilisant un tag:
<type>message</type>

Cette question n'enlèvera donc aucun point mais peut en donner.

<?php
$simpleLog = new SimpleLog('un message de log', LogInterface::LOG_WARNING);
$taggedLog = new TaggedLog($simpleLog);

var_dump($simpleLog->log());
var_dump($taggedLog->log());

