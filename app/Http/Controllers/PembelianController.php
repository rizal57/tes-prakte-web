<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembelianController extends Controller
{
    public function create()
    {
        return view('pembelian.create', [
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
        $newStok = $oldStok->stok + $jumlahItem;

        $oldStok->update([
            'stok' => $newStok,
        ]);

        Pembelian::create([
            'inventory_id' => request('inventory_id'),
            'jumlah' => request('jumlah'),
        ]);
        return redirect(route('inventory.index'));
    }
}
