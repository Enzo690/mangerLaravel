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
        $model = null;
        $category = Category::query()->withTrashed()->oldest('name')->paginate(5);
        $origin = Origin::query()->withTrashed()->oldest('name')->paginate(5);
        $type =  Type::query()->withTrashed()->oldest('name')->paginate(5);
        $ingredient = Ingredient::query()->withTrashed()->oldest('name')->paginate(5);

        $data =
        [
            'category' => $category,
            'origin' => $origin,
            'type' => $type,
            'ingredient' => $ingredient
        ];

        return view('admin/dashboard', compact('data'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return view('show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('edit', compact('film'));
    }

    public function update(FilmRequest $filmRequest, Film $film)
    {
        $film->update($filmRequest->all());
        $film->categories()->sync($filmRequest->cats);
        $film->actors()->sync($filmRequest->acts);
        return redirect()->route('films.index')->with('info', 'Le film a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

}
