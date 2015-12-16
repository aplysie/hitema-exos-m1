<?php

// cf lib.php pour la définition des classes
require_once __DIR__ . '/lib.php';

$googleMaps = new GoogleMaps('proApiToken', 'proApiSecret');
$yahooMaps = new YahooMaps('proApiToken2', 'proApiSecret2');

$mapProviders['google'] = new GoogleMapsProvider($googleMaps);
$mapProviders['yahoo'] = new YahooMapsProvider($yahooMaps);


$adresse = 'ma super adresse';
// Avec google
var_dump('Avec google', $mapProviders['google']->geocode($adresse));

// Avec yahoo
var_dump('Avec yahoo', $mapProviders['yahoo']->geocode($adresse));
