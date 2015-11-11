Laravel ViewCounter
===================

A view and like counter extension for your laravel project. It uses session storage if the user is not logged in and keeps it clean while the session is active (no double likes or views).
If a user is logged in, the information about hthe likes and views are stored into the database for getting history.


Installation
------------

Install using composer:

```json
composer require fraank/view-counter
```
While the package is not stable, please make sure you added it as dev: Open "composer.json" manually and add "fraank/view-counter": "dev-master" into require. 

Add the service provider in `app/config/app.php`:

```php
Fraank\ViewCounter\ViewCounterServiceProvider::class,
```

The service provider will register an interface for your models to use view_counter and like_couter functionality.


To create the basic tables you have to provide the migation files:

```json
php artisan vendor:publish
```

Now you can migrate:

```json
php artisan migrate
```


Now you can register the like and view functionality in your model:

```php
class Object extends Eloquent {
  use Fraank\ViewCounter\ViewCounterTrait;
}
```

You can call the actions for like and unlike in your views (or controllers) like this:

```php
{{ route('view_counter.like', array('class_name' => 'post', 'object_id' => $post->id)) }}
{{ route('view_counter.unlike', array('class_name' => 'post', 'object_id' => $post->id)) }}
```


Examples
--------

### Basic Usage

**Increment a ViewCounter in a Controller (show action)

```php
$object->view();
```

**Get count of Views

```php
$object->views_count();
```

**Did the user viewed the object?

```php
$object->isViewed();
```


**Increment the LikeCounter in a Controller (show action)
```php
$object->like();
```

**Unlike
```php
$object->unlike();
```

**Get count of Likes

```php
$object->likes_count();
```

**Did the user liked the object?

```php
$object->isLiked();
```
