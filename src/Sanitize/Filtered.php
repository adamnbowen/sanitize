<?php
/**
 * Filtered provides magic methods to get/set arbitrary data in an object.
 * Returns a null value for any access to a key that doesn't exist.
 *
 * @author   Russell Stringer <r.stringer@gmail.com>
 * @author   Adam Bowen <adamnbowen@gmail.com>
 * @license  http://dbad-license.org/license DBAD license
 */

namespace Sanitize;

use IteratorAggregate,
    ArrayObject;

class Filtered implements IteratorAggregate
{
    /**
     * filtered the object accessed via __get() and __set()
     *
     * @var array
     */
    private $filtered = array();

    /**
     * getIterator allows us to use foreach on a Filtered object
     */
    public function getIterator()
    {
        $arrayObject = new ArrayObject($this->filtered);
        return $arrayObject->getIterator();
    }

    /**
     * __get If a nonexistent property of a Filtered object is called, this
     * function checks to see if the property corresponds to a key of
     * $this->filtered, and returns that, otherwise it returns null.
     *
     * @param  string $key a possible key to the $filtered array
     * @return mixed  null or the value of the existing key
     */
    public function __get($key)
    {
        if (array_key_exists($key, $this->filtered)
            && !empty($this->filtered[$key])
        ) {
            return $this->filtered[$key];
        } else {
            return null;
        }
    }

    /**
     * __set If a property of a Filtered object is set, this function sets the
     * appropriate key in the $filtered array, allowing it to be retrieved
     * later.
     *
     * @param  string $key   a new (or existing) key to the $filtered array
     * @param  mixed  $value the value to set the key of $filtered to
     * @return void
     */
    public function __set($key, $value)
    {
        $this->filtered[$key] = $value;
    }
}
