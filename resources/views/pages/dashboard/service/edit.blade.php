@extends('layouts.app')

@section('title', 'Edit, My Bootcamp')

@section('content')

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-12">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Edit Your Bootcamp
                            </h2>

                            <p class="text-sm text-gray-400">
                                Edit the Bootcamps you provide
                            </p>

                        </div>
                    </div>
                </div>

                <!-- breadcrumb -->
                <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex p-0 list-none">

                        <li class="flex items-center">
                            <a href="{{ route('member.service.index') }}" class="text-gray-400">My Bootcamp</a>
                            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>

                        <li class="flex items-center">
                            <a href="#" class="font-medium">Edit Your Bootcamp</a>
                        </li>

                    </ol>
                </nav>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                                <form action="{{ route('member.service.update', [$service->slug]) }}" method="POST" enctype="multipart/form-data">

                                    @method('PUT')
                                    @csrf

                                    <div class="">
                                        <div class="px-4 py-5 sm:p-6">
                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul Bootcamp</label>
                                                    
                                                    <input placeholder="Bootcamp apa yang ingin kamu tawarkan?" type="text" name="title" id="title" autocomplete="title" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $service->title ?? '' }}" required>

                                                    @if ($errors->has('title'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                                    @endif

                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-3">
                                                    <label for="category_id" class="block mb-3 font-medium text-gray-700 text-md">Category Bootcamp</label>
                                                    
                                                    <select id="category_id" name="category_id" autocomplete="category_id" class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                        
                                                        @foreach ($category as $ctg)
                                                            @if (old('category_id', $service->category_id) == $ctg->id)
                                                                
                                                            <option value="{{ $ctg->id }}" selected>{{ $ctg->name }}</option>
                                                            
                                                            @else
                                                            
                                                            <option value="{{ $ctg->id }}">{{ $ctg->name }}</option>
                                                            
                                                            @endif
                                                        
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('slug'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">
                                                    
                                                    <label for="slug" class="block mb-3 font-medium text-gray-700 text-md">Slug</label>
                                                    
                                                    <input placeholder="Samakan dengan title tanpa sepasi?" type="text" name="slug" id="slug" autocomplete="slug" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $service->slug ?? '' }}" required>

                                                    @if ($errors->has('slug'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                                    @endif

                                                </div>
                                                
                                                <div class="col-span-6">
                                                    
                                                    <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi Bootcamp</label>
                                                    
                                                    <input placeholder="Jelaskan Bootcamp apa yang kamu tawarkan?" type="text" name="description" id="description" autocomplete="description" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $service->description ?? '' }}" required>

                                                    @if ($errors->has('description'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">
                                                    
                                                    <label for="advantage-services" class="block mb-2 font-medium text-gray-700 text-md">Key Point Bootcamp </label>
                                                    
                                                    <p class="block mb-3 text-sm text-gray-700">
                                                        Hal apa aja yang didapakan dari Bootcamp kamu?
                                                    </p>

                                                    @forelse ($advantage_service as $item)
                                                    
                                                        <input placeholder="Keunggulan Bootcamp" type="text" name="{{ ('advantage-services['.$item->id.']') }}" id="advantage-services" autocomplete="advantage-services" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $item->advantage ?? '' }}" required>

                                                    @empty
                                                        {{-- empty --}}
                                                    @endforelse

                                                    <div id="newServicesRow"></div>
                                                    
                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                                        Tambahkan Keunggulan +
                                                    </button>
                                                
                                                </div>

                                                <div class="col-span-6 -mb-6">
                                                    <label for="delivery & revision" class="block mb-3 font-medium text-gray-700 text-md">Estimasi Bootcamp & Jumlah Revisi</label>
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    
                                                    <select id="estimation" name="delivery_time" autocomplete="estimation" class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                        <option>Butuh Berapa hari Bootcamp kamu selesai?</option>
                                                        <option value="30" {{ $service->delivery_time == '30' ? 'selected' : '' }}>30 Hari</option>
                                                        <option value="40" {{ $service->delivery_time == '40' ? 'selected' : '' }}>40 Hari</option>
                                                        <option value="60" {{ $service->delivery_time == '60' ? 'selected' : '' }}>60 Hari</option>
                                                        <option value="70" {{ $service->delivery_time == '70' ? 'selected' : '' }}>70 Hari</option>
                                                        <option value="90" {{ $service->delivery_time == '90' ? 'selected' : '' }}>90 Hari</option>
                                                    </select>
                                                
                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                
                                                    <select id="estimation" name="revision_limit" autocomplete="estimation" class="block w-full px-3 py-3 pr-10 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                        <option>Maksimal Revisi Bootcamp kamu</option>
                                                        <option value="2" {{ $service->revision_limit == '2' ? 'selected' : '' }}>2 Kali</option>
                                                        <option value="5" {{ $service->revision_limit == '5' ? 'selected' : '' }}>5 Kali</option>
                                                        <option value="7" {{ $service->revision_limit == '7' ? 'selected' : '' }}>7 Kali</option>
                                                        <option value="10" {{ $service->revision_limit == '10' ? 'selected' : '' }}>10 Kali</option>
                                                        <option value="12" {{ $service->revision_limit == '12' ? 'selected' : '' }}>12 Kali</option>
                                                    </select>
                                                
                                                </div>

                                                <div class="col-span-6">
                                                    
                                                    <label for="price" class="block mb-3 font-medium text-gray-700 text-md">Harga Bootcamp Kamu</label>
                                                    
                                                    <input placeholder="Total Harga Bootcamp Kamu" type="number" name="price" id="price" autocomplete="price" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $service->price ?? '' }}" required>

                                                    @if ($errors->has('price'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('price') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">
                                                    
                                                    <label for="service-name" class="block mb-3 font-medium text-gray-700 text-md">Thumbnail Service Feeds</label>

                                                    <div class="grid grid-cols lg:grid-cols-3 md:grid-cols-2 gap-4">

                                                        @forelse ($thumbnail_service as $item)
                                                            <div class="mb-2">
                                                                <img src="{{ url(Storage::url($item->thumbnail)) }}" alt="Thumbnail" class="inline object-cover w-20 h-20 rounded" for="choose">

                                                                <input type="file" name="{{ ('thumbnails['.$item->id.']') }}" placeholder="Thumbnail" class="block w-full py-3 pl-5 mt-3 border-gray-300 rounded-md shadow-sm focus:ring-green-500 sm:text-sm" id="thumbnails" autocomplete="thumbnails">
                                                            </div>
                                                        @empty
                                                            {{-- Empty --}}
                                                        @endforelse

                                                    </div>

                                                    <div id="newThumbnailRow"></div>
                                                    
                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addThumbnailRow">
                                                        Tambahkan Gambar +
                                                    </button>
                                                
                                                </div>

                                                <div class="col-span-6">
                                                
                                                    <label for="advantage-users" class="block mb-3 font-medium text-gray-700 text-md">Detail Bootcamp</label>
                                                    
                                                    @forelse ($advantage_user as $item)
                                                    
                                                        <input placeholder="Keunggulan Kamu" type="text" name="{{ ('advantage-users['.$item->id.']') }}" id="advantage-users" autocomplete="advantage-users" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $item->advantage ?? '' }}" required>

                                                    @empty
                                                        {{-- empty --}}
                                                    @endforelse
                                                    
                                                    <div id="newAdvantagesRow"></div>
                                                    
                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addAdvantagesRow">
                                                        Tambahkan Keunggulan +
                                                    </button>
                                                
                                                </div>

                                                <div class="col-span-6">
                                                
                                                    <label for="note" class="block mb-3 font-medium text-gray-700 text-md">Note <span class="text-gray-400">(Optional)</span></label>
                                                
                                                    <input placeholder="Hal yang ingin disampaikan oleh kamu?" type="text" name="note" id="note" autocomplete="note" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $service->note ?? '' }}">

                                                    @if ($errors->has('note'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('note') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">
                                                
                                                    <label for="taglines" class="block mb-3 font-medium text-gray-700 text-md">Benefit <span class="text-gray-400">(??)</span></label>

                                                    @forelse ($tagline as $item)
                                                    
                                                        <input placeholder="Benefits" type="text" name="{{ ('taglines['.$item->id.']') }}" id="taglines" autocomplete="taglines" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $item->tagline ?? '' }}" required>

                                                    @empty
                                                        {{-- empty --}}
                                                    @endforelse

                                                    <div id="newTaglineRow"></div>
                                                    
                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addTaglineRow">
                                                        Tambahkan Tagline +
                                                    </button>
                                                
                                                </div>

                                            </div>
                                        </div>

                                        <div class="px-4 py-3 text-right sm:px-6">
                                            
                                            <a href="{{ route('member.service.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                Cancel
                                            </a>

                                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                                Save Changes
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

@push('after-script')
     <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"></script>
        
        <script type="text/javascript">
            // add row
            $("#addAdvantagesRow").click(function() {
                var html = '';
                html += '<input placeholder="Keunggulan Kamu" type="text" name="advantage_user[]" id="advantage_user" autocomplete="advantage_user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

                $('#newAdvantagesRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeAdvantagesRow', function() {
                $(this).closest('#inputFormAdvantagesRow').remove();
            });
        </script>
        
        <script type="text/javascript">
            // add row
            $("#addServicesRow").click(function() {
                var html = '';
                html += '<input placeholder="Keunggulan Service" type="text" name="advantage_service[]" id="advantage_service" autocomplete="advantage_service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

                $('#newServicesRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeServicesRow', function() {
                $(this).closest('#inputFormServicesRow').remove();
            });
        </script>
        
        <script type="text/javascript">
            // add row
            $("#addTaglineRow").click(function() {
                var html = '';
                html += '<input placeholder="Keunggulan" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

                $('#newTaglineRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeTaglineRow', function() {
                $(this).closest('#inputFormTaglineRow').remove();
            });
        </script>
        
        <script type="text/javascript">
            // add row
            $("#addThumbnailRow").click(function() {
                var html = '';
                html += '<input placeholder="Thumbnail" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

                $('#newThumbnailRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeThumbnailRow', function() {
                $(this).closest('#inputFormThumbnailRow').remove();
            });
        </script>
@endpush
