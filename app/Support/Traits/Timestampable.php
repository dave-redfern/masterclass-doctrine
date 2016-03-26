<?php

namespace App\Support\Traits;

use Carbon\Carbon;

/**
 * Trait Timestampable
 *
 * @package    App\Support\Traits
 * @subpackage App\Support\Traits\Timestampable
 */
trait Timestampable
{

    /**
     * @var Carbon
     */
    protected $createdOn;

    /**
     * @return Carbon
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param Carbon $createdOn
     *
     * @return $this
     */
    public function setCreatedOn(Carbon $createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }
}