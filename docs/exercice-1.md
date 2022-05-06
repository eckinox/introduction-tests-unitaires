# Exercice #1

## Explorez le fonctionnement d'un test unitaire existant

Ouvrez les fichiers suivants dans votre IDE:

- [`src/Validator/PhoneNumberValidator.php`](../src/Validator/PhoneNumberValidator.php)
- [`tests/Unit/Validator/PhoneNumberValidatorTest.php`](../tests/Unit/Validator/PhoneNumberValidatorTest.php)

Comme vous pouvez le voir, la classe `PhoneNumberValidator` permet de valider
si un numéro de téléphone est valide ou non. `PhoneNumberValidatorTest` est un 
_test case_ pour cette classe. 

Remarquez les conventions suivantes:

- Le nom du test correspond au nom de la classe suivi de `Test`.
- Le namespace du test correspond au namespace de la classe (à l'exception du `\Tests\Unit\`).
- La classe de test extend le `PHPUnit\Framework\TestCase`.
- Les méthodes qui effectuent des tests ont tous le format `testXYZ`.
- Chaque test contient des assertions (ex.: `$this->assertTrue(...)`)
- Chaque test est 100% indépendant
  - On pourrait en modifier/supprimer un, et les autres ne changeraient pas.
  - On pourrait un seul test (ex.: `testCommonFormatsWithNotesAreValid()`) sans rouler les autres avant.

Remarquez également que les tests sont assez répétitifs. 

On travaille toujours avec des données statiques; il n'y a rien d'aléatoire 
ou de variable entre deux exécutions du même test. 

Les tests ne sont pas l'endroit pour flexer: le code doit être simple et 
straightforward, même si ce n'est pas nécessairement beau.


## Pratique: créez un premier test unitaire!

Nous avons dans ce repository une classe `App\Util\TimeFormatter`. 

Celle-ci a comme seule fonction de transformer des nombres d'heures et des nombres 
de minutes en texte facile à lire (ex.: 92 minutes sera formatté en `1h 32m`).

L'objectif de ce premier exercice est donc de rédiger un test unitaire pour cette
classe. 

- Créez le fichier de test.
- Rédigez le(s) test(s).
- Assurez-vous que le test roule avec succès.

![GO!](https://media.giphy.com/media/d3MLTXYlCAZqDNLi/giphy.gif)