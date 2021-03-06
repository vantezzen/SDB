<p align="center">
    <img src="logo.png">
    <a href="https://packagist.org/packages/vowserdb/vowserdb">
        <img src="https://api.travis-ci.org/vantezzen/vowserdb.svg?branch=master" alt="Build status">
    </a>
    <a href="https://packagist.org/packages/vowserdb/vowserdb">
        <img src="https://poser.pugx.org/vowserdb/vowserdb/v/stable.svg" alt="Stable version">
    </a>
    <a href="https://packagist.org/packages/vowserdb/vowserdb">
        <img src="https://poser.pugx.org/vowserdb/vowserdb/v/unstable.svg" alt="Unstable version">
    </a>
    <a href="https://packagist.org/packages/vowserdb/vowserdb">
        <img src="https://poser.pugx.org/vowserdb/vowserdb/license.svg" alt="License">
    </a>
</p>

# vowserDB
vowserDB allows you to use csv files as a standalone database for PHP with SQL-like commands.

It is written purely in PHP without any dependencies.

# Installation
vowserDB can be installed via composer by running
```php
composer require vowserdb/vowserdb
```

# Basic usage
```php
<?php
use vowserDB\Table;

// Use table 'users' with sepecified columns
$table = new Table('users', ['username', 'password', 'mail']);

// Insert new user into table
$table->insert([
    'username' => 'testuser',
    'password' => '1234',
    'mail' => 'mail@example.com'
]);

// Save changes to table file
$table->save();

// Select row from the table and update the password of the selected rows
$table
    ->select(['username' => 'testuser'])
    ->update(['password' => '5678'])
    ->save();

// Get selected rows
$rows = $table->selected();
```

# Documentation
The documentation can be found at [https://vantezzen.github.io/vowserdb](https://vantezzen.github.io/vowserdb). It can also be viewed from `docs/index.html` when cloning the repository or by opening `docs/Home.md`. 
The documentation is powered by [Flatdoc](http://ricostacruz.com/flatdoc).

# Bugs and feature requests
Bugs and feature request are tracked on [GitHub](https://github.com/vantezzen/vowserdb/issues).

# Licence
vowserDB is licensed under the MIT License - see the `LICENSE` file for details.

# Acknowledgements
This library is heavily inspired by Laravels Eloquent syntax.

# Unit Test
Unit tests can be executed via `composer test`.
