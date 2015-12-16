<?php

abstract class BaseBlock
{
    /**
     * BaseBlock constructor.
     * Nous ajoutons ici un constructeur pour faciliter la démonstration
     *
     * @param string $title
     * @param string $content
     */
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * @var string
     */
    private $title;

    /**
     * @var mixed
     */
    private $content;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    abstract public function getType();
}

class TextBlock extends BaseBlock
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'text';
    }
}

class ImageBlock extends BaseBlock
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'image';
    }
}

class NotHandledBlock extends BaseBlock
{
    /**
     * @return string
     */
    public function getType()
    {
        return 'not_handled_block';
    }
}

?>
Ici l'idée était simplement l'idée d'implémenter l'héritage à partir d'une classe abstraite.
Tous les enfants sont des blocs possédant un identifiant unique obtenu par la méthode "getType" que la classe abstraite nous oblige à implémenter.

<?php

$blocks = array(
    new ImageBlock('Titre de l\'image', 'http://lorempixel.com/160/120/cats'),
    new TextBlock('Titre du texte', 'Contenu du text'),
    new NotHandledBlock('rien', 'rien')

);

/** @var BaseBlock $block */
foreach ($blocks as $block) {
    switch ($block->getType()) {
        case 'image':
            echo sprintf('<img src="%s" alt="%s"/>', $block->getContent(), $block->getTitle());
            echo PHP_EOL; // Pour passer à la ligne
            break;
        case 'text':
            echo sprintf('<h1>%s</h1><p>%s</p>', $block->getTitle(), $block->getContent());
            echo PHP_EOL; // Pour passer à la ligne
            break;
        default:
            echo sprintf('<p>Aucune stratégie n\'a été implémenté pour les blocs de type: "%s"</p>', $block->getType());
            echo PHP_EOL;
            break;
    }
}
