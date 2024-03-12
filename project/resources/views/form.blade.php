@extends('layout')
@section('title')
@endsection
@section('content')

    <div class="min-h-screen bg-gray-100  justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h2 class="leading-relaxed">Add Product</h2>
                        </div>
                    </div>

                    <form action="{{route('addData')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="divide-y divide-gray-200">
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="flex flex-col">
                                    <label class="leading-loose" for="pd_name">Name Product</label>
                                    <input type="text" name="pd_name"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="Name Product...">
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose" for="pd_price">Price</label>
                                    <input type="number" name="pd_price"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="pd_price">
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose" for="pd_img">Image</label>
                                    <input type="file" name="pd_img"
                                        class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"
                                        placeholder="">
                                </div>
                            </div>
                            <div class="pt-4 flex items-center space-x-4">
                                <button type="submit"
                                    class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Create</button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection
