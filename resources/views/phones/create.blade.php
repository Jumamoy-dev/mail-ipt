@extends('layout')

@section('content')
<div class="max-w-2xl mx-auto p-6">
    <div class="mb-6">
        <a href="{{ route('phones.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
            ← Back to Inventory
        </a>
        <h1 class="text-3xl font-bold text-gray-800 mt-2">Add New Phone</h1>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded shadow-sm">
            <div class="flex">
                <div class="ml-3">
                    <p class="text-sm text-red-700 font-bold">Please correct the following errors:</p>
                    <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-xl border border-gray-100 p-8">
        <form action="{{ route('phones.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Phone Model Name</label>
                <input type="text" name="phone_name" value="{{ old('name') }}" 
                       placeholder="e.g. iPhone 15 Pro"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}" 
                       placeholder="e.g. Apple"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Price ($)</label>
                <div class="relative">
                    <span class="absolute left-3 top-2 text-gray-500 font-medium">$</span>
                    <input type="number" step="0.01" name="price" value="{{ old('price') }}" 
                           placeholder="0.00"
                           class="w-full pl-8 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition duration-150">
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg shadow-md transition duration-200 transform active:scale-[0.98]">
                    Save Phone to Inventory
                </button>
            </div>
        </form>
    </div>
</div>
@endsection