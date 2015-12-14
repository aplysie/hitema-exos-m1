<?php

namespace Router;

/**
 * Class Route
 *
 * @package Router
 */
class Route
{
    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var array
     */
    protected $defaults = array();

    /**
     * Route constructor.
     */
    public function __construct($pattern, $defaults = array())
    {
        $this->pattern = $pattern;
        $this->defaults = $defaults;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * @return array
     */
    public function getDefaults()
    {
        return $this->defaults;
    }

    /**
     * @param array $defaults
     */
    public function setDefaults($defaults)
    {
        $this->defaults = $defaults;
    }

    /**
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getDefault($key, $default = null)
    {
        if (!array_key_exists($key, $this->defaults)) {
            return $default;
        }

        return $this->defaults[$key];
    }
}
