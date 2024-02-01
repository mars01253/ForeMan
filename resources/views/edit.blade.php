


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>ForeMan</title>
</head>
<body>

    <header class="fixed w-full">
        <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
                <a href="{{ route('home') }}" class="flex items-center">
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">ForeMan</span>
                </a>
                <div class="flex items-center lg:order-2">
                        <a href="{{ route('logout') }}" class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 dark:bg-purple-600 dark:hover:bg-purple-700 focus:outline-none dark:focus:ring-purple-800">Log out</a>
                </div>
                <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="mobile-menu-2">
                    <ul class="flex flex-col mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <li>
                            <a href="{{ route('home') }}" class="block py-2 pl-3 pr-4 text-white bg-purple-700 rounded lg:bg-transparent lg:text-purple-700 lg:p-0 dark:text-white" aria-current="page">Home</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <form action="{{ route('update', [ $service->id]) }}" method="POST">
        @csrf
        @method('PUT')  
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
                  <input type="text" name="name" id="Name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$service->name}}" />
                  <input type="text" name="id" id="" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 hidden" value="{{ Auth::user()->id}}" />
                </div>
                <div class="md:col-span-5">
                  <label for="description">Service description :</label>
                  <input type="textarea" name="description" id="description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$service->description}}"/>
                </div>
                <div class="md:col-span-5">
                    <label for="price">Service price :</label>
                    <input type="text" name="price" id="price" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$service->price}}"/>
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
</body>
</html>