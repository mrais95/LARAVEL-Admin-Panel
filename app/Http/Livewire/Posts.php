<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Exports\DataExport;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class Posts extends Component
{
    use WithPagination;

    public $fDaerah, $fProduk, $fStatus;
    public $dataId, $name, $phone, $daerah, $produk, $status, $pembayaran;
    public $isOpen = false;
    public $isOpenDelete = false;
    public $isOpenImport = false;
    public $totalPembayaran = 0;

    public function render()
    {
        $pDaerah = '%'.$this->fDaerah.'%';
        $pProduk = '%'.$this->fProduk.'%';
        $pStatus = '%'.$this->fStatus.'%';
        return view('livewire.posts', [
            'posts' => Post::where('daerah','like', $pDaerah)
            ->where('produk', 'like', $pProduk)
            ->where('status', 'like', $pStatus)
            ->latest()->paginate(2)
        ]);
    }

    public function showModal(){
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){
        $this->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'daerah' => 'required',
                'produk' => 'required',
                'status' => 'required',
                'pembayaran' => 'required',
            ]
            );

            Post::updateOrCreate(['id' => $this->dataId], [
                'name' => $this->name,
                'phone' => $this->phone,
                'daerah' => $this->daerah,
                'produk' => $this->produk,
                'status' => $this->status,
                'pembayaran' => $this->pembayaran
            ]);

        $this->hideModal();

        session()->flash('info', $this->dataId ? 'Data updated successfully' : 'Post created successfully');
            
        $this->dataId = '';
        $this->name = '';
        $this->phone = '';
        $this->daerah = '';
        $this->produk = '';
        $this->status = '';
        $this->pembayaran = 0;
    }

    public function edit($id){
        $post = Post::findOrFail($id);
        $this->dataId = $id;
        $this->name = $post->name;
        $this->phone = $post->phone;
        $this->daerah = $post->daerah;
        $this->produk = $post->produk;
        $this->status = $post->status;
        $this->pembayaran = $post->pembayaran;

        $this->showModal();
    }

    public function delete(){
        Post::find($this->dataId)->delete();
        $this->hideModalDelete();
        session()->flash('info', 'Data deleted successfully');
    }

    public function showModalDelete($id){
        $this->dataId = $id;
        $this->isOpenDelete = true;
    }

    public function hideModalDelete(){
        $this->isOpenDelete = false;
    }

    public function export() 
    {
        return Excel::download(new DataExport, 'data.csv');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new DataImport,request()->file('file'));
             
        return back();
    }

    public function showModalImport(){
        $this->isOpenImport = true;
    }

    public function hideModalImport(){
        $this->isOpenImport = true;
    }
}
