# Atanvarno\PHPUnit
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](https://github.com/atanvarno69/test-util/blob/master/LICENSE)
[![Latest Version](https://img.shields.io/github/release/atanvarno69/test-util.svg?style=flat-square)](https://github.com/atanvarno69/test-util/releases)

Utility traits for [PHPUnit](https://phpunit.de/) test cases for interacting 
with protected and private methods and properties.

## Requirements
**PHP >= 7.0** is required, but the latest stable version of PHP is recommended.

## Installation
```bash
$ composer require atanvarno/test-util:^1.0.0
```

## Basic Usage
```php
class YourTest extends \PHPUnit\Framework\TestCase
{
    // Include the traits
    use Atanvarno\PHPUnit\{CallProtectedMethodTrait, SetProtectedPropertyTrait};
    
    // Write your tests
    public function testYourMethod()
    {
        $testObject = new SomeClass();
        
        // Set an inaccessible property
        $this->setProtectedProperty($testObject, 'propertyName', 'value');
        
        // Call an inaccessible method
        $result = $this->callProtectedMethod(
            $testObject,
            'methodName',
            ['argument 1', 'argument 2', '...']
        );
        
        // Do your assertations
        // ...
    }
}
```

## Atanvarno\PHPUnit\CallProtectedMethodTrait
Provides means to call a protected or private method of an object for test 
purposes.

```php
public function callProtectedMethod($object, string $method, array $arguments = [])
```

Calls a protected or private method and returns its result.

### Parameters
* `object` **$object**

  Required. The instance containing the method to call.
  
* `string` **$method**

  Required. The method name.
  
* `mixed[]` **$arguments**

  Optional. Defaults to `[]`. Arguments to pass to the method.

### Throws
* [`InvalidArgumentException`](http://php.net/manual/en/class.invalidargumentexception.php)

  Non-object passed as first parameter.

### Returns
* `mixed`

  The return value of the method call.

## Atanvarno\PHPUnit\SetProtectedPropertyTrait
Provides means to set a protected or private property of an object for test 
purposes.

```php
public function setProtectedProperty($object, string $property, $value)
```

Sets a protected or private property.

### Parameters
* `object` **$object**

  Required. The instance containing the property to set.
  
* `string` **$property**

  Required. The property name.
  
* `mixed` **$value**

  Required. The value to set.

### Throws
* [`InvalidArgumentException`](http://php.net/manual/en/class.invalidargumentexception.php)

  Non-object passed as first parameter.

### Returns
* `void`
