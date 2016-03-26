<?php

namespace App\Http\Controllers;

use App\Entities\Story;
use App\Http\Requests\CommentFormRequest;
use App\Repositories\CommentRepository;
use App\Repositories\StoryRepository;
use App\Services\Factory\EntityFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class CommentController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\CommentController
 */
class CommentController extends Controller
{

    /**
     * @var StoryRepository
     */
    protected $stories;

    /**
     * @var CommentRepository
     */
    protected $comments;

    /**
     * Constructor.
     *
     * @param StoryRepository   $stories
     * @param CommentRepository $comments
     */
    public function __construct(StoryRepository $stories, CommentRepository $comments)
    {
        $this->stories  = $stories;
        $this->comments = $comments;
    }

    /**
     * @param EntityFactory      $factory
     * @param CommentFormRequest $request
     * @param integer            $id
     *
     * @return mixed
     */
    public function store(EntityFactory $factory, CommentFormRequest $request, $id)
    {
        /** @var Story $story */
        if (null === $story = $this->stories->find($id)) {
            throw new NotFoundHttpException(sprintf('Story with ID "%s" was not found', $id));
        }

        $comment = $factory->createComment($story, $request->input('comment'));
        
        $this->comments->save($comment);

        return redirect()->route('story.show', [$story->getId()]);
    }
}
