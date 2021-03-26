<?php

namespace App\Http\Controllers;
use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\{Ingredient, Category, Origin, Plat, Type, User};
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::query()->withTrashed()->oldest('name')->paginate(5);
        $origin = Origin::query()->withTrashed()->oldest('name')->paginate(5);
        $type =  Type::query()->withTrashed()->oldest('name')->paginate(5);
        $ingredient = Ingredient::query()->withTrashed()->oldest('name')->paginate(5);
        $plat = Plat::query()->withTrashed()->oldest('name')->paginate(5)->all();

        $data =
        [
            'plat' => $plat,
            'category' => $category,
            'origin' => $origin,
            'type' => $type,
            'ingredient' => $ingredient
        ];



        return view('admin/dashboard', compact('data'));
    }

}
