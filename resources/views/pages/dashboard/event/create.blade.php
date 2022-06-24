@extends('layouts.app')

@section('title', 'Create My Event')
@section('content')

    <main class="h-full overflow-y-auto">
                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-12">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Add Your Event
                            </h2>

                            <p class="text-sm text-gray-400">
                                Upload the Event you provide
                            </p>

                        </div>
                    </div>
                </div>

                <!-- breadcrumb -->
                <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex p-0 list-none">

                        <li class="flex items-center">
                            <a href="{{ route('member.event.index') }}" class="text-gray-400">My Event</a>
                            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>

                        <li class="flex items-center">
                            <a href="#" class="font-medium">Add Your Event</a>
                        </li>

                    </ol>
                </nav>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                                <form action="{{ route('member.event.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="">
                                        <div class="px-4 py-5 sm:p-6">

                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 -mb-6">

                                                    <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul Event</label>

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <input placeholder="Service apa yang ingin kamu tawarkan?" type="text" name="title" id="title" autocomplete="title" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>

                                                    @if ($errors->has('title'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <select id="title" name="kuota" autocomplete="title" class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                        
                                                        <option>Kuota Event</option>
                                                        <option value="10" selected>10 Orang</option>
                                                        <option value="20" selected>20 Orang</option>
                                                        <option value="30" selected>30 Orang</option>
                                                      
                                                    </select>

                                                    @if ($errors->has('kuota'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('kuota') }}</p>
                                                    @endif
                                                    
                                                </div>
                                                

                                                <div class="col-span-6">

                                                    <label for="slug" class="block mb-3 font-medium text-gray-700 text-md">Slug</label>

                                                    <input placeholder="Samakan dengan title dan tanpa sepasi" type="text" name="slug" id="slug" autocomplete="slug" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('slug') }}" required>

                                                    @if ($errors->has('slug'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="instructors" class="block mb-2 font-medium text-gray-700 text-md">Instructors</label>
                                                    
                                                    <input placeholder="Name,,?" type="text" name="instructors" id="instructors" autocomplete="instructors" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('instructors') }}" required>

                                                    @if ($errors->has('instructors'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('instructors') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi Event</label>

                                                    <textarea placeholder="Jelaskan Event apa yang kamu tawarkan?" type="text" name="description" id="description" autocomplete="description" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" rows="4" value="{{ old('description') }}">{{ 'description' ?? '' }}</textarea>

                                                    @if ($errors->has('description'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 -mb-6">
                                                    <label for="waktu" class="block mb-3 font-medium text-gray-700 text-md">Event Time</label>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <input placeholder="12-jan-2022" type="date" name="tanggal" id="tanggal" autocomplete="tanggal" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('tanggal') }}" required>

                                                    @if ($errors->has('tanggal'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('tanggal') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">

                                                    <input placeholder="12-jan-2022" type="time" name="waktu" id="waktu" autocomplete="waktu" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('waktu') }}" required>

                                                    @if ($errors->has('waktu'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('waktu') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="lokasi" class="block mb-3 font-medium text-gray-700 text-md">Lokasi Event</label>

                                                    <input placeholder="Lokasi Event Kamu" type="text" name="lokasi" id="lokasi" autocomplete="lokasi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('lokasi') }}" required>

                                                    @if ($errors->has('lokasi'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('lokasi') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="photo" class="block mb-3 font-medium text-gray-700 text-md">photo Event Feeds</label>

                                                    <input placeholder="photo " type="file" name="photo" id="photo" autocomplete="photo" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                    @if ($errors->has('photo'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('photo') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-span-6">

                                                    <label for="information" class="block mb-3 font-medium text-gray-700 text-md">Information</label>

                                                    <input placeholder="Information " type="text" name="information" id="information" autocomplete="information" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('information') }}" required>

                                                    @if ($errors->has('information'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('information') }}</p>
                                                    @endif
                                                </div>

                                                <div class="col-span-6">

                                                    <label for="note" class="block mb-3 font-medium text-gray-700 text-md">Note <span class="text-gray-400">(Optional)</span></label>

                                                    <input placeholder="Hal yang ingin disampaikan oleh kamu?" type="text" name="note" id="note" autocomplete="note" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('note') }}" required>

                                                    @if ($errors->has('note'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('note') }}</p>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>

                                        <div class="px-4 py-3 text-right sm:px-6">

                                            <a href="{{ route('member.event.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                Cancel
                                            </a>

                                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                                Create Event
                                            </button>

                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                        </main>
                    </div>
                </section>
    </main>
    
    @endsection

    