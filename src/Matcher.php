<?php namespace Nabeghe\Matcher;

/**
 * An alternative for php match!
 */
class Matcher
{
    /**
     * Retrieves a value from an array using its key,
     * with the option to set a default value if the key doesn't exist,
     * and support for the value being callable.
     * @param  array  $data  The array.
     * @param  mixed  $key  The key.
     * @param  mixed  $default  Optional. Default value if the key does not exist.. Default null.
     * @param  bool  $callable  Optional. Should the value be checked as callable? Default false.
     * @return mixed|null The final value of the key.
     */
    public static function value(array $data, $key, $default = null, bool $callable = false)
    {
        $matched_value = array_key_exists($key, $data) ? $data[$key] : $default;
        return $callable && is_callable($matched_value) ? $matched_value($key) : $matched_value;
    }

    /**
     * Retrieves a key from an array using its value,
     * @param  array  $data  The array.
     * @param  mixed  $value  The value.
     * @param  mixed  $default  Optional. Default key if the value isn't found.
     * @return mixed The final key of the value.
     */
    public static function key(array $data, $value, $default = null)
    {
        foreach ($data as $key => $data_value) {
            if ($value == $data_value) {
                return $key;
            }
        }
        return $default;
    }

    /**
     * Retrieves a set of values from an array using their keys,
     * @param  array  $data  The array.
     * @param  array  $keys  The keys.
     * @param  array|null  $default  Optional. Default values if no key exists.
     * @param  bool  $callable  Optional. Should the value be checked as callable? Default false.
     * @return array|null The final values of the keys.
     */
    public static function values(array $data, array $keys, ?array $default = null, bool $callable = false)
    {
        $values = [];
        foreach ($keys as $key) {
            if (array_key_exists($key, $data)) {
                $values[] = $callable && is_callable($data[$key]) ? $data[$key]($key) : $data[$key];
            }
        }
        if (!$values) {
            return $default;
        }
        return $values;
    }

    /**
     * Retrieves a set of keys from an array using a value or a set of values,
     * @param  array  $data The array.
     * @param  mixed  $value The value or values.
     * @param ?array  $default Optional. Default keys if the value isn't found.
     * @return array The final keys of the value or values.
     */
    public static function keys(array $data, $value, ?array $default = null)
    {
        $keys = [];
        if (is_array($value)) {
            foreach ($data as $key => $data_value) {
                if (in_array($data_value, $value)) {
                    $keys[] = $key;
                }
            }
        } else {
            foreach ($data as $key => $data_value) {
                if ($value == $data_value) {
                    $keys[] = $key;
                }
            }
        }
        if (!$keys) {
            return $default;
        }
        return $keys;
    }
}