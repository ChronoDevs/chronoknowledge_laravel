<?php
namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostFavorite;
use App\Interfaces\PostFavoriteRepositoryInterface;
use Exception;

class PostFavoriteService
{
    /**
     * @param CategoryService $service
     * @return void
     */
    public function __construct(PostFavoriteRepositoryInterface $repository)
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

        $favorite = $this->repository->add($data);
        \Cache::pull('posts');

        return $favorite;
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

        $favorite = $this->repository->adjust($id, $data);
        \Cache::pull('posts');

        return $favorite;
    }

    /**
     *
     * @return JSON $category
     */
    public function annul()
    {
        $id = request()->get('id');

        $favorite = $this->repository->annul($id);
        \Cache::pull('posts');

        return $favorite;
    }
}
?>

