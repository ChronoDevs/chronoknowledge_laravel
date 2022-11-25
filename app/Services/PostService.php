<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;
use App\Interfaces\TagRepositoryInterface;
use App\Interfaces\PostTagRepositoryInterface;
use Exception;

class PostService
{
    /**
     * @param PostService $service
     * @return void
     */
    public function __construct(
        PostRepositoryInterface $repository,
        TagRepositoryInterface $tagRepository,
        PostTagRepositoryInterface $postTagRepository
    ) {
        $this->repository = $repository;
        $this->tagRepository = $tagRepository;
        $this->postTagRepository = $postTagRepository;
    }

    public function acquire($id)
    {
        $rtn = [];

        $rtn = $this->repository->acquire($id);

        return $rtn;
    }

    /**
     *
     * @return JSON $tags
     */
    public function all()
    {
        $rtn = [];

        $data = [
            'categoryTitle' => request()->get('categoryTitle'),
            'post_display_type' => request()->get('post_display_type')
        ];

        $expiry = 604800; // 1 week
        $rtn = \Cache::remember('posts', $expiry, function () use ($data) {
            return $this->repository->acquireAllByDisplayTypeAndCategory($data);
        });

        return $rtn;
    }

    /**
     *
     * @return JSON $Post
     */
    public function add()
    {
        $post = false;
        $user = \Auth::guard('api')->user();

        $data = [
            'user_id' => $user->id,
            'category_id' => request()->get('category_id'),
            'title' => request()->get('title'),
            'plain_description' => strip_tags(request()->get('plain_description')),
            'html_description' => request()->get('plain_description'),
            'status' => Post::STATUS_PUBLISHED
        ];

        $tagData = array_map(function($tag) {
            return [ 'title' => $tag['title']];
        }, request()->get('tags'));
        $postTagData = [];


        \DB::beginTransaction();
        try {
            $post = $this->repository->add($data);
            $tags = $this->tagRepository->addBulk($tagData);

            foreach ($tags as $tag) {
                $postTagData[] = [
                    'post_id' => $post->id,
                    'tag_id' => $tag->id
                ];
            }

            $this->postTagRepository->addBulk($postTagData);

            \Cache::pull('posts');
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return $post;
    }
}
?>

