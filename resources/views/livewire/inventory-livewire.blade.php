<div x-data="{openForm:false}">
    <x-slot:title>Inventory</x-slot:title>
    @if(session('sukses'))
    <div class=" rounded-md w-1/2 bg-green-50 p-4">

        <div class="rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{session('sukses')}}</p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex rounded-md bg-green-50 p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2 focus:ring-offset-green-50">
                            <span class="sr-only">Dismiss</span>
                            <svg wire:click="hapusSession"  class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif

    <div >



        <form x-show="openForm" class="absolute w-full sm:w-3/4 md:w-2/4 lg:w-1/4" >
            <div class="bg-white shadow sm:rounded-lg" @click.outside="openForm = false">
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
                                <div class="flex gap-2" x-data="{conformDel:false}">
                                <button wire:click="edit({{$inv->id}})" @click="openForm=true" type="button" class="rounded-full bg-yellow-400 p-1 text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <x-icons.edit />
                                </button>


                                <button  @click="conformDel = !conformDel" type="button" class="rounded-full bg-red-400 p-1 text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    <x-icons.delete/>
                                </button>

                                    <div x-show="conformDel" class="absolute">
                                        <div class="rounded-md bg-red-50 p-4">
                                            <div class="flex" @click.outside="conformDel = false">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                                <div class="ml-3">
                                                    <h3 class="text-sm font-medium text-red-800">Are you sure want to delete?</h3>
                                                    <div class="flex gap-2 mt-2 text-sm text-red-700">
                                                        <x-btn-red namaBtn="Delete" wire:click="hapus({{$inv->id}})" />
                                                        <x-btn-yellow namaBtn="Cancel" @click="conformDel = false"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

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
