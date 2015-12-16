**5.** Soit la classe suivante:

    class TextBlock
    {
        private $title;
        private $content;
        
        public function getTitle() { return $this->title; }
        public function getContent() { return $this->content; }
    }

Nous souhaitons implémenter d'autres types de blocs: "image", "link" etc.
Ces blocs partagent les propriétés "title" et "content" et doivent pouvoir être différenciés selon leur "type".
Présentez une implémentation possible de ce "pattern". Pour l'exemple nous restreindrons le type de blocs à "text" et "image".
