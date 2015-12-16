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

**6. QUESTION CORRIGEE:

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
    
Présentez une implémentation "TaggedLog" permettant d'afficher le message de log en utilisant une balise autour du message. Ex: <warning>le message</warning>
    
*Question bonus:* Quel design pattern peut être appliqué (ou a été appliqué) à cette implémentation ?    