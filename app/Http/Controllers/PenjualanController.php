<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function create()
    {
        return view('penjualan.create', [
            'barang' => Inventory::all(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'inventory_id' => 'required',
            'jumlah' => 'required',
        ]);

        $oldStok = Inventory::where('id', request('inventory_id'))->first();
        // return $oldStok;
        $jumlahItem = request('jumlah');
        $newStok = $oldStok->stok - $jumlahItem;

        $oldStok->update([
            'stok' => $newStok,
        ]);

        Penjualan::create([
            'inventory_id' => request('inventory_id'),
            'jumlah' => request('jumlah'),
        ]);
        return redirect(route('inventory.index'));
    }
}
