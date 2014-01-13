This Laravel 4 package provides an easy way to create and check against WordPress password hashes.


Installation
------------

Begin by installing this package through Composer. Edit your project's `composer.json` file to require `mikemclin/wp-password`.

```json
"require": {
  "laravel/framework": "4.1.*",
  "mikemclin/wp-password": "dev-master"
},
"minimum-stability" : "dev"
```


Next, update Composer from the Terminal:

```shell
composer update
```

Once this operation completes, the final step is to add the service provider. Open `app/config/app.php`, and add a new item to the providers array.

    'MikeMcLin\WpPassword\WpPasswordServiceProvider'


Usage
-----

### Create Password Hash

```php
$hashed_password = WpPassword::createHash('plain-text-password');
```

### Check Password Hash

```php
$password = 'plain-text-password';
$wp_hashed_password = '$P$B7TRc6vrwCfjgKLZLgmN.dmPo6msZR.';

if ( WpPassword::checkPassword($password, $wp_hashed_password) ) {
    // Password success!
} else {
    // Password failed :(
}
```