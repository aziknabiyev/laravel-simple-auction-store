<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="post" action="{{route('admin.products.update',$product->id)}}">
                        @csrf
                        @method('put')
                        <div class="form-group" style="width: 50%;">
                            <label style="font-weight: bold;">Product title</label>
                            @error('title')
                            <span class="form-text" style="color: red;">{{$message}}</span>
                            @enderror
                            <input type="text" value="{{$product->title}}" class="form-control" name="title">
                        </div>
                        <div class="form-group" style="width: 50%;margin-top: 25px;">
                            <label style="font-weight: bold;">Product description</label>
                            @error('description')
                            <span class="form-text" style="color: red;">{{$message}}</span>
                            @enderror
                            <textarea rows="5" class="form-control" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group" style="width: 50%;margin-top: 25px;">
                            <label style="font-weight: bold;">Product categories</label>
                            @error('categories')
                            <span class="form-text" style="color: red;">{{$message}}</span>
                            @enderror
                            @foreach($categories as $cat)
                                <div class="form-check">
                                    <input class="form-check-input" {{$controller->checkProductCategory($cat->id,$product->categories)}} name="categories[]" style="cursor:pointer;" type="checkbox" value="{{$cat->id}}" id="categoryCheck{{$cat->id}}">
                                    <label class="form-check-label" style="cursor:pointer;" for="categoryCheck{{$cat->id}}">
                                        {{$cat->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" style="margin-top: 25px;" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

