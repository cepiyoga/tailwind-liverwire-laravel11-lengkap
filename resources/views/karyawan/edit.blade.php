<x-layout>
    <x-slot:title>Edit Data Karyawan</x-slot:title>

    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <form action="/karyawan/{{$editKaryawan['id']}}" method="post">
        @csrf
        @method('put')
        <div class="isolate -space-y-px rounded-md shadow-sm w-1/4">
            <div class="relative rounded-md rounded-b-none px-3 pb-1.5 pt-2.5 ring-1 ring-inset ring-gray-300 focus-within:z-10 focus-within:ring-2 focus-within:ring-indigo-600">
                <label for="name" class="block text-xs font-medium text-gray-900">Name</label>
                <input type="text" name="nama" id="nama" class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" value="{{old('nama',$editKaryawan['nama'])}}" placeholder="Please input Name">
            </div>
            @error('nama')
            <div class="text-red-700">{{$message}}</div>
            @enderror
            <div class="relative rounded-md rounded-t-none px-3 pb-1.5 pt-2.5 ring-1 ring-inset ring-gray-300 focus-within:z-10 focus-within:ring-2 focus-within:ring-indigo-600">
                <label for="job-title" class="block text-xs font-medium text-gray-900">NIK</label>
                <input type="text" name="nik" id="nik" class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Input NIK" value="{{old('nama',$editKaryawan['nik'])}}">
            </div>
            @error('nik')
            <div class="text-red-700">{!! $message !!}</div>
            @enderror
            <div class="relative rounded-md rounded-t-none px-3 pb-1.5 pt-2.5 ring-1 ring-inset ring-gray-300 focus-within:z-10 focus-within:ring-2 focus-within:ring-indigo-600">
                <label for="job-title" class="block text-xs font-medium text-gray-900">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="block w-full border-0 p-0 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Head of Tomfoolery" value="{{old('nama',$editKaryawan['alamat'])}}">
            </div>
            @error('alamat')
            <div class="text-red-700">{{$message}}</div>
            @enderror
        </div>
        <input type="submit" value="Update" class="rounded bg-indigo-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        <a href="/karyawan" class="rounded bg-yellow-600 px-2 py-1 text-xs font-semibold text-white shadow-sm hover:bg-yellow-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-yellow-600">Cancel</a>
    </form>

</x-layout>
