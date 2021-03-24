<?php
namespace App\Repositories;
use App\Models\Post;

class PostRepository
{

    public function store(object $obj, string $text = "", object $request = null)
    {
        $type = $obj::create($request->all());
        return redirect()->route('admin.dashboard')->with('info',  $text ."a bien été créé");
    }

    public function destroy(object $obj, string $text = "" )
    {
        $obj->delete();
        return back()->with('info', $text . ' a bien été mis dans la corbeille.');
    }

    public function forceDestroy(object $obj,$id, string $text = "")
    {
        $obj::withTrashed()->whereId($id)->firstOrFail()->forceDelete();
        return back()->with('info', $text.'a bien été supprimé définitivement dans la base de données.');
    }

    public function restore(object $obj, $id, string $text = "")
    {
        $obj::withTrashed()->whereId($id)->firstOrFail()->restore();
        return back()->with('info',  $text.' a bien été restauré.');
    }

}
