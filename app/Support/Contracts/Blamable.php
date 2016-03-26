<?php

namespace App\Support\Contracts;

/**
 * Interface Blamable
 *
 * @package    App\Support\Contracts
 * @subpackage App\Support\Contracts\Blamable
 */
interface Blamable
{

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param string $createdBy
     *
     * @return $this
     */
    public function setCreatedBy($createdBy);
}