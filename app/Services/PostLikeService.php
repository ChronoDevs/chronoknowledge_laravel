<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostLike;
use App\Interfaces\PostLikeRepositoryInterface;
use Exception;

class PostLikeService
{
    /**
     * @param CategoryService $service
     * @return void
     */
    public function __construct(PostLikeRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @return JSON $category
     */
    public function add()
    {
        $data = [
          'user_id' => auth()->user()->id,
          'post_id' => request()->get('post_id'),
        ];

        $like = $this->repository->add($data);
        return $like;
    }

    /**
     *
     * @return JSON $category
     */
    public function adjust()
    {
        $id = request()->get('id');
        $data = [
            'deleted_at' => null
        ];

        $like = $this->repository->adjust($id, $data);
        return $like;
    }

    /**
     *
     * @return JSON $category
     */
    public function annul()
    {
        $id = request()->get('id');

        $like = $this->repository->annul($id);
        return $like;
    }
}
?>

