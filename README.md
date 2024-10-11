# Yielder for PHP

> A similar alternative to match in PHP for arrays, with a touch of zest.

Extracting values and keys from an array with some variations in functionality.

## 🫡 Usage

### 🚀 Installation

You can install the package via composer:

```bash
composer require nabeghe/matcher
```

### Example 1: Value

Similar to match in PHP 8.

```php
use \Nabeghe\Matcher\Matcher;

$matched_value = Matcher::value([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'key5' => 'value 5',
], 'key5');

echo $matched_value; // value 5
```

### Example 2: Default Value

Similar to match in PHP 8, with a default value in case the key doesn't exist.

```php
use \Nabeghe\Matcher\Matcher;

$matched_value = Matcher::value([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'key5' => 'value 5',
], 'key', 'value not found');

echo $matched_value; // value not found
```

### Example 3: Callable Value

Similar to match in PHP 8, with the possibility of the value being callable.

```php
$matched_value = Matcher::value([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'key5' => function ($key) {
        return 'value 5';
    },
], 'key5', null, true);

echo $matched_value; // value 5
```

### Example 4: Key

Finding a key based on a value.

```php
use \Nabeghe\Matcher\Matcher;

$matched_value = Matcher::key([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'key5' => 'value 5',
], 'value 5');

echo $matched_value; // key5
```

### Example 5: Keys By Value

Finding a set of keys based on a specific value.

```php
use \Nabeghe\Matcher\Matcher;

$matched_value = Matcher::keys([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'keys1' => 'value x',
    'keys2' => 'value x',
], 'value x');

print_r($matched_value); // keys1, keys2
```

### Example 6: Keys By Values

Finding a set of keys based on a a set of values.

```php
use \Nabeghe\Matcher\Matcher;

$matched_value = Matcher::keys([
    'key1' => 'value 1',
    'key2' => 'value 2',
    'key3' => 'value 3',
    'key4' => 'value 4',
    'key5' => 'value 5',
], ['value 1', 'value 5']);

print_r($matched_value); // key1, key5
```

## 📖 License

Copyright (c) 2024 Hadi Akbarzadeh

Licensed under the MIT license, see [LICENSE.md](LICENSE.md) for details.