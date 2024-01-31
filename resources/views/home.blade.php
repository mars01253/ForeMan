@extends('layouts.app')

@section('content')

    <form action="{{route('store')}}" method="POST">
        @csrf
    <div class="container max-w-screen-lg mx-auto">
      <div>
        <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
          <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
            <div class="text-gray-600">
              <p class="font-medium text-lg">Add a service</p>
              <p>Please fill out all the fields.</p>
            </div>
  
            <div class="lg:col-span-2">
              <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                <div class="md:col-span-5">
                  <label for="full_name">Service Name :</label>
                  <input type="text" name="name" id="Name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="" />
                  <input type="text" name="id" id="" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 hidden" value="{{ Auth::user()->id}}" />
                </div>
                <div class="md:col-span-5">
                  <label for="description">Service description :</label>
                  <input type="textarea" name="description" id="description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""/>
                </div>
                <div class="md:col-span-5">
                    <label for="price">Service price :</label>
                    <input type="text" name="price" id="price" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value=""/>
                  </div>
                <label for="Category">Category</label>
                <div class="md:col-span-2">
                    <select name="Category" id="Category">
                        <option value="" selected disabled hidden>choose a category</option>
                        @foreach ($data as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-5">
                  <div class="inline-flex items-center">
                    <input type="checkbox" name="" id="" class="form-checkbox" />
                    <label for="billing_same" class="ml-2">I want to hide my info</label>
                  </div>
                </div>
                <div class="md:col-span-5 text-right">
                  <div class="inline-flex items-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</form>
<div class="flex flex-col gap-2">
@foreach ($service as $info)
  <div class="flex flex-col justify-center">
    <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div class="w-full md:w-1/3 bg-white grid place-items-center">
            <img src="https://images.pexels.com/photos/4381392/pexels-photo-4381392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="tailwind logo" class="rounded-xl" />
    </div>
            <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                <div class="flex justify-between item-center">
                    <p class="text-gray-500 font-medium hidden md:block">{{$info->user->name}}</p>
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <p class="text-gray-600 font-bold text-sm ml-1">
                            {{$info->price}}
                        </p>
                    </div>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                        {{$info->category->name}}</div>
                </div>
                <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{$info->name}}</h3>
                <p class="md:text-lg text-gray-500 text-base">{{$info->description}}</p>
            </div>
        </div>
</div>
@endforeach
</div>
@endsection

