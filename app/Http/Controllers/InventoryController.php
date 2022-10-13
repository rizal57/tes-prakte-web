<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        return view('inventory.index', [
            'inventories' => Inventory::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store()
    {
        request()->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        if(request('stok')) {
            $stok = request('stok');
        } else {
            $stok = 5;
        }

        Inventory::create([
            'nama' => request('nama'),
            'harga' => request('harga'),
            'stok' => $stok,
        ]);
        return redirect(route('inventory.index'))->with('success', 'Data berhasil ditambahkan');
    }
}
