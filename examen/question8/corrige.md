Ici l'intérêt n'était pas de fournir l'ensemble de ce qui est présenté ci-dessus. Le but c'est que ce soit plus ou
moins fonctionnel pour vous lorsque vous testerez.
La réponse attendue était simplement de fournir une interface voire une classe abstraite permettant d'indiquer le
comportement attendu par nos différents provider: GoogleMapsProvider, YahooMapsProvider.
Ainsi que d'externaliser les paramètres écrits en dur dans les classes.
Donc la réponse pouvait être du type:

interface MapProviderInterface
{
    public function geocode($address);
    public function reverseGeocode($lat, $lng);
}

class GoogleMapsProvider implements MapProviderInterface {}
class YahooMapsProvider implements MapProviderInterface {}