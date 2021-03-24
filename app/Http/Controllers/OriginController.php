<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Origin;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class OriginController extends Controller
{


    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        return $this->postRepository = $postRepository;
    }

    public function store(AdminRequest $adminRequest,Origin $origin)
    {
        return $this->postRepository->store($origin,"L'origine",$adminRequest);
    }

    public function destroy(Origin $origin)
    {
        return $this->postRepository->destroy($origin,"L'origine");
    }

    public function forceDestroy($id, Origin $origin)
    {
        return $this->postRepository->forceDestroy($origin, $id, "L'origine");
    }

    public function restore($id, Origin $origin)
    {
        return $this->postRepository->restore($origin,$id,"L'origine");
    }

}
