**10.** Modifiez l'implémentation ci-dessous de façon à la rendre plus réutilisable

    // bootstrap.php:
    require __DIR__ . '/services/service.1.php';
    require __DIR__ . '/services/service.2.php';
    require __DIR__ . '/services/service.3.php';
    require __DIR__ . '/services/service.4.php';
    
    // index.php:   
    require __DIR__ . '/boostrap.php';
   
    $service1 = new Service1("param1", "param2");
    $service2 = new Service2($service1);
    $service3 = new Service3($service1, $service2);
    $service4 = new Service4($service1, $service3);
    
    $service3->faitQuelqueChose();
        
    // page1.php
    require __DIR__ . '/boostrap.php';
    
    $service1 = new Service1("param1", "param2");
    $service2 = new Service2($service1);
    
    $service2->faitQuelqueChose();
     
*Bonus*: Le service1 ne devrait pas être utilisé directement dans l'application mais uniquement à l'intérieur des services qui en dépendent. Proposez dans votre implémentation cette possibilité.