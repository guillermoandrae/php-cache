<?php

namespace Guillermoandrae\Cache\Adapter;

use Aws\S3\S3ClientInterface;
use Guillermoandrae\Cache\Adapter\AbstractAdapter;

final class S3Adapter extends AbstractAdapter
{
    /**
     * @var S3ClientInterface
     */
    private $client;

    /**
     * Registers an implementation of S3ClientInterface with this class.
     *
     * @param S3ClientInterface $client An implementation of S3ClientInterface
     */
    public function __construct(S3ClientInterface $client)
    {
        $this->client = $client;
    }
}
