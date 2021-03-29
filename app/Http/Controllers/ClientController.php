<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Origin;
use App\Models\Plat;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Repositories\PostRepository;

class ClientController extends Controller
{

    protected $postRepository;
    protected $nbrPages;

    public function __construct(PostRepository $postRepository)
    {
        return $this->postRepository = $postRepository;
    }

    public function index()
    {
        $category = Category::query()->withTrashed()->oldest('name')->paginate(5);
        $origin = Origin::query()->withTrashed()->oldest('name')->paginate(5);
        $type =  Type::query()->withTrashed()->oldest('name')->paginate(5);
        $ingredient = Ingredient::query()->withTrashed()->oldest('name')->paginate(5);
        $plat = null;

        $data =
            [
                'plat' => $plat,
                'category' => $category,
                'origin' => $origin,
                'type' => $type,
                'ingredient' => $ingredient
            ];

        return view('dashboard', compact('data'));
    }

    public function getFoodByIngredient (Request $request, Plat $plat){
        $ingredient = Ingredient::query()->withTrashed()->oldest('name')->paginate(5);
        $data = ['ingredient' => $ingredient];
        $data['plat'] =  $this->postRepository->getFoodByRelation($plat, 5,$request->id,'ingredients','ingredients');
        dd( $data['plat']);die;
        return view('dashboard', compact('data'));
    }

}
