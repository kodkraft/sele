<div class="flex flex-col mt-8">
    <div class="flex flex-wrap">
        @foreach($categories as $category)
            <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block relative h-48 rounded overflow-hidden">
                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                         src="https://dummyimage.com/421x261">
                </a>
                <div class="mt-4">
                    <h2 class="text-gray-900 title-font text-lg font-medium">{{ $category->title }}</h2>
                </div>
            </div>
        @endforeach
    </div>
</div>
