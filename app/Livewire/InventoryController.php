<?php

namespace App\Livewire;

use App\Models\Inventory;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;

use Livewire\Component;

#[Layout('components.layout-na')]


class InventoryController extends Component
{
    public $inventory;
    public $code;
    public $id;



    public $description;
    public $quantity;
    public $unit;

    public $isUpdate = false;
    public function render()
    {
        $this->inventory = Inventory::all();
        return view('livewire.inventory-livewire');
    }

    public function tambah(){
        $validatedData = $this->validate([
            'code' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric|min:1',
            'unit' => 'required',
        ]);

        Inventory::create($validatedData);
        $this->clear();
        session()->flash('sukses', 'Inventory berhasil ditambahkan');
    }

    public function edit($angka){

      $data = Inventory::find($angka);
        $this->id = $data['id'];
        $this->code = $data['code'];
        $this->description = $data['description'];
        $this->quantity = $data['quantity'];
        $this->unit = $data['unit'];
        $this->isUpdate=true;
    }

    public function update(){
        $validatedData = $this->validate([
            'code' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric|min:1',
            'unit' => 'required',
        ]);

        Inventory::where('id', $this->id)->update($validatedData);
        $this->clear();
        session()->flash('sukses', 'Data Berhasil Diubah');

    }

    public function hapus($id){
        Inventory::where('id', $id)->delete();
    }

    public function hapusSession()
    {
        Session::forget('sukses');
    }


    public function clear(){
        $this->isUpdate=false;
        $this->code=null;
        $this->description=null;
        $this->quantity=null;
        $this->unit=null;

    }
}
