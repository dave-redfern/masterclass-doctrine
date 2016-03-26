<?php

namespace App\Entities;

use Carbon\Carbon;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ArrayCollection|Comment[]
     */
    protected $comments;

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
        $this->comments = new ArrayCollection();
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

    

    /**
     * @return Comment[]|ArrayCollection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param Comment $comment
     *
     * @return $this
     */
    public function addComment(Comment $comment)
    {
        if (!$this->hasComment($comment)) {
            $comment->setStory($this);
            $this->comments->add($comment);
        }

        return $this;
    }

    /**
     * @param Comment $comment
     *
     * @return bool
     */
    public function hasComment(Comment $comment)
    {
        return $this->comments->contains($comment);
    }

    /**
     * @param Comment $comment
     *
     * @return $this
     */
    public function removeComment(Comment $comment)
    {
        $comment->setStory(null);
        $this->comments->removeElement($comment);

        return $this;
    }
}