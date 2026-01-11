@extends('layout')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Phone Inventory</h1>
        <a href="{{ route('phones.create') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 shadow-md">
           + Add New Phone
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <p class="font-bold">Success</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Model Name</th>
                    <th class="py-3 px-6 text-left">Brand</th>
                    <th class="py-3 px-6 text-center">Price</th>
                    <th class="py-3 px-6 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">
                @foreach($phones as $phone)
                <tr class="border-b border-gray-200 hover:bg-gray-50 transition duration-150">
                    <td class="py-4 px-6 text-left whitespace-nowrap font-medium text-gray-900">
                        {{ $phone->name }}
                    </td>
                    <td class="py-4 px-6 text-left">
                        <span class="bg-gray-200 text-gray-700 py-1 px-3 rounded-full text-xs">
                            {{ $phone->brand }}
                        </span>
                    </td>
                    <td class="py-4 px-6 text-center">
                        ${{ number_format($phone->price, 2) }}
                    </td>
                    <td class="py-4 px-6 text-center">
                        <div class="flex item-center justify-center space-x-4">
                            <a href="{{ route('phones.edit', $phone) }}" 
                               class="text-blue-500 hover:text-blue-700 font-medium">
                                Edit
                            </a>
                            
                            <form action="{{ route('phones.destroy', $phone) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Are you sure?')"
                                        class="text-red-500 hover:text-red-700 font-medium">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection