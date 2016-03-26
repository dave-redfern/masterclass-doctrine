<?php

namespace App\Support\Contracts;

use Carbon\Carbon;

/**
 * Interface Timestampable
 *
 * @package    App\Support\Contracts
 * @subpackage App\Support\Contracts\Timestampable
 */
interface Timestampable
{

    /**
     * @return Carbon
     */
    public function getCreatedOn();

    /**
     * @param Carbon $createdOn
     *
     * @return $this
     */
    public function setCreatedOn(Carbon $createdOn);
}