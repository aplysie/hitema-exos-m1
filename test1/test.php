<?php

class MyConfig
{
    /**
     * @var array
     */
    private $parameters = array();

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;
    }

    /**
     * @param string $key
     * @param mixed  $default - A default value when key is not set
     */
    public function getParameter($key, $default = null)
    {
        if (!array_key_exists($key, $this->parameters)) {
	    return $default;
        }

        return $this->parameters[$key];
    }
}

class ConfigLoader
{
    /**
     * @var MyConfig
     */
    private $config;

    /**
     * @var FileLoaderInterface
     */
    private $loader;

    /**
     * ConfigLoader constructor.
     *
     * @param MyConfig            $config
     * @param FileLoaderInterface $loader
     */
    public function __construct(MyConfig $config, FileLoaderInterface $loader)
    {
        $this->loader = $loader;
        $this->config = $config;
    }

    /**
     * @param string $resource
     */
    public function load($resource)
    {
        $this->config->setParameters($this->loader->load($resource));
    }
}

class ConfigDumper
{
    /**
     * @var FileDumperInterface
     */
    private $dumper;

    /**
     * @var MyConfig
     */
    private $config;

    /**
     * ConfigDumper constructor.
     *
     * @param FileDumperInterface $dumper
     */
    public function __construct(MyConfig $config, FileDumperInterface $dumper)
    {
        $this->dumper = $dumper;
        $this->config = $config;
    }

    /**
     * @param string $resource
     */
    public function dump($resource)
    {
        $this->dumper->dump($resource, $this->config->getParameters());
    }
}

interface FileLoaderInterface
{
    /**
     * @param string $resource
     *
     * @return array
     */
    public function load($resource);
}

/**
 * Interface FileDumperInterface
 *
 */
interface FileDumperInterface
{
    public function dump($resource, $parameters);
}

/**
 * Class CustomFileLoader
 *
 */
class JsonFileLoader implements FileLoaderInterface
{
    /**
     * @param string $resource
     *
     * @return array
     */
    public function load($resource)
    {
        $data = file_get_contents($resource);

        $parameters = json_decode($data, true);

        return $parameters;
    }
}

class JsonFileDumper implements FileDumperInterface
{
    /**
     * @param string $resource
     * @param array  $data
     */
    public function dump($resource, $data)
    {
        $json = json_encode($data);

        file_put_contents($resource, $json);
    }
}

$myConfig = new MyConfig();

$jsonLoader = new JsonFileLoader();
$jsonDumper = new JsonFileDumper();
$configLoader = new ConfigLoader($myConfig, $jsonLoader);
$configDumper = new ConfigDumper($myConfig, $jsonDumper);

echo "Before loading config from file." . PHP_EOL; 
var_dump($myConfig->getParameters());

$configLoader->load(__DIR__ . '/parameters.json');

echo "After loading config from file." . PHP_EOL;
var_dump($myConfig->getParameters());

$myConfig->setParameter('newKey', rand(1,1000));

$configDumper->dump(__DIR__ . '/parameters.json');
$configLoader->load(__DIR__ . '/parameters.json');

echo "After saving update of config" . PHP_EOL;
var_dump($myConfig->getParameters());

