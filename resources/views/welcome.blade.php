@extends('layouts')
@section('content')

 <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <h1>Student Management System</h1>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('createstudent') }}" class="underline text-gray-900 dark:text-white">Add Student</a></div>
                            </div>

                            
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                               
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('student-list') }}" class="underline text-gray-900 dark:text-white">View Student</a></div>
                            </div>

                            
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="{{ url('createmark') }}" class="underline text-gray-900 dark:text-white">Add Marks</a></div>
                            </div>

                            
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                            
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a href="{{ url('mark-list-main') }}"" class="underline text-gray-900 dark:text-white">View Marks</a></div>
                            </div>

                           
                        </div>
                    </div>
                </div>


@stop