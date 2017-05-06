<?php
/**
 * @package   Atanvarno\PHPUnit
 * @author    atanvarno69 <https://github.com/atanvarno69>
 * @copyright 2017 atanvarno.com
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Atanvarno\PHPUnit;

/**
 * Atanvarno\PHPUnit\ErrorMessageTrait
 *
 * Provides error messages for other traits.
 *
 * @internal
 */
trait ErrorMessageTrait
{
    private function getErrorMessage(
        int $argumentOffset,
        string $methodName,
        $actual
    ): string {
        return sprintf(
            'Argument %u passed to %s  must be of the type object, %s given',
            $argumentOffset,
            $methodName,
            gettype($actual)
        );
    }
}
