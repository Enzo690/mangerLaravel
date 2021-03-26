<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlatRequest;
use App\Models\Plat;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PlatController extends Controller
{

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        return $this->postRepository = $postRepository;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlatRequest $platRequest)
    {
        $plat = Plat::create($platRequest->all());
        $plat->ingredients()->attach($platRequest->ingrs);
        return redirect()->route('admin.dashboard')->with('info', 'Le plat a bien été créé');
    }

    public function destroy(Plat $plat)
    {
        return $this->postRepository->destroy($plat,"Le plat");
    }

    public function forceDestroy($id)
    {
        return $this->postRepository->forceDestroy(Plat::withTrashed(), $id, "Le plat");
    }

    public function restore($id, Plat $plat)
    {
        return $this->postRepository->restore($plat,$id,"Le plat");
    }
}
