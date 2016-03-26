<?php

namespace App\Services\Factory;

use App\Support\Contracts\Blamable as BlamableContract;
use App\Entities\Comment;
use App\Entities\Story;
use App\Entities\User;
use App\Support\Contracts\Timestampable;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Guard;

/**
 * Class EntityFactory
 *
 * @package    App\Services\Factory
 * @subpackage App\Services\Factory\EntityFactory
 */
class EntityFactory
{

    /**
     * @var Guard
     */
    protected $auth;



    /**
     * Constructor.
     *
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Story|null  $story
     * @param null|string $comment
     *
     * @return Comment
     */
    public function createComment(Story $story = null, $comment = null)
    {
        $entity = new Comment($story, $comment);

        $this->applyCreator($entity);
        $this->applyCreatedOn($entity);

        return $entity;
    }

    /**
     * @param null|string $headline
     * @param null|string $url
     *
     * @return Story
     */
    public function createStory($headline = null, $url = null)
    {
        $entity = new Story($headline, $url);

        $this->applyCreator($entity);
        $this->applyCreatedOn($entity);

        return $entity;
    }

    /**
     * @param null|string $username
     * @param null|string $email
     * @param null|string $password
     *
     * @return User
     */
    public function createUser($username = null, $email = null, $password = null)
    {
        $entity = new User($username, $email, $password);

        $this->applyCreator($entity);

        return $entity;
    }



    /**
     * Sets the creator, if a user is currently authenticated
     *
     * @param mixed $entity
     */
    protected function applyCreator($entity)
    {
        if ($entity instanceof BlamableContract && $this->auth->user()) {
            $entity->setCreatedBy($this->auth->user()->getUsername());
        }
    }

    /**
     * Sets the creator, if a user is currently authenticated
     *
     * @param mixed $entity
     */
    protected function applyCreatedOn($entity)
    {
        if ($entity instanceof Timestampable) {
            $entity->setCreatedOn(Carbon::now());
        }
    }
}
