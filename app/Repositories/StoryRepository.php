<?php

namespace App\Repositories;

/**
 * Class StoryRepository
 *
 * @package    App\Repositories
 * @subpackage App\Repositories\StoryRepository
 */
class StoryRepository extends AppRepository
{

    /**
     * Fetch stories as view models
     *
     * @return array
     */
    public function findWithCommentCount()
    {
        $query = $this->getEntityManager()->createQuery('
            SELECT NEW App\Support\ViewModels\Story(s.id, s.headline, s.url, COUNT(c), s.createdBy, s.createdOn)
              FROM App\Entities\Story s
                   LEFT JOIN s.comments c
             GROUP BY s.id
             ORDER BY s.id DESC 
        ');

        return $query->getResult();
    }
}