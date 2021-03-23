<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(AdminRequest $adminRequest)
    {
        $category = Category::create($adminRequest->all());
        return redirect()->route('admin.dashboard')->with('info', 'La catégorie a bien été créé');
    }

    public function destroyCat(Category $category)
    {
        $category->delete();
        return back()->with('info', 'Le film a bien été mis dans la corbeille.');
    }

    public function forceDestroyCat($id)
    {
        Category::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', 'Le film a bien été supprimé définitivement dans la base de données.');
    }

    public function restore($id)
    {
        Category::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info', 'Le contact a bien été restauré.');
    }

}
