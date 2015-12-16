11.

L'injection de dépendance: permet de rendre explicite les dépendances d'une classe/service.

12.

L'injection de dépendance a besoin d'une implémentation structurelle, programmatique.

Le principe du "service container" permet de l'appliquer, en centralisant les paramètres de configuration ainsi que l'instanciation des différents services inter-dépendants.

Dans des gros frameworks comme Symfony2, les paramètres et les services sont déclarés dans des fichiers: xml, yaml ou autre.
Exemple:

    # config.yml:

    parameters:
        google.maps.token: "token"
        google.maps.secret: "secret"
    
    services:
        google_maps:
            class:        App\Google\GoogleMaps
            arguments:    ['%google.maps.token%', '%google.maps.secret%']
            
        google_map.provider:
            class:        App\Provider\GoogleMapsProvider
            arguments: ['@google_maps']
            

Dans cet exemple, et grâce à cette simple configuration, le container va pouvoir construire nos différents objets/services.
            
GoogleMaps sera instancié avec les paramètres définis plus haut et qu'on fournit comme arguments à son constructeur.

GoogleMapsProvider sera instancié avec comme argument le service google_maps définit plus haut.
