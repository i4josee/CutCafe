<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy("id","desc");
        return response()->json($menus);
    }

    public function store(Request $request)
    {
        $request ->validate([
            "name"=> "required",
            "price"=>"required",
            "image"=> "nullable",
            "description"=>"required",
        ]);

        $menu = Menu::create($request->all());
        return response()->json($menu);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (! $menu) {
            return response()->json(["message"=> "Menu Not Found"],404);
        }


        $request ->validate([
            "name"=> "required",
            "price"=>"required",
            "image"=> "nullable",
            "description"=>"required",
        ]);

        $menu -> update($request->all());
        return response()->json($menu);
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (! $menu) {
            return response()->json(["message"=> "Menu Not Found"],404);
        }

        $menu->delete();
        return response()->json($menu);
    }
}
