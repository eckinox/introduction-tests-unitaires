# Atelier d'introduction aux tests unitaires (en PHP)

> **📚 Avant de commencer...**  
> Ce repository est un atelier explicatif sur les tests automatisés, et plus 
> spéciquemment sur les tests unitaires.
> 
> Avant de commencer votre lecture, téléchargez ce repository sur votre ordinateur
> ou sur un serveur où PHP est installé, et installez les dépendances PHP en roulant 
> la commande 
> 
> ```bash
> composer install
> ```
> 

---

## Qu'est-ce qu'un test unitaire ?

Les tests unitaires permettent de valider le bon fonctionnement d'une unité de code, 
comme une classe, une fonction, ou un script.

L'objectif d'un test est de valider que le code fonctionne tel que prévu, afin d'éviter
des bugs/problèmes lors de l'utilisation. Les tests permettent également de valider si 
des changements au code sont backwards-compatible (aka: s'ils vont briser ou changer le 
comportement du code existant).


## Comment ça fonctionne ?

En résumé, un test consiste généralement en un exemple d'utilisation de l'unité de code,
dans lequel sont parsemés des assertions.

### Qu'est-ce qu'une assertion ?

Une assertion, c'est simplement de valider que quelque chose est vrai. 

Dans le cas de tests automatisés, les assertions comparent généralement une valeur retournée
par le code à la valeur dont on s'attend à ce que le code retourne.

Voici quelques types d'assertions communes:

- `cette valeur` est vraie
- `cette valeur` est fausse
- `cette valeur` est un nombre
- `cette valeur` est une chaine de caractères
- `ce nombre` est plus grand que `X`
- `ce nombre` est plus petit que `X`
- `cet array` contient l'élément `X`

### PHPUnit

Pour tirer avantage des tests, il faut qu'on rédige des tests, mais il faut également que
ces tests soient exécutés et qu'on puisse consulter les résultats! C'est là qu'entrent en
jeu les testing frameworks.

Dans le cas d'une codebase PHP, le framework le plus commun est [PHPUnit](https://phpunit.de/).

Si vous êtes dans un projet Symfony, PHPUnit devrait déjà être installé et avoir une configuration
de base pour votre projet. Sinon, vous pouvez l'installer et le configurer en suivant la 
documentation officielle.

#### Cas de test dans PHPUnit

Avec PHPUnit, on place généralement les tests dans un dossier `tests` à la racine de votre projet.

Une bonne pratique est généralement de séparer les tests par type dans ce dossier. Il y a plusieurs
manières différentes de faire cela, mais en prenant en compte que le projet risque d'éventuellement
avoir plusieurs types de tests, voici une suggestion de structure assez complète:

```
tests
  Backend
    Unit
      > your PHP unit tests here, with the same file structure as your codebase
    Integration
      > your PHP integration tests here

  Frontend
    Unit
      > your JS unit tests here, with the same file structure as your codebase
    Integration
      > your JS integration tests here

  EndToEnd
    > your E2E tests here

  fixtures
    > store any files needed for your tests here
```

### Exécuter les tests avec PHPUnit

Une fois PHPUnit installé, configuré, et vos tests rédigés, vous pouvez exécuter vos tests en
roulant PHPUnit.

Si vous l'avez installé avec Composer, la commande devrait être ceci:

```bash
./vendor/bin/phpunit
```

Par défaut, PHPUnit va rouler les tests dans le dossier indiqué par votre configuration. Vous
pouvez spécifiez quel(s) test(s) rouler en lui donnant le path d'un dossier ou d'un fichier. 

Ex.:

```bash
./vendor/bin/phpunit tests/Unit/Validator
```

ou:

```bash
./vendor/bin/phpunit tests/Unit/Validator/PhoneNumberValidatorTest.php
```

ou encore:

```bash
./vendor/bin/phpunit tests/Unit/*
```


---

## 📚✨ Exercice #1 ✨📚
📚 À ce point dans l'atelier, vous pouvez passer à [l'exercice pratique #1](docs/exercice-1.md).  
📚 Vous pourrez continuer la lecture/formation après cet exercice.

---


## Fixtures

Il est possible que vous ayez besoin de fichiers ou de données quelconques pour faire des tests.

Vous pourriez générer des données aléatoirement, mais cela ferait en sorte que votre test
serait différent d'une exécution à l'autre. Et ça, on veut pas ça.

Afin de vous assurer que vous testez toujours la même chose, vous pouvez créer et ajouter
à votre projet des fichiers de test. Vous pouvez également utilisez des librairies comme 
[Foundry](https://github.com/zenstruck/foundry) pour générer des objets de test facilement. 

Ces fichiers et données dont la seule fonction sera d'être utilisés pour exécuter vos tests
s'appellent des Fixtures. 

## Mocks & stubs

Dans certains cas, vous allez vouloir tester du code qui a des dépendances ou des liens 
avec d'autres classes/services/APIs/etc. 

Étant donné que le rôle d'un test unitaire est de tester une seule unité de code en isolation,
vous devrez éliminer les interférences/intéractions avec ces autres services.

Pour ce faire, il est pratique commune de créer ce qu'on appelle des **mocks** et/ou des **stubs**.

En gros, les mocks et les stubs sont une fausse version d'un service que vous pouvez configurer 
afin qu'il fonctionne comme vous le désirez.

### Stub
Les stubs permettent de simuler les intéractions avec des services réels tout en assurant que 
les valeurs retournées sont prévisibles et constantes.

Par exemple, si vous avez une classe qui a comme dépendance un service `GoogleApi`, dont la méthode 
`search(string $searchTerms)` fait une recherche sur l'API de Google et vous retourne les résultats, 
vous pourriez créer un stub du service `GoogleApi` qui retourne toujours le même résultat lorsqu'on 
appelle sa méthode `search()`. 

Ainsi, votre test ne dépend plus de l'API externe de Google: vous testez seulement le comportement
de votre application. 

C'est donc plus rapide et plus stable. 

### Mock
Les **mocks** fonctionnent essentiellement de la même manière que les stubs, mais ils permettent
également de faire des assertions sur les intéractions avec la classe/méthode qui est mockée. 

Dans le même exemple du `GoogleApi`, vous pourriez créez un mock au lieu d'un stub afin de valider 
si la méthode `GoogleApi::search()` est belle et bien appelée une fois (pas plus, pas moins) par 
votre service.

### Comment créer des mocks et des stubs
Il y a plusieurs manières de créer des mocks et des stubs. 
Les plus communes pour les tests unitaires en PHP sont:

- D'utiliser [documentation sur les mock & stubs de PHPUnit](https://phpunit.readthedocs.io/en/9.5/test-doubles.html).
- D'utiliser une librairie / un framework de mock/stub alternatif comme [Mockery](https://github.com/mockery/mockery).

### Le point négatif des mocks/stubs
Les mocks/stubs ont deux problèmes principaux: 

- Créer des mocks/stubs peut être long.
- Si le service externe que vous avez mocké/stubbé change, vos tests unitaires va continuer de rouler sans problème, 
  alors qu'en réalité votre application pourrait être brisée.

Le 2e point est une des principales raisons pour lesquelles les tests unitaires ne donnent
pas aussi confiance que des tests E2E. 

Il faut donc garder en tête que plus on crée de mocks/stubs, moins nos tests réflètent la réalité,
et donc moins ils devraient nous donner confiance en notre application.

Ça peut donc valoir la peine de créer des tests d'intégrations ou des tests E2E au lieu de 
des tests unitaires qui dépendent beaucoup sur des stubs/mocks.



---

## 📚✨ Exercice #2 ✨📚
📚 À ce point dans l'atelier, vous pouvez passer à [l'exercice pratique #2](docs/exercice-2.md).  
📚 Vous pourrez continuer la lecture/formation après cet exercice.

---


## Qu'est-ce que je dois tester? À quel point mes tests doivent-ils être complets?

Dans un monde idéal, les tests couvriraient tous les scénarios imagineables. Pour ce faire,
on devrait créer plusieurs tests qui simuleraient chaqu'un de ces scénarios.

Dans un monde plus réaliste dans lequel le développement est limité par multiples contraintes
tels que le temps et les budgets, l'objectif est différent: vos tests devraient couvrir assez 
de scénarios pour vous rendre confiant.e.s que si tous les tests passent, le logiciel 
fonctionnera bien comme prévu.


## Les différents types de tests

Voici un aperçu rapide des différents types de tests automatisés les plus communs:

- **Tests statiques**: vérifient si votre code est valide (ex.: PHPMD, PHPStan, eslint, etc.).
- **Tests unitaires**: vérifient si vos classes/méthodes fonctionnent comme prévu individuellement.
- **Tests d'intégration**: vérifient si vos classes et services fonctionnent comme prévu ensemble.
- **Tests end-to-end (E2E)**: vérifient si le logiciel fonctionne comme prévu du point de vue d'un utilisateur.

Chaque type de test a ses avantages et désavantages, et chacun a sa place. Une même application
utilisera généralement tous ces types de tests afin de valider le bon fonctionnement à différents 
niveaux.

### Pros & cons: tests unitaires et statiques
Les tests statiques et unitaires sont très rapides, mais ne font que valider chaque bout code
individuellement. Ils ne peuvent donc pas vous donner confiance en votre application entière.

### Pros & cons: tests d'intégration
Les tests d'intégrations vous permettent de valider le bon fonctionnement de plusieurs systèmes
qui travaillent ensembles. 

Par exemple, un test d'intégration pourrait simuler une requête HTTP envoyée à un controller 
(qui lui traite la requête en passant par différents services) et valider que la réponse du 
controller correspond bien à ce à quoi on s'attend. 

Un test d'intégration est un peu plus long à rédiger et à exécuter qu'un test unitaire, mais 
cela vous donne un plus haut niveau de confiance puisque ça simule un comportement semblable 
à celui d'un vrai utilisateur.

### Pros & cons: tests E2E
Les tests E2E vous permettent de tester le bon fonctionnement de votre application du point de 
vue de l'utilisateur. 

Dans un test E2E, vous controllez un vrai navigateur; vous naviguez et vous intéragissez avec 
l'application en cliquant sur des liens et des boutons exactement comme un utilisateur le ferait. 

Ces tests sont généralement plus long à rédiger et à exécuter que tous les autres types, 
mais ils vous offrent un niveau de confiance beaucoup plus élevés puisqu'ils vous permettent 
de tester tout votre application comme si un humain le faisait manuellement. Vous ne testez donc 
plus le code: vous testez réellement vos user stories.


## Littérature additionnelle suggérée
- [Write tests. Not too many. Mostly integration.](https://kentcdodds.com/blog/write-tests) (article par Kent C. Dodds)
- [How to know what to test](https://kentcdodds.com/blog/how-to-know-what-to-test) (article par Kent C. Dodds)