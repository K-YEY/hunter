<?php

if (!function_exists('trimName')) {
    /**
     * Extract the first or second part of a name based on the $isFirst flag.
     *
     * @param  string  $name
     * @param  bool  $isFirst
     * @return string
     */
    function trimName($name, $isFirst = true)
    {
        // Split the name by spaces
        $parts = explode(' ', $name);

        // Return the appropriate part, or an empty string if the part doesn't exist
        return isset($parts[$isFirst ? 0 : 1]) ? $parts[$isFirst ? 0 : 1] : '';
    }
}