<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Http\Requests\AdminRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    protected $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        return $this->postRepository = $postRepository;
    }

    public function store(AdminRequest $adminRequest, Type $type)
    {
        return $this->postRepository->store($type,'Le type',$adminRequest);
    }

    public function destroy(Type $type)
    {
        return $this->postRepository->destroy($type,'Le type');
    }

    public function forceDestroy($id, Type $type)
    {
        return $this->postRepository->forceDestroy($type, $id, 'Le type');
    }

    public function restore($id, Type $type)
    {
        return $this->postRepository->restore($type,$id,'Le type');
    }
}
