#Jmoati/HelperBundle

## Intro to JmoatiHelperBundle

The Bundle gives classes Command and Controller inherit to have aliases accelerating development.  
It also gives Traits and entities to simply define your own entities.

## Installation and configuration:

### Get the bundle

Add to your `jmoati-helper-bundle` to your dependencies:

``` json
{
    "require": {
        ...
        "jmoati/helper-bundle": "0.0.*"
    }
    ...
}
```

To install, run `php composer.phar update jmoati/helper-bundle`.

### Add JmoatiHelperBundle to your application kernel

``` php
<?php

    // app/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Jmoati\HelperBundle\JmoatiHelperBundle(),
            // ...
        );
    }
```

## Score:


[![SensioLabsInsight](https://insight.sensiolabs.com/projects/af96999a-5fa7-48c2-a296-39fc0b343fb1/big.png)](https://insight.sensiolabs.com/projects/af96999a-5fa7-48c2-a296-39fc0b343fb1)
