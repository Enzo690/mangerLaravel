<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function store(AdminRequest $adminRequest)
    {
        $ingredient = Ingredient::create($adminRequest->all());
        return redirect()->route('admin.dashboard')->with('info', "L'ingredient a bien été créé");
    }
}
