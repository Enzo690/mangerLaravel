<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Origin;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    public function storeOri(AdminRequest $adminRequest)
    {
        $origin = Origin::create($adminRequest->all());
        return redirect()->route('admin.dashboard')->with('info', "L'origine a bien été créé");
    }
}
