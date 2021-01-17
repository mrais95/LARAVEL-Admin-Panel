
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">Application Data Management</h2>
</x-slot>

<div class="max-w-6xl mx-auto sm:px-6 lg:px-8 mt-5">
                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg py-4 px-4">
                    @if(session()->has('info'))
                    <h1 class="mb-4">{{ session('info') }}</h1>
                    @endif
                    
                    <div class="flex mb-4">
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <button wire:click="showModal" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                        Create
                        </button>
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <input type="text" wire:model="fDaerah" name="fDaerah" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Filter daerah">
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <input type="text" wire:model="fProduk" name="fProduk" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Filter produk">
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <input type="text" wire:model="fStatus" name="fStatus" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Filter status">
                      </div>
                    </div>
                    
                    @if($isOpen)
                        @include('livewire.create')
                    @endif
                    @if($isOpenDelete)
                        @include('livewire.delete')
                    @endif
                    @if($isOpenImport)
                        @include('livewire.import')
                    @endif
                    <table class="table-fixed w-full">
                        <thead class="bg-blue-500">
                            <tr>
                                <th class="px-4 py-2 text-white w-20">No</th>
                                <th class="px-4 py-2 text-white">Nama</th>
                                <th class="px-4 py-2 text-white">Nomer HP</th>
                                <th class="px-4 py-2 text-white">Daerah</th>
                                <th class="px-4 py-2 text-white">Produk</th>
                                <th class="px-4 py-2 text-white">Status</th>
                                <th class="px-4 py-2 text-white">Pembayaran</th>
                                <th class="px-4 py-2 text-white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $numInc=0;
                            @endphp
                            @foreach($posts as $post)
                            @php
                            $numInc++;
                            $totalPembayaran += $post->pembayaran; 
                            @endphp
                            <tr>
                                <td class="text-center">{{ $numInc }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->phone }}</td>
                                <td>{{ $post->daerah }}</td>
                                <td>{{ $post->produk }}</td>
                                <td>{{ $post->status }}</td>
                                <td>{{ $post->pembayaran }}</td>
                                <td>
                                <button wire:click="edit({{ $post->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Edit
                                </button>
                                <button wire:click="showModalDelete({{ $post->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Delete
                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4 mb-2">
                    <label for="phone" class="block font-bold mt-2 mb-2">Teks WhatsApp</label>
                    <textarea type="text" wire:model="phone" name="phone" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Masukkan teks WhatsApp"></textarea>
                    </div>

                    <div class="flex mt-4">
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                        <button wire:click="showModalImport" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                        Import CSV
                        </button>
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                      <button wire:click="export" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mb-2">
                        Export CSV
                        </button>
                      </div>
                      <div class="w-full md:w-1/5 px-3 mb-6 md:mb-0">
                      </div>
                      <div class="w-full md:w-2/5 px-3 mb-6 md:mb-0">
                        <h1 class="font-bold text-right">Total Pembayaran : {{ strval($totalPembayaran) }}</h1>
                      </div>
                    </div>

                </div>
            <div class="mt-4">
                {{$posts->links()}}
            </div>
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
