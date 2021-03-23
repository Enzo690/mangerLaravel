<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    public function store(AdminRequest $adminRequest)
    {
        $type = Type::create($adminRequest->all());
        return redirect()->route('admin.dashboard')->with('info', "Le type a bien été créé");
    }
}
