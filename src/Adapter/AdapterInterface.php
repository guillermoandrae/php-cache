<?php

namespace Guillermoandrae\Cache\Adapter;

interface AdapterInterface
{
    /**
     * Undocumented function
     *
     * @param string $key
     * @return boolean
     */
    public function has(string $key);

    /**
     * Undocumented function
     *
     * @param string $key
     * @return void
     */
    public function get(string $key);
    
    /**
     * Undocumented function
     *
     * @param string $key
     * @param [type] $value
     * @return void
     */
    public function set(string $key, $value);
    
    /**
     * Undocumented function
     *
     * @param string $key
     * @return void
     */
    public function delete(string $key);
}
