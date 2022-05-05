# Atelier d'introduction aux tests unitaires (en PHP)

<div style="padding: 1em 1.5em; margin: 3em 0; border: 1px solid; box-sizing: border-box;">
	<strong style="font-size: 1.5em">📚 Avant de commencer...</strong><br>
	<p>
		Ce repository est un atelier explicatif sur les tests automatisés, et plus 
		spéciquemment sur les tests unitaires.
	</p>
	<p>
		Avant de commencer votre lecture, téléchargez ce repository sur votre ordinateur
		ou sur un serveur où PHP est installé, et installez les dépendances PHP en roulant 
		la commande <code>composer install</code>.
	</p>
</div>

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


<div style="padding: 1em 1.5em; margin: 3em 0; border: 1px solid; box-sizing: border-box;">
	<strong style="font-size: 1.5em">📚 Exercice #1</strong><br>
	<p>À ce point dans la lecture, vous pouvez passer à <a href="blob/main/docs/exercice-1.md">l'exercice pratique #1.</a></p>
	<p>Vous pourrez continuer la lecture/formation après cet exercice.</p>
</div>


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