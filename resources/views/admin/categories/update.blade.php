<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('admin.categories.update',$category->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group" style="width: 50%;">
                            <input type="text" value="{{$category->name}}" class="form-control" name="name" placeholder="Category name">
                            @error('name')
                            <span class="form-text" style="color: red;">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" style="margin-top: 25px;" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

