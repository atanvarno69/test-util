<?php
/**
 * @package   Atanvarno\PHPUnit
 * @author    atanvarno69 <https://github.com/atanvarno69>
 * @copyright 2017 atanvarno.com
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Atanvarno\PHPUnit;

/** SPL use block. */
use InvalidArgumentException, ReflectionClass;

/**
 * Atanvarno\PHPUnit\SetProtectedPropertyTrait
 *
 * Provides means to set a protected or private property of an object for test
 * purposes.
 *
 * @api
 */
trait SetProtectedPropertyTrait
{
    /** Trait use block. */
    use ErrorMessageTrait;

    /**
     * Sets a protected or private property.
     *
     * @param object $object   The instance containing the property to set.
     * @param string $property The property name.
     * @param mixed  $value    The value to set.
     *
     * @throws InvalidArgumentException Non-object passed as first parameter.
     *
     * @return void
     */
    public function setProtectedProperty(
        $object,
        string $property,
        $value
    ) {
        if (!is_object($object)) {
            $msg = $this->getErrorMessage(1, __METHOD__, $object);
            throw new InvalidArgumentException($msg);
        }
        $class = new ReflectionClass($object);
        $property = $class->getProperty($property);
        $property->setAccessible(true);
        $property->setValue($object, $value);;
    }
}
