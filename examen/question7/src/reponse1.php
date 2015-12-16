<?php

interface TemplateRendererInterface
{
    /**
     * @param string $template
     * @param array  $params
     *
     * @return mixed
     */
    public function render($template, $params = array());
}

class StringTemplateRenderer implements TemplateRendererInterface
{
    /**
     * @param string $template
     * @param array  $params
     *
     * @return string
     */
    public function render($template, $params = array())
    {
        $keys = array_map(
            function ($key) {
                return '%' . $key . '%';
            },
            array_keys($params)
        );
        echo str_replace($keys, array_values($params), $template);
    }
}

class FileTemplateRenderer implements TemplateRendererInterface
{
    /**
     * @param string $template
     * @param array  $params
     *
     * @return string
     */
    public function render($template, $params = array())
    {
        extract($params);

        include $template;
    }
}

class Templating
{
    /**
     * Templating constructor.
     *
     * @param TemplateRendererInterface $renderer
     */
    public function __construct(TemplateRendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param string $template
     * @param array  $params
     */
    public function render($template, $params = array())
    {
        $this->renderer->render($template, $params);
    }
}

?>

Premier exemple à partir d'une chaîne de caractères:

<?php
$stringTemplating = new Templating(new StringTemplateRenderer());
$stringTemplating->render('Hello %name%.', array('name' => 'Robert'));
?>


Second exemple à partir d'un fichier:

<?php

$fileTemplating = new Templating(new FileTemplateRenderer());
$fileTemplating->render(__DIR__ . '/example.tpl.php', array('name' => 'Robert'));
?>


Le principe ici était de sortir de notre objet Templating le mécanisme de rendu.
C'est un exemple de pattern "composite" ou "composition".
Cela permet de rendre le code plus souple sans modifier le fonctionnement de la classe principale: ici Templating.
