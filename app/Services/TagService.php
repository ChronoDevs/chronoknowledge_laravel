<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Globals;
use App\Models\Tag;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\PostTagRepositoryInterface;
use Exception;

class TagService
{
    /**
     * @param TagService $service
     * @return void
     */
    public function __construct(
        TagRepositoryInterface $repository,
        PostTagRepositoryInterface $postTagRepository
    )
    {
        $this->repository = $repository;
        $this->postTagRepository = $postTagRepository;
    }

    /**
     *
     * @return JSON $tag
     */
    public function all()
    {
        $count = Globals::mTag()::POPULARITY_MAX_COUNT;
        $postTags = $this->postTagRepository->acquireByPopularity($count)->toArray();
        $tags = $this->repository->acquireAllWithSort($postTags);
        return $tags;
    }

    /**
     *
     * @return JSON $tag
     */
    public function store()
    {
        $tag = $this->repository->add();
        return $tag;
    }
}
?>

