<div x-data="{openForm:false}">
    <x-slot:title>Inventory</x-slot:title>
    @if(session('sukses'))
    <div class="rounded-md w-1/2 bg-green-50 p-4">
        <div class="flex gap-2">

                <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                </svg>
                <h3 class="text-sm font-medium text-green-800">{{session('sukses')}}</h3>


            <svg wire:click="hapusSession"  viewBox="0 0 1024 1024" fill="#000000" class="icon h-5 w-5 text-red-400" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M512 897.6c-108 0-209.6-42.4-285.6-118.4-76-76-118.4-177.6-118.4-285.6 0-108 42.4-209.6 118.4-285.6 76-76 177.6-118.4 285.6-118.4 108 0 209.6 42.4 285.6 118.4 157.6 157.6 157.6 413.6 0 571.2-76 76-177.6 118.4-285.6 118.4z m0-760c-95.2 0-184.8 36.8-252 104-67.2 67.2-104 156.8-104 252s36.8 184.8 104 252c67.2 67.2 156.8 104 252 104 95.2 0 184.8-36.8 252-104 139.2-139.2 139.2-364.8 0-504-67.2-67.2-156.8-104-252-104z" fill=""></path><path d="M707.872 329.392L348.096 689.16l-31.68-31.68 359.776-359.768z" fill=""></path><path d="M328 340.8l32-31.2 348 348-32 32z" fill=""></path></g></svg>




        </div>
    </div>
    @endif

    <div >



        <form x-show="openForm" class="absolute w-1/2" >
            <div class="bg-white w-1/2 shadow sm:rounded-lg" @click.outside="openForm = false">
                <div class="px-4 py-5 sm:p-6">

                        <svg @click="openForm=false" class="w-5 h-5 text-right" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20.7457 3.32851C20.3552 2.93798 19.722 2.93798 19.3315 3.32851L12.0371 10.6229L4.74275 3.32851C4.35223 2.93798 3.71906 2.93798 3.32854 3.32851C2.93801 3.71903 2.93801 4.3522 3.32854 4.74272L10.6229 12.0371L3.32856 19.3314C2.93803 19.722 2.93803 20.3551 3.32856 20.7457C3.71908 21.1362 4.35225 21.1362 4.74277 20.7457L12.0371 13.4513L19.3315 20.7457C19.722 21.1362 20.3552 21.1362 20.7457 20.7457C21.1362 20.3551 21.1362 19.722 20.7457 19.3315L13.4513 12.0371L20.7457 4.74272C21.1362 4.3522 21.1362 3.71903 20.7457 3.32851Z" fill="#0F0F0F"></path> </g></svg>

                    <x-input-text name="code" wire:model="code"/>
                    <x-input-text name="description" wire:model="description"/>
                    <x-input-text name="quantity" wire:model="quantity"/>
                    <x-input-text name="unit" wire:model="unit"/>
                    @if($isUpdate == true)
                        <div class="flex gap-1">
                        <x-btn-blue namaBtn="Edit Data" wire:click="update"/>
                        <x-btn-yellow namaBtn="Cancel" @click="openForm=false" wire:click="clear"/>
                        </div>
                    @else
                        <div class="flex gap-2">
                        <x-btn-blue namaBtn="Tambah Data" wire:click="tambah"/>

                        </div>
                    @endif

                </div>
            </div>
        </form>

    </div>


    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class=" sm:flex-auto">
                <h1 class="flex gap-2 text-base font-semibold leading-6 text-gray-900">
                    List of Inventory

                    <x-icons.plus @click="openForm=true" />

                </h1>
                <p class="mt-2 text-sm text-gray-700">List stock barang yang ada di gudang</p>
            </div>



        </div>
        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">

                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Code</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Description</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Qty</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Unit</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>


                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($inventory as $data=>$inv)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{$inv->code}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$inv->description}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$inv->quantity}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$inv->unit}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">

{{--                                <a type="button" wire:click="edit({{$inv->id}})" >Edit</a>--}}
                                <div class="flex gap-2">
                                <button wire:click="edit({{$inv->id}})" @click="openForm=true" type="button" class="rounded-full bg-yellow-400 p-1 text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <x-icons.edit />
                                </button>


                                <button wire:click="hapus({{$inv->id}})" type="button" class="rounded-full bg-red-400 p-1 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <x-icons.delete/>
                                </button>

                                </div>


                            </td>

                        </tr>
                        @endforeach

                        <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
