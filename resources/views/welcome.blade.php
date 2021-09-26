<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/tailwind.css') }}" rel="stylesheet">
    <title>Prolux - Home</title>
</head>


<body>

<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img src="img/logo.jpg" alt="logo" width="100px" height="100px">
            <span class="ml-3 text-xl">Prolux</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a class="mr-5 hover:text-gray-900" href="#">Home</a>
            <a class="mr-5 hover:text-gray-900" href="#">Services</a>
            <a class="mr-5 hover:text-gray-900" href="#">About Us</a>
            <a class="mr-5 hover:text-gray-900" href="{{ route('contact') }}">Contact Us</a>
        </nav>

    </div>
</header>

<hr>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap -mx-4 -mb-10 text-center">
            @forelse($products as $product)
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('img/img1.jpg') }}">
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">{{ $product->name }}</h2>
                    <p class="leading-relaxed text-base">{{ $product->short_description }}</p>
                    <a href="{{ route('order', ['id' => $product->id, 'type' => 'product']) }}" class="flex mx-auto mt-6 text-white bg-yellow-400 border-0 py-2 px-5 focus:outline-none hover:bg-yellow-300 rounded">Click here</a>
                </div>
            @empty
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="cake" class="object-cover object-center h-full w-full" src="{{ asset('img/img1.jpg') }}">
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Amoires</h2>
                    <p class="leading-relaxed text-base">Avec un design adapté a votre besoin.</p>
                    <a href="{{ route('order', ['id' => 1, 'type' => 'product'] }}" class="flex mx-auto mt-6 text-white bg-yellow-400 border-0 py-2 px-5 focus:outline-none hover:bg-yellow-300 rounded">Click here</a>
                </div>
                <div class="sm:w-1/2 mb-10 px-4">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img alt="content" class="object-cover object-center h-full w-full" src="{{ asset('img/img1.jpg') }}">
                    </div>
                    <h2 class="title-font text-2xl font-medium text-gray-900 mt-6 mb-3">Tables et salle a manger</h2>
                    <p class="leading-relaxed text-base">Une touche particuliere pour des clients particuliers. Parce que chaque besoin merite d'etre comblé a juste prix.</p>
                    <a href="{{ route('order', ['id' => 2, 'type' => 'product']) }}" class="flex mx-auto mt-6 text-white bg-yellow-400 border-0 py-2 px-5 focus:outline-none hover:bg-yellow-300 rounded">Click here</a>
                </div>
            @endforelse
        </div>
    </div>
</section>

<hr>

<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-24 mx-auto flex">
        <div class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 relative z-10 shadow-md">
            <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Suggestion</h2>
            <p class="leading-relaxed mb-5 text-gray-600">Votre suggestion est tres importante pour nous</p>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Votre Email</label>
                <input type="email" id="email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            </div>
            <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">Votre Message</label>
                <textarea id="message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
            </div>
            <button class="text-white bg-yellow-400 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-300 rounded text-lg">Submit</button>
            <p class="text-xs text-gray-500 mt-3"></p>
        </div>
    </div>
</section>

<hr>

<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="xl:w-1/2 lg:w-3/4 w-full mx-auto text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="inline-block w-8 h-8 text-gray-400 mb-8" viewBox="0 0 975.036 975.036">
                <path d="M925.036 57.197h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.399 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l36 76c11.6 24.399 40.3 35.1 65.1 24.399 66.2-28.6 122.101-64.8 167.7-108.8 55.601-53.7 93.7-114.3 114.3-181.9 20.601-67.6 30.9-159.8 30.9-276.8v-239c0-27.599-22.401-50-50-50zM106.036 913.497c65.4-28.5 121-64.699 166.9-108.6 56.1-53.7 94.4-114.1 115-181.2 20.6-67.1 30.899-159.6 30.899-277.5v-239c0-27.6-22.399-50-50-50h-304c-27.6 0-50 22.4-50 50v304c0 27.601 22.4 50 50 50h145.5c-1.9 79.601-20.4 143.3-55.4 191.2-27.6 37.8-69.4 69.1-125.3 93.8-25.7 11.3-36.8 41.7-24.8 67.101l35.9 75.8c11.601 24.399 40.501 35.2 65.301 24.399z"></path>
            </svg>
            <p class="leading-relaxed text-lg">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem culpa doloribus eaque et molestiae, mollitia, obcaecati odit placeat quas quibusdam sed sit suscipit tenetur vitae voluptates! Et sapiente sunt temporibus!
            </p>
            <span class="inline-block h-1 w-10 rounded bg-yellow-400 mt-8 mb-6"></span>
            <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">John Doe</h2>
            <p class="text-gray-500">Product Designer</p>
        </div>
    </div>
</section>

<hr>

<footer class="text-gray-600 body-font">
    <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <img src="{{ asset('img/logo.jpg') }}" alt="logo" width="100px" height="100px">
            <span class="ml-3 text-xl">Prolux</span>
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            © 2020 copyright - All right reserved
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
    </div>
</footer>
</body>
</html>
