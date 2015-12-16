**7.** Soit la classe suivante:

    class Templating
    {
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
    
Nous souhaiterions rendre évolutive la méthode render de cet objet sans nous servir de l'héritage et en permettant d'implémenter des moteurs de rendu plus efficaces ou puissants.
Par exemple, charger un template à partir de la variable template:
    
    $text = file_get_contents($template);
    
Ou simplement en modifiant la façon de remplacer dans le template les valeurs fournies par le tableau de paramètres.

*Question bonus* Quel design pattern peut être appliqué (ou a été appliqué) à cette implémentation ?