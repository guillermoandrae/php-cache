<?php

namespace Guillermoandrae\Cache;

use Guillermoandrae\Cache\Adapter\AdapterInterface;
use Guillermoandrae\Cache\Exception\InvalidArgumentException;

final class Factory
{
    /**
     * Undocumented function
     *
     * @param string $name
     * @param [type] $options
     * @return AdapterInterface
     */
    public static function factory(string $name, $options = null): AdapterInterface
    {
        try {
            $className = sprintf(
                '%s\%sAdapter',
                self::getNamespace(),
                ucfirst(strtolower($name))
            );
            $reflectionClass = new \ReflectionClass($className);
            return $reflectionClass->newInstance($options);
        } catch (\ReflectionException $ex) {
            throw new InvalidArgumentException(
                sprintf('The %s cache adapter does not exist.', $name)
            );
        }
    }
}
