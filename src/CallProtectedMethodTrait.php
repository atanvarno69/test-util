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
 * Atanvarno\PHPUnit\CallProtectedMethodTrait
 *
 * Provides means to call a protected or private method of an object for test
 * purposes.
 */
trait CallProtectedMethodTrait
{
    /** Trait use block. */
    use ErrorMessageTrait;

    /**
     * Calls a protected or private method and returns its result.
     *
     * @param object $object    The instance containing the method to call.
     * @param string $method    The method name.
     * @param array  $arguments Arguments to pass to the method.
     *
     * @throws InvalidArgumentException Non-object passed as first parameter.
     *
     * @return mixed The return value of the method call.
     */
    public function callProtectedMethod(
        $object,
        string $method,
        array $arguments = []
    ) {
        if (!is_object($object)) {
            $msg = $this->getErrorMessage(1, __METHOD__, $object);
            throw new InvalidArgumentException($msg);
        }
        $class = new ReflectionClass($object);
        $method = $class->getMethod($method);
        $method->setAccessible(true);
        return $method->invokeArgs($object, $arguments);
    }
}
