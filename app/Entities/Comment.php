<?php

namespace App\Entities;

use App\Support\Contracts\Blamable as BlamableContract;
use App\Support\Contracts\Timestampable as TimestampableContract;
use App\Support\Traits\Blamable;
use App\Support\Traits\Timestampable;
use Somnambulist\Doctrine\Contracts\Identifiable as IdentifiableContract;
use Somnambulist\Doctrine\Traits\Identifiable;

/**
 * Class Comment
 *
 * @package    App\Entities
 * @subpackage App\Entities\Comment
 */
class Comment implements IdentifiableContract, BlamableContract, TimestampableContract
{

    use Identifiable;
    use Blamable;
    use Timestampable;

    /**
     * @var Story
     */
    protected $story;

    /**
     * @var string
     */
    protected $comment;

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
    public function setStory(Story $story = null)
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
}