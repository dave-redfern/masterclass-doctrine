<?php

namespace App\Entities;

use App\Support\Contracts\Blamable as BlamableContract;
use App\Support\Contracts\Timestampable as TimestampableContract;
use App\Support\Traits\Blamable;
use App\Support\Traits\Timestampable;
use Doctrine\Common\Collections\ArrayCollection;
use Somnambulist\Doctrine\Contracts\Identifiable as IdentifiableContract;
use Somnambulist\Doctrine\Traits\Identifiable;

/**
 * Class Story
 *
 * @package    App\Entities
 * @subpackage App\Entities\Story
 */
class Story implements IdentifiableContract, BlamableContract, TimestampableContract
{

    use Identifiable;
    use Blamable;
    use Timestampable;

    /**
     * @var string
     */
    protected $headline;

    /**
     * @var string
     */
    protected $url;

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