<?php

namespace App\Entities;

use Carbon\Carbon;
use Somnambulist\Doctrine\Contracts\Identifiable as IdentifiableContract;
use Somnambulist\Doctrine\Traits\Identifiable;

/**
 * Class Story
 *
 * @package    App\Entities
 * @subpackage App\Entities\Story
 */
class Story implements IdentifiableContract
{

    use Identifiable;

    /**
     * @var string
     */
    protected $headline;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var Carbon
     */
    protected $createdOn;

    /**
     * Constructor.
     *
     * @param null|string $headline
     * @param null|string $url
     */
    public function __construct($headline = null, $url = null)
    {
        $this->headline = $headline;
        $this->url      = $url;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     *
     * @return $this
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

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