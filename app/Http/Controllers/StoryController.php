<?php

namespace App\Http\Controllers;

use App\Entities\Story;
use App\Http\Requests\StoryFormRequest;
use App\Repositories\CommentRepository;
use App\Repositories\StoryRepository;
use App\Services\Factory\EntityFactory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class StoryController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\StoryController
 */
class StoryController extends Controller
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
     * @param int $id
     *
     * @return mixed
     */
    public function show($id)
    {
        /** @var Story $story */
        if (null === $story = $this->stories->find($id)) {
            throw new NotFoundHttpException(sprintf('Story with ID "%s" not found', $id));
        }
        
        return view('story/show', [
            'story' => $story,
        ]);
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('story/create');
    }

    /**
     * @param EntityFactory    $factory
     * @param StoryFormRequest $request
     *
     * @return mixed
     */
    public function store(EntityFactory $factory, StoryFormRequest $request)
    {
        $story = $factory->createStory($request->input('headline'), $request->input('url'));
        $this->stories->save($story);

        return redirect()->route('story.show', $story->getId());
    }
}
