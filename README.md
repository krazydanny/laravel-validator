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


<br>

Main Advantages
---------------


### Time-Saving

Extends Laravel's great built-in validator with commonly used validation rules avoiding you to search the internet for "the golden regex" and extending validator yourself :)

Just register the service provider and rules are ready to use!


### Excusive validation rules

Some hard-to-find validation rules available for you as if they where included in Laravel.

<br>

Installation
------------

The only requirement is to have a Laravel or Lumen project. I asume your are already familiar with one of them, otherwise here are some docs about this great framework:

- Laravel -> https://laravel.com
- Lumen   -> https://lumen.laravel.com


### Laravel version Compatibility

 Laravel  | Package
:---------|:----------
 5.6.x    | 0.9.2-beta
 5.7.x    | 0.9.2-beta
 5.8.x    | 0.9.2-beta
 6.x      | 0.9.2-beta
 7.x      | 0.9.2-beta


### Lumen version Compatibility

 Lumen    | Package
:---------|:----------
 5.6.x    | 0.9.2-beta
 5.7.x    | 0.9.2-beta
 5.8.x    | 0.9.2-beta
 6.x      | 0.9.2-beta
 7.x      | 0.9.2-beta



### Install the package via Composer

```bash
$ composer require krazydanny/laravel-validator:^0.9.2-beta
```
<br>

Usage
-----

We only have to register the service provider in our project and all new rules are ready to use :)


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

<br>

Rules
-----

Here's a list of all available validation rules:

- [alpha_blank](#alpha_blank)
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

Checks if value is a string formatted using camelCase notation.

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
'camelCaseN'
'camelCaseNotation'

```


NO MATCH examples:

```php
'Camel',
'CamelCase',
'camelcase',
'NCamelCase'

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
		'id_doc'       => 'document_number',
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
'123123123123'
'abcabcabcabc'
'a1b2c3d4e5f6'
'20-30764053-0'
'20/30764053/0'
'20 30764053 0'
'20/3076 405-30'
'20/3076.405-30'
'a1-b2c3d4e5f-6'

```


NO MATCH examples:

```php
'20--30764053-0'
'20//30764053/0'
'20  30764053 0'
'20/3076..405-30'
'N° 23123123312'
'n° 23123123312'
'n°23123123312'

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


### kebab_case

Checks if value is a string formatted using kebab-case notation.

Synthax:

*kebab_case*

```php
$myValidator = Validator::make(
	$values,
	[
		'category' => 'kebab_case',
	],
	[
		'category.kebab_case' => 'Some message',
	]
);
```

MATCH examples:

```php
'kebabcase',
'kebab-case'
'kebab-case-notation'

```


NO MATCH examples:

```php
'kebabCase',
'kebab-Case',
'Kebab-case',

```

### latitude

Checks if value is valid latitude (between 90 and -90 degrees).

Synthax:

*latitude*

```php
$myValidator = Validator::make(
	$values,
	[
		'lat' => 'latitude',
	],
	[
		'lat.latitude' => 'Some message',
	]
);
```

MATCH examples:

```php
1
90
-90
1.00,
30.010203
-67.50685
90.000000
-80.9999900000999

```


NO MATCH examples:

```php
91
-91
-100
180.00
90.00000000000001
-90.00000000000001
```

### longitude

Checks if value is valid longitude (between 180 and -180 degrees).

Synthax:

*longitude*

```php
$myValidator = Validator::make(
	$values,
	[
		'lng' => 'longitude',
	],
	[
		'lng.longitude' => 'Some message',
	]
);
```

MATCH examples:

```php
1
-180
180.00,
30.010203
-67.50685
90.000000
-179.9999900000999

```


NO MATCH examples:

```php
181
-181
188.99
200.000
180.00000000000001
-180.00000000000001

```


### mac_address

Checks if value is a valid IEEE 802 MAC Address.

Synthax:

*mac_address*

```php
$myValidator = Validator::make(
	$values,
	[
		'mac_addr' => 'mac_address',
	],
	[
		'mac_addr.mac_address' => 'Some message',
	]
);
```

MATCH examples:

```php
'00:00:00:00:00:00'
'EE:EE:EE:EE:EE:EE'
'A1:01:A2:02:A3:03'

```


NO MATCH examples:

```php
000000000000
'A1:01:A2:02'
'A1.01.A2.02.A3.03'
'A1 01 A2 02 A3 03'
'A1:01:A2:02:A3:03:'

```


### pascal_case

Checks if value is a string formatted using PascalCase notation.

Synthax:

*pascal_case*

```php
$myValidator = Validator::make(
	$values,
	[
		'class_name' => 'pascal_case',
	],
	[
		'class_name.pascal_case' => 'Some message',
	]
);
```

MATCH examples:

```php
'Pascal'
'Pascalcase'
'PascalCase'
'PascalCaseN'
'PascalCaseNotation'

```


NO MATCH examples:

```php
'pascal'
'pascalCase'
'pascalcase'
'nPascalCase'

```


### snake_case

Checks if value is a string formatted using camelCase notation.

Synthax:

*snake_case*

```php
$myValidator = Validator::make(
	$values,
	[
		'param_name' => 'snake_case',
	],
	[
		'param_name.snake_case' => 'Some message',
	]
);
```

MATCH examples:

```php
'snakecase'
'snake_case'
'snake_case_n'
'n_snake_case'
'snake_case_notation'

```


NO MATCH examples:

```php
'Snake_case'
'snake_Case'
'snake_CaseNotation'
'N_snake_case'
'snake_caseN'
'snake_case_N'

