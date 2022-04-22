# bts-site
Bts WebSite

# Principales fonctions :
Les fonctions principales fonctionne via l'utilisation des classes suivante :

| Auth | EntityRepository | Database |
| :--- | :--- | :--- |
| Classe "herité" de Database | Classe "herité" de Database | Classe de gestion de la bdd |

## Auth

La classe Auth est appelé par `défaut` dans l'intégralité des page qui ont le fichier `head.php` d'inclus. 

Si `head.php` est inclus dans une page, la classe Auth est appelé automatiquement.

Pour l'utilisez de multiples fonctions sont rendu disponible :

### GetUser

> **Utilisations**
```php
$user = $auth->getUser();
var_dump($user);
```

> **Retour possible**
```php
object(User)[1]
  private 'id' => int 2
  private 'username' => string 'admin' (length=5)
  private 'email' => string 'admin@admin.fr' (length=14)
  private 'password' => string '$2y$10$qnaid1QJaQLZEY4aSgRhKuHGUebAaNIf/3xhyAFdWVBgvHza0JoJS' (length=60)
```

La classe User contient les informations de l'utilisateur connecté. Veuillez notez que les méthodes de la classe User sont public et vous pouvez donc modifié ces données à tout moment (exemple : changer le mot de passe).

> **Utilisations**
```php
$user = $auth->getUser();
$user->setPassword('newpassword');
```

## EntityRepository

La classe EntityRepository vous permet d'enregister des entités dans la base de données. (Classes : User, Manga, Artiste, Auteur, Avis, Commande, DetailCommande)

> Les classes sont des representation des tables de la base de données sous forme d'objet PHP.

> ### Methodes principales

### insert($class)

> **Utilisations**
```php
$em = new EntityRepository();
$user = new User();
$user->setUsername('test');
$user->setEmail('test@mail.com');
$user->setPassword('test');
$em->insert($user);
```

### select($class)

> **Utilisations**
```php
$em = new EntityRepository();
$user = $em->select(new User(2));
var_dump($user);
```

### delete($class)

> **Utilisations**
```php
$em = new EntityRepository();
$user = $em->select(new User(2));
$em->delete($user);
```

### update($class)

> **Utilisations**
```php
$em = new EntityRepository();
$user = $em->select(new User(2));
$user->setUsername('test');
$em->update($user);
```

## Database

Les méthodes de la classe Database sont appelées automatiquement par la classe EntityRepository ou par la classe Auth.

Exemple : 
```php
$em = new EntityRepository();
$users = $em->query('SELECT * FROM users');
var_dump($users);
```



### query($query, $params = [])

> **Utilisations**
```php
$db = new Database();
$users = $db->query('SELECT * FROM users');
var_dump($users);
```
### find($tablename, $id)

> **Utilisations**
```php
$db = new Database();
$user = $db->find('users', 2);
var_dump($user);
```
### findAll($tablename)

> **Utilisations**
```php
$db = new Database();
$users = $db->findAll('users');
var_dump($users);
```

### findBy($tablename, $params)

| Paramètre | Type | Description |
| :--- | :--- | :--- |
| $tablename | string | Nom de la table |
| $params | array | Tableau de paramètre |

> $params

| Paramètre | Type | Description |
| :--- | :--- | :--- |
| column | key(string)| Nom de la colonne |
| value | value (string) | Valeur de la colonne |

> **Utilisations**
```php
$db = new Database();
$users = $db->findBy("users",["username" => "garder500"]);
var_dump($users);
```

### findOneBy($tablename, $params)


| Paramètre | Type | Description |
| :--- | :--- | :--- |
| $tablename | string | Nom de la table |
| $params | array | Tableau de paramètre |

> $params

| Paramètre | Type | Description |
| :--- | :--- | :--- |
| column | key(string)| Nom de la colonne |
| value | value (string) | Valeur de la colonne |

> **Utilisations**
```php
$db = new Database();
$users = $db->findOneBy("users",["username" => "garder500"]);
var_dump($users);
```
