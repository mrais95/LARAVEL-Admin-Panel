<div class="fixed z-10 inset-0 overflow-y-auto">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
    
    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
    <form>
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div><h1 class="font-bold text-center mb-4">Create Data</h1></div>
            <div>
                <div class="mb-2">
                    <input type="hidden" wire:model="id" name="id" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan nama">
                </div>
                <div class="mb-2">
                    <label for="name" class="block">Nama</label>
                    <input type="text" wire:model="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan nama">
                    @error('name') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
                <div class="mb-2">
                    <label for="phone" class="block">Nomer HP</label>
                    <input type="text" wire:model="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan nomer HP">
                    @error('phone') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
                <div class="mb-2">
                    <label for="daerah" class="block">Daerah</label>
                    <input type="text" wire:model="daerah" name="daerah" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan asal daerah">
                    @error('daerah') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
                <div class="mb-2">
                    <label for="produk" class="block">Produk</label>
                    <input type="text" wire:model="produk" name="produk" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan nama produk">
                    @error('produk') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
                <div class="mb-2">
                    <label for="status" class="block">Status</label>
                    <input type="text" wire:model="status" name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan status">
                    @error('status') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
                <div class="mb-2">
                    <label for="pembayaran" class="block">Jumlah Pembayaran</label>
                    <input type="number" wire:model="pembayaran" name="pembayaran" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan jumlah pembayaran">
                    @error('pembayaran') <h1 class="text-red-500">{{ $message }}</h1> @enderror
                </div>
            </div>
          
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button wire:click.prevent="store()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
          Submit
        </button>
        <button wire:click="hideModal" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Cancel
        </button>
      </div>
      </form>
    </div>
  </div>
</div>