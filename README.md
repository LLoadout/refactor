<p align="center">
    <img src="https://github.com/LLoadout/assets/blob/master/LLoadout_refactor.png" width="500" title="LLoadout logo">
</p>

# LLoadout

LLoadout is your loadout for Laravel. It helps you with tips , code examples and packages to make you a better Laravel developer.

## LLoadout Refactoring

This repo is an example code base for refactorings I want to show you. Examples from real world projects.  
It's the source code of https://refactor.lloadout.com.

It's the companion code for the LLoadout Youtube refactoring channel ( work in progress )

## How it works

Each class has a original and refactor method that does the magic

<img src="https://refactor.lloadout.com/img/example.png">

## Contributing

You can fork this repository and contribute to it by submitting a pull request. There is a command included to create your own refactor class.

```shell
php artisan refactor:make YourRefactorClass
```

The refactor is completely self contained, this means that you only have to make the refactor class itself the visualisation is done by the refactor site itself. Documentation is provided in the generated class.

Each class has this obligatory params , title and description

```php

   public $title       = "Provide a title - shown on the homepage";
   public $description = "Provide a description - shown on the homepage";
    
```

There are some optional properties 

requires : the requirements for the code to work 
doc : a link to the documentation
icon : the link to an icon
querystring : query params that can be send to use in your refactor

```php
   public $requires    = ['php >= 7.0.0'];
   public $doc         = "https://www.php.net";
   public $icon        = "https://laravel.com/img/favicon/favicon.ico";
   public $querystring = "?key=value";
```
