<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Ingredient;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        return $this->postRepository = $postRepository;
    }

    public function store(AdminRequest $adminRequest, Ingredient $ingredient)
    {
        return $this->postRepository->store($ingredient,"L'ingrédient",$adminRequest);
    }

    public function destroy(Ingredient $ingredient)
    {
        return $this->postRepository->destroy($ingredient,"L'ingrédient");
    }

    public function forceDestroy($id)
    {
        return $this->postRepository->forceDestroy(Ingredient::withTrashed(), $id, "L'ingrédient");
    }

    public function restore($id, Ingredient $ingredient)
    {
        return $this->postRepository->restore($ingredient,$id,"L'ingrédient");
    }
}
