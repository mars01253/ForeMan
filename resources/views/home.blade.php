<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ForeMan</title>
</head>
<body>
  
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
                        
                          <p class="text-gray-600 font-bold text-sm ml-1">
                              {{$info->price}}
                          </p>
                      </div>
                      <div class="bg-gray-200 px-3 py-1 rounded-full text-xs font-medium text-gray-800 hidden md:block">
                          {{$info->category->name}}</div>
                  </div>
                  <h3 class="font-black text-gray-800 md:text-3xl text-xl">{{$info->name}}</h3>
                  <p class="md:text-lg text-gray-500 text-base">{{$info->description}}</p>
                  <div class="w-[80%] flex items-center justify-between">
                    <form action="{{ route('destroy', [ $info->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input type="submit" value="Delete" class=" rounded-xl p-2 no-underline text-black bg-red-200">
                  </form>
                <a href="{{ route('edit', [ $info->id]) }}"  class=" rounded-xl p-2 no-underline text-black bg-green-200">edit</a>
                  </div>
              </div>
              
          </div>
          

  </div>
  @endforeach
  </div>
  @endsection
</body>
</html>

