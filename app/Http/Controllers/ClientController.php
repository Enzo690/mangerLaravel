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

    public function index(Request $request, Plat $plat)
    {
        $ingredient = Ingredient::query()->withTrashed()->oldest('name')->get();
        $datas['ingredient'] = $ingredient;
        if ($request->isMethod('post'))
        {
          $datas['plat'] =  $this->postRepository->getFoodByRelation($plat, 5,$request->id,'ingredients','ingredients');
        }
        return view('dashboard', compact('datas'));
    }

}
