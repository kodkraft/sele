<div class="flex flex-col">

    <div class="flex flex-row justify-end mt-8 container px-4">
        <button wire:click="createOrUpdate()"
                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            @if($showForm)
                @lang('category.show-categories')
            @else
                @lang('category.create')
            @endif
        </button>
    </div>

    <section class="text-gray-600">
        <div class="container mx-auto px-5 py-4">
            @if($showForm)
                @include('admin.components.category.create')
            @else
                @include('admin.components.category.index')
            @endif
        </div>
    </section>
</div>
