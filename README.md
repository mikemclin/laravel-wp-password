Laravel WP Password
===================

[![Build Status](https://img.shields.io/travis/mikemclin/laravel-wp-password/master.svg?style=flat-square)](https://travis-ci.org/mikemclin/laravel-wp-password)
[![Coverage Status](https://img.shields.io/coveralls/mikemclin/laravel-wp-password/master.svg?style=flat-square)](https://coveralls.io/r/mikemclin/laravel-wp-password?branch=master)

This Laravel 4 package provides an easy way to create and check against WordPress password hashes. WordPress is not required.


Installation
------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `mikemclin/wp-password`.

```json
"require": {
  "mikemclin/laravel-wp-password": "dev-master"
}
```


Next, update Composer from the Terminal:

```shell
composer update
```

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

```php
'MikeMcLin\WpPassword\WpPasswordServiceProvider'
```


Usage
-----

### Create Password Hash

Similar to the WordPress [`wp_hash_password()`](http://codex.wordpress.org/Function_Reference/wp_hash_password) function

```php
$hashed_password = WpPassword::make('plain-text-password');
```

### Check Password Hash

Similar to the WordPress [`wp_check_password()`](http://codex.wordpress.org/Function_Reference/wp_check_password) function

```php
$password = 'plain-text-password';
$wp_hashed_password = '$P$B7TRc6vrwCfjgKLZLgmN.dmPo6msZR.';

if ( WpPassword::check($password, $wp_hashed_password) ) {
    // Password success!
} else {
    // Password failed :(
}
```
