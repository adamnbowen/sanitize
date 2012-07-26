<?php
/**
 * Sanitize A class for sanitizing arrays and objects, with the additional
 * feature of returning null for nonexistent properties.
 *
 * @author   Adam Bowen <adamnbowen@gmail.com>
 * @author   Russell Stringer <r.stringer@gmail.com>
 * @license  http://dbad-license.org/license DBAD license
 */

namespace Sanitize;

use Sanitize\Filtered;

class Sanitize
{
    /**
     * Clean Sanitize the keys and values of the $unclean object/array
     *
     * @param  mixed    $unclean an array or object to clean
     * @return Filtered object containing the sanitized values
     */
    public static function clean($unclean)
    {
        $filtered = new Filtered();
        foreach ($unclean as $key => $value) {
            $sanitizedKey = self::sanitize($key);
            $sanitizedValue = self::sanitize($value);
            $filtered->$sanitizedKey = $sanitizedValue;
        }

        return $filtered;
    }

    /**
     * sanitize Sanitize the given $input.
     *
     * Sends all inputs to fixIncompleteObject() to ensure there are no broken
     * objects, then if $input is an object or an array, it cleans $input
     * recursively.  If $input is a boolean, it is simply returned.  If $input
     * is a string, it is simply cleaned and returned.
     *
     * @param  mixed $input the value to be sanitized
     * @return mixed Either a simple cleaned string or a cleaned array.
     */
    private static function sanitize($input)
    {
        $input = self::fixIncompleteObject($input);

        if (is_array($input) || is_object($input)) {
            $output = array();
            foreach ($input as $key => $value) {
                $output[$key] = self::sanitize($value);
            }

            return $output;
        }
        if (is_bool($input)) {
            return $input;
        }

        return stripslashes(htmlentities(strip_tags(trim($input))));
    }

    /**
     * fixIncompleteObject repairs an object if it is incomplete.
     *
     * Removes the __PHP_Incomplete_Class crap from the object, so is_object()
     * will correctly identify $input as an object. Nothing will happen if
     * $input is not an object at all.
     *
     * @param  mixed  $input The "broken" object
     * @return object The "fixed" object
     */
    private static function fixIncompleteObject($input)
    {
        if (!is_object($input) && gettype($input) == 'object') {
            return unserialize(serialize($input));
        }

        return $input;
    }
}
