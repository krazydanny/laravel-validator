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

Some hard-to-find validation rules available for you as if they where included in Laravel.


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
$app->register( KrazyDanny\Laravel\Validation\ServiceProvider::class );

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

- [boolean_strict](#boolean_strict)
- [camel_case](#camel_case)
- [color_hex](#color_hex)
- [date_gt_max](#date_gt_max)
- [date_gt_min](#date_gt_min)
- [date_lt_max](#date_lt_max)
- [date_lt_min](#date_lt_min)
- [document_number](#document_number)
- [float](#float)
- [kebab_case](#kebab_case)
- [latitude](#latitude)
- [longitude](#longitude)
- [mac_address](#mac_address)
- [owasp_password](#password)
- [pascal_case](#pascal_case)
- [snake_case](#snake_case)


### boolean_strict

Checks if value's data type is strictly bool.

Synthax:

*boolean_strict*

```php
$myValidator = Validator::make(
	$values,
	[
		'active' => 'boolean_strict',
	],
	[
		'active.boolean_strict' => 'Some message',
	]
);
```

MATCH examples:

```php
true
false

```


NO MATCH examples:

```php
1
0
'true'
'false'
```

### camel_case

Checks if a string's format matches the camelCase notation.

Synthax:

*camel_case*

```php
$myValidator = Validator::make(
	$values,
	[
		'var_name' => 'camel_case',
	],
	[
		'var_name.camel_case' => 'Some message',
	]
);
```

MATCH examples:

```php
'camel',
'camelCase'
'camelCaseNotation'

```


NO MATCH examples:

```php
'Camel',
'CamelCase',
'camelcase',

```


### color_hex

Checks if a string represents a hexadecimal color code.

Synthax:

*color_hex*

```php
$myValidator = Validator::make(
	$values,
	[
		'color'  => 'color_hex',
		'colors' => 'color_hex', // also works with an array of values
	],
	[
		'color.color_hex' => 'Some message',
	]
);
```

MATCH examples:

```php
'#FFFFFF'
'#FF3333'
'#ffffff'
'#5AD66A'

```


NO MATCH examples:

```php
'FFFFFF'
'#FF33'
'#FF3333A'
'#'

```


### date_gt_min

Checks if a date (value) is greater than another date (first parameter) at least by the given seconds (second parameter).

Third parameter (optional) could be date's (value) format.

Synthax:

*date_gt_min:lower_date,diff_in_seconds,format*

```php
$myValidator = Validator::make(
	$values,
	[
		'start_at' => 'date_gt_min:2020-03-01 00:00:00,86400',
	],
	[
		'start_at.date_gt_min' => 'Some message',
	]
);
```


### date_gt_max

Checks if a date (value) is greater than another date (first parameter) by the given seconds as much (second parameter).

Third parameter (optional) could be date's (value) format.

Synthax:

*date_gt_max:lower_date,diff_in_seconds,format*

```php
$myValidator = Validator::make(
	$values,
	[
		'start_at' => 'date_gt_max:2020-03-01 00:00:00,86400',
	],
	[
		'start_at.date_gt_max' => 'Some message',
	]
);
```


### date_lt_min

Checks if a date (value) is lower than another date (first parameter) at least by the given seconds (second parameter).

Third parameter (optional) could be date's (value) format.

Synthax:

*date_lt_min:greater_date,diff_in_seconds,format*

```php
$myValidator = Validator::make(
	$values,
	[
		'start_at' => 'date_lt_min:2020-03-01 00:00:00,86400',
	],
	[
		'start_at.date_lt_min' => 'Some message',
	]
);
```


### date_lt_max

Checks if a date (value) is lower than another date (first parameter) by the given seconds as much (second parameter).

Third parameter (optional) could be date's (value) format.

Synthax:

*date_lt_max:greater_date,diff_in_seconds,format*

```php
$myValidator = Validator::make(
	$values,
	[
		'start_at' => 'date_lt_max:2020-03-01 00:00:00,86400',
	],
	[
		'start_at.date_lt_max' => 'Some message',
	]
);
```

### document_number

Checks if value is a valid reference number for any kind of document or paper.

Synthax:

```php
$myValidator = Validator::make(
	$values,
	[
		'id_doc' 	   => 'document_number',
		'license_num'  => 'document_number',
		'passport_num' => 'document_number',
	],
	[
		'passport_num.document_number' => 'Some message',
	]
);
```

MATCH examples:

```php
'0'
'100'
'0.00'
'0.01'
'100.00'
'100.01'

```


NO MATCH examples:

```php
'0'
'100'
'0.00'
'0.01'
'100.00'
'100.01'

```


### float

Checks if value is a floating point number. With the 'strict' parameter also checks the data type.

Synthax:

```php
$myValidator = Validator::make(
	$values,
	[
		'price' => 'float',
		'rate'  => 'float:strict',
	],
	[
		'price.float' => 'Some message',
		'rate.float'  => 'Some message',
	]
);
```

MATCH examples:

```php
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

```


NO MATCH examples:

```php
'0,00'
'100,00'

```
