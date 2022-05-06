# Exercice #1

## Explorez le fonctionnement d'un test unitaire avec des mocks/stubs

Ouvrez les fichiers suivants dans votre IDE:

- [`src/Catalog/ProductCatalog.php`](../src/Catalog/ProductCatalog.php)
- [`tests/Unit/Catalog/ProductCatalogTest.php`](../tests/Unit/Catalog/ProductCatalogTest.php)

Le `ProductCatalog` a une méthode `getMostExpensiveProducts()` qui récupère les produits
dans la base de données et qui retourne les X produits qui coûte le plus cher, en ordre
de prix (du plus cher au moins cher).

Vous remarquerez dans le fichier de test que `testCatalogFetchesProductsFromRepository()` 
utilise un mock du repository dont le `ProductCatalog` a besoin afin de valider que la 
méthode `getMostExpensiveProducts()` va bel et bien chercher les produits dans le repository.

Si vous faites rouler ce test quelques fois, vous remarquerez que parfois il roule avec
succès, et que d'autres fois il retourne des erreurs.


## Pratique: régler le problème intermittent qui rend le test _flaky_

L'objectif de ce 2e exercice est de comprendre ce qui fait échouer le test de manière 
intermittente, et de corriger le problème.

Vous aurez sans doute besoin de vous référer à la [documentation sur les mock & stubs de PHPUnit](https://phpunit.readthedocs.io/en/9.5/test-doubles.html)
pour compléter cet exercice. 

![GO!](https://media.giphy.com/media/Ot4U0KHw2fdvxJZ4jh/giphy.gif)


## Pousser l'exercice plus loin

Si vous le désirez, vous pouvez essayer de compléter l'exercice avec une libraire 
de mocking alternative, telle que [Mockery](https://github.com/mockery/mockery).