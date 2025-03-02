@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md ">
        <div class="px-6 py-4">
            <div class="flex justify-center mx-auto">
                <img class="w-auto h-7 sm:h-8" src="https://upload.wikimedia.org/wikipedia/commons/b/b3/Logo_resmi_UMS.svg"
                    alt="">
            </div>

            <h3 class="mt-3 text-xl font-medium text-center text-gray-600 ">Welcome to UMS Hospitality</h3>

            <p class="mt-1 text-center text-gray-500 ">Please login to using this app.</p>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="w-full mt-4">
                    <input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg    focus:border-blue-400  focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="email" name="email" placeholder="Email Address" aria-label="Email Address" required />
                </div>

                <div class="w-full mt-4">
                    <input
                        class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg    focus:border-blue-400  focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                        type="password" name="password" placeholder="Password" aria-label="Password" required />
                </div>

                <div class="flex items-center justify-between mt-4">
                    <button
                        class="w-full px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
