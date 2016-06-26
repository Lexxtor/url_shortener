URL shortener
============================


REQUIREMENTS
------------

The minimum requirement is PHP 5.4.0 and MySql + Apache or Nginx.


INSTALLATION
------------

Create MySql database.

In some directory, do: `git clone git@github.com:Lexxtor/url_shortener.git .`
Make `web` directory accessible via http. 

### Install with Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

Install the project dependences using the following command:

~~~
php composer.phar update
~~~

Grand write access to web server for these dirs:
`runtime`
`web/assets`


CONFIGURATION
-------------

### Database

Rename `config/db.php.distr` to `config/db.php` and edit it with real data.

Run command `./yii  migrate --interactive=0`