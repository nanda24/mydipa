<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DipaMenu;
use Spatie\Permission\Models\Role;

class MenuController extends Controller
{
    public function index()
    {
        $menus = DipaMenu::with('roles', 'parent')->orderBy('order_index')->get();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        $roles = Role::all();
        $parents = DipaMenu::whereNull('parent_id')->get();
        return view('menus.create', compact('roles', 'parents'));
    }

    public function store(Request $request)
    {
        $menu = DipaMenu::create($request->only(['name', 'type', 'url', 'icon', 'parent_id', 'order_index', 'is_active']));
        $menu->roles()->sync($request->roles);
        return redirect()->route('menus.index')->with('success', 'Menu created.');
    }

    public function edit(DipaMenu $menu)
    {
        $roles = Role::all();
        $parents = DipaMenu::whereNull('parent_id')->where('id', '!=', $menu->id)->get();
        return view('menus.edit', compact('menu', 'roles', 'parents'));
    }

    public function update(Request $request, DipaMenu $menu)
    {
        $menu->update($request->only(['name', 'type', 'url', 'icon', 'parent_id', 'order_index', 'is_active']));
        $menu->roles()->sync($request->roles);
        return redirect()->route('menus.index')->with('success', 'Menu updated.');
    }

    public function destroy(DipaMenu $menu)
    {
        $menu->delete();
        return redirect()->route('menus.index')->with('success', 'Menu deleted.');
    }
}
