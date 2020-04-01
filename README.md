Laravel Extended Validator
==========================


[![Latest Stable Version](https://img.shields.io/github/v/release/krazydanny/laravel-validator?include_prereleases)](https://packagist.org/packages/krazydanny/laravel-validator) [![Donate](https://img.shields.io/badge/donate-paypal-blue.svg)](https://paypal.me/danielspadafora) [![License](https://img.shields.io/github/license/krazydanny/laravel-validator)](https://github.com/krazydanny/laravel-validator/blob/master/LICENSE)

This package provides an Extended Laravel Validator with many useful additional rules!


- [Laravel Excended Validator](#laravel-extended-validator)
	- [Main Advantages](#main-advantages)
		- [Time-Saving](#time-saving)	
		- [Exclusive validation rules](#exclusive-validation-rules)
	- [Installation](#installation)
		- [Laravel version Compatibility](#laravel-version-compatibility)
		- [Lumen version Compatibility](#lumen-version-compatibility)
		- [Install the package via Composer](#install-the-package-via-composer)
	- [Usage](#usage)
	- [Rules](#rules)
	- [It is ours!](#it-is-ours!)



Main Advantages
---------------


### Time-Saving

Extends Laravel's great built-in validator with commonly used validation rules avoiding you to search the internet for "the golden regex" and extending validator yourself :)

Just register the service provider and rules are ready to use!


### Excusive validation rules

Some unlikely-to-find validation rules available for you.


Installation
------------

The only requirement is to have a Laravel or Lumen project. I asume your are already familiar with one of them, otherwise here are some docs about this great framework:

- Laravel -> https://laravel.com
- Lumen -> https://lumen.laravel.com


### Laravel version Compatibility

 Laravel  | Package
:---------|:----------
 5.6.x    | 0.9-beta
 5.7.x    | 0.9-beta
 5.8.x    | 0.9-beta
 6.x      | 0.9-beta
 7.x      | 0.9-beta


### Lumen version Compatibility

 Lumen    | Package
:---------|:----------
 5.6.x    | 0.9-beta
 5.7.x    | 0.9-beta
 5.8.x    | 0.9-beta
 6.x      | 0.9-beta



### Install the package via Composer

```bash
$ composer require krazydanny/laravel-validator:v0.9-beta
```

Usage
-----

We only have to register the service provider in our project and all available rules are ready to use :)


```php
$app->register( KrazyDanny\Laravel\Validation\ServiceProvider::class
);

```

For example:

```php
$myValidator = Validator::make(
	$values,
	[
		'lat' => 'latitude',
		'lng' => 'longitude',
		'mac' => 'mac_address',
	],
	$messages
);
```

Rules
-----

Here's a list of all available validation rules:


- [float](#float)
- [boolean_strict](#boolean_strict)
- [document_number](#document_number)
- [latitude](#latitude)
- [longitude](#longitude)
- [mac_address](#mac_address)
- [owasp_password](#password)
- [color_hex](#color_hex)
- [date_diff_min](#date_diff_min)
- [date_diff_max](#date_diff_max)
- [snake_case](#snake_case)
- [camel_case](#camel_case)
- [pascal_case](#pascal_case)
- [kebab_case](#kebab_case)


### float

Checks if value is a floating point number. With the 'strict' parameter also checks the data type.

Synthax:

*'float'*
*'float:strict'*

MATCH examples:

0
100
0.00
0.01
100.00
100.01
'0'
'100'
'0.00'
'0.01'
'100.00'
'100.01'

NO MATCH examples:

'0,00'
'100,00'


### document_number

Checks if value is a floating point number. With the 'strict' parameter also checks the data type.

Synthax:

*'float'*
*'float:strict'*
