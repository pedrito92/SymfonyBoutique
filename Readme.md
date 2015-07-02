#Symfony 2

##Run Server
```
php app/console server:run
```
ou

```
php app/console server:start
php app/console server:stop
```

##Generate DataBase
```
//Génére la structure en yml
php app/console doctrine:mapping:convert yml ./src/Store/FrontendBundle/Resources/config/doctrine/orm --from-database --force

//Génére le mappingphp app/console doctrine:mapping:import StoreFrontendBundle annotation//Génére les getters et settersphp app/console doctrine:generate:entities StoreFrontendBundle
```

Attention, pour les relations (clé étrangère): repecter la convention d'écriture:  
nomTable_nomcolonne
