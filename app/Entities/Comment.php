<?php

namespace App\Entities;

use Carbon\Carbon;
use Somnambulist\Doctrine\Contracts\Identifiable as IdentifiableContract;
use Somnambulist\Doctrine\Traits\Identifiable;

/**
 * Class Comment
 *
 * @package    App\Entities
 * @subpackage App\Entities\Comment
 */
class Comment implements IdentifiableContract
{

    use Identifiable;

    /**
     * @var Story
     */
    protected $story;

    /**
     * @var string
     */
    protected $comment;

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
     * @param null|Story  $story
     * @param null|string $comment
     */
    public function __construct(Story $story = null, $comment = null)
    {
        $this->story   = $story;
        $this->comment = $comment;
    }

    /**
     * @return Story
     */
    public function getStory()
    {
        return $this->story;
    }

    /**
     * @param Story $story
     *
     * @return $this
     */
    public function setStory(Story $story)
    {
        $this->story = $story;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

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