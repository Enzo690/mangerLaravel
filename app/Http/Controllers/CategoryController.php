<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Category;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function store(AdminRequest $adminRequest,Category $category)
    {
        return $this->postRepository->store($category,"La catégorie",$adminRequest);
    }

    public function destroy(Category $category)
    {
        return $this->postRepository->destroy($category,"La catégorie");
    }

    public function forceDestroy($id, Category $category)
    {
        return $this->postRepository->forceDestroy($category, $id, "La catégorie");
    }

    public function restore($id, Category $category)
    {
        return $this->postRepository->restore($category,$id,"La catégorie");
    }

}
