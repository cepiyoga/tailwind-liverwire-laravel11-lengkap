<x-layout>
    <x-slot:title>Karyawan</x-slot:title>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">List Karyawan</h1>
            </div>




            <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                <a href="/karyawan/create">
                <button type="button" class="flex gap-1 block rounded-md bg-indigo-600 px-3 py-2 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    <svg class="h-5" fill="#ffffff" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>plus-user</title> <path d="M2.016 28q0 0.832 0.576 1.44t1.408 0.576h14.016v-0.352q-1.792-0.608-2.912-2.176t-1.088-3.488q0-2.016 1.184-3.584t3.072-2.112q0.384-1.216 1.216-2.176t2.016-1.504q0.512-1.376 0.512-2.624v-1.984q0-3.328-2.368-5.664t-5.632-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.912 1.504t-2.496 2.144-1.76 2.624-0.64 2.912zM18.016 24q0 0.832 0.576 1.44t1.408 0.576h2.016v1.984q0 0.864 0.576 1.44t1.408 0.576 1.408-0.576 0.608-1.44v-1.984h1.984q0.832 0 1.408-0.576t0.608-1.44-0.608-1.408-1.408-0.576h-1.984v-2.016q0-0.832-0.608-1.408t-1.408-0.576-1.408 0.576-0.576 1.408v2.016h-2.016q-0.832 0-1.408 0.576t-0.576 1.408z"></path> </g></svg>
                    Tambah Karyawan</button>
                </a>
            </div>
        </div>

        @if (session('success'))

        <div class="rounded-md w-1/2 bg-yellow-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 5a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 5zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-yellow-800">Informasi</h3>
                    <div class="mt-2 text-sm text-yellow-700">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="mt-8 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">NIK</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nama</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Alamat</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>

                        </tr>
                        </thead>
                        <tbody x-data="{delD:false}" class="divide-y divide-gray-200">
                        @foreach($karyawans as $data=>$kar)
                        <tr>




                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{$kar->nik}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$kar->nama}}</td>
                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$kar->alamat}}</td>

                            <td class="relative flex gap-1 whitespace-nowrap py-4 pl-3 pr-4 text-sm font-medium sm:pr-0">

                                <form action="/karyawan/{{$kar->id}}" method="post">
                                    @csrf
                                    @method('delete')

                                    <input @click="delD=true" onclick="return confirm('Are you sure want to DELETE?')" type="submit" value="Delete" class=" rounded bg-red-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">




                                </form>
                                <a href="/karyawan/{{$kar->id}}/edit" class="rounded bg-yellow-400 px-2 py-1 text-xs font-semibold text-black shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
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




</x-layout>
