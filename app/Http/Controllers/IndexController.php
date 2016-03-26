<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepository;
use App\Repositories\StoryRepository;

/**
 * Class IndexController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\IndexController
 */
class IndexController extends Controller
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
     * @return mixed
     */
    public function index()
    {
        //$stories = $this->stories->findStoriesWithCommentCounts();
        $stories = $this->stories->findAll();

        return view('index/index', ['stories' => $stories]);
    }
}

