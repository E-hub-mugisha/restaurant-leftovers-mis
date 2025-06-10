<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buffet;
use App\Models\Menu;
use Illuminate\Http\Request;

class BuffetController extends Controller
{
    // Show the index view with all buffets
    public function index()
    {
        $buffets = Buffet::with('menu')->get(); // Fetch buffets along with their menu
        $menus = Menu::all(); // Fetch all menus for the create/edit form
        return view('admin.buffets.index', compact('buffets', 'menus'));
    }

    // Show the create modal
    public function create()
    {
        $menus = Menu::all(); // Fetch menus to associate with buffet
        return view('admin.buffets.create', compact('menus'));
    }

    // Store new buffet
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'menu_id' => 'required|exists:menus,id',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->only(['name', 'description', 'menu_id', 'is_available']);

        if ($image = $request->file('image')) {
            $menuPath = 'image/buffet/';
            $menuImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($menuPath), $menuImage);
            $data['image'] = $menuImage;
        }

        Buffet::create($data);

        return redirect()->route('admin.buffets.index')->with('success', 'Buffet created successfully!');
    }


    // Show the edit modal
    public function edit($id)
    {
        $buffet = Buffet::findOrFail($id);
        $menus = Menu::all();
        return view('admin.buffets.edit', compact('buffet', 'menus'));
    }

    // Update the buffet
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'menu_id' => 'required|exists:menus,id',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $buffet = Buffet::findOrFail($id);

        $data = $request->only(['name', 'description', 'menu_id', 'is_available']);

        if ($image = $request->file('image')) {
            $menuPath = 'image/buffet/';
            $menuImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($menuPath), $menuImage);
            $data['image'] = $menuImage;
        } else {
            $data['image'] = $buffet->image;
        }

        $buffet->update($data);

        return redirect()->route('admin.buffets.index')->with('success', 'Buffet updated successfully!');
    }


    // Delete the buffet
    public function destroy($id)
    {
        $buffet = Buffet::findOrFail($id);
        $buffet->delete();

        return redirect()->route('admin.buffets.index')->with('success', 'Buffet deleted successfully!');
    }
}
