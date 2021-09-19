<form wire:submit.prevent="storeOrUpdate">
    <div class="w-full md:w-1/2 bg-white flex flex-col md:py-8 mt-8 md:mt-0">
        <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">New Category</h2>
        <p class="leading-relaxed mb-5 text-gray-600">@lang('category.please-fill-following-fields')</p>
        <div class="relative mb-4">
            <label for="title" class="leading-7 text-sm text-gray-600">@lang('category.title')</label>
            <input type="text" id="title" name="title" wire:model="form.title"
                   class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
        </div>
        @if(count($categories) > 0)
            <div class="relative mb-4">
                <label for="parent"
                       class="leading-7 text-sm text-gray-600">@lang('category.select-parent')</label>
                <select id="parent" name="parent" wire:model="form.parent_id"
                        class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <button type="submit"
                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
            @lang('category.save')
        </button>
    </div>
</form>
