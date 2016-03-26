<?php

namespace App\Support\Traits;

/**
 * Trait Blamable
 *
 * @package    App\Support\Traits
 * @subpackage App\Support\Traits\Blamable
 */
trait Blamable
{

    /**
     * @var string
     */
    protected $createdBy;
    
    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     *
     * @return $this
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }
}