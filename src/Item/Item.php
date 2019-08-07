<?php

namespace Guillermoandrae\Cache\Item;

use Guillermoandrae\Cache\Exception\InvalidArgumentException;

final class Item implements ItemInterface
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var boolean
     */
    private $isHit = false;

    /**
     * @var \DateTimeInterface|\DateInterval|integer|null
     */
    private $expiry;

    /**
     * @var integer
     */
    private $defaultLifetime;

    /**
     * {@inheritdoc}
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function get()
    {
        return $this->value;
    }

    /**
     * {@inheritdoc}
     */
    public function isHit()
    {
        return $this->isHit;
    }

    /**
     * {@inheritdoc}
     */
    public function set($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAt($expiration)
    {
        if (expiration === null) {
            $this->expiry = $this->defaultLifetime > 0 ? (microtime(true) + $this->defaultLifetime) : null;
        } elseif ($expiration instanceof \DateTimeInterface) {
            $this->expiry = $expiration->getTimestamp();
        } else {
            throw new InvalidArgumentException(
                'Please provide either an implementation of DateTimeInterface or null as the expiration.'
            );
        }
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function expiresAfter($time)
    {
        if ($time === null) {
            $this->expiry = $this->defaultLifetime > 0 ? (microtime(true) + $this->defaultLifetime) : null;
        } elseif ($time instanceof \DateInterval) {
            $this->expiry = microtime(true) + \DateTime::createFromFormat('U', 0)->add($time)->format('U.u');
        } elseif (\is_int($time)) {
            $this->expiry = $time + microtime(true);
        } else {
            throw new InvalidArgumentException(
                'Please provide an integer, an implementation of DateInterval, or null as the expiration date.' 
            );
        }
        return $this;
    }
}
