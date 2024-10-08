@props(['name'])

<div>
    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{$name}}</label>
    <div class="mt-2">
        <input type="text" name="{{$name}}"  {{$attributes}} class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Please input {{$name}}">
    </div>
</div>



<div>
    @error($name) <div><p class="text-red-500">{{$message}}</p></div> @enderror
</div>
