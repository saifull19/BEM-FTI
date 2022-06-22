@extends('layouts.app')

@section('title', 'Create My Service')
@section('content')

    <main class="h-full overflow-y-auto">
                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-12">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Add Your Gallery
                            </h2>

                            <p class="text-sm text-gray-400">
                                Upload the Gallerys you provide
                            </p>

                        </div>
                    </div>
                </div>

                <!-- breadcrumb -->
                <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex p-0 list-none">

                        <li class="flex items-center">
                            <a href="{{ route('member.service.index') }}" class="text-gray-400">My Gallery</a>
                            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>

                        <li class="flex items-center">
                            <a href="#" class="font-medium">Add Your Gallery</a>
                        </li>

                    </ol>
                </nav>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                                <form action="{{ route('member.service.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="">
                                        <div class="px-4 py-5 sm:p-6">

                                            <div class="grid grid-cols-6 gap-6">

                                                <div class="col-span-6 -mb-6">

                                                    <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Tema</label>

                                                </div>

                                                <div class="col-span-6 sm:col-span-3">
                                                    <input placeholder="Tema Kegiatan yang dilaksanakan" type="text" name="title" id="title" autocomplete="title" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>

                                                    @if ($errors->has('title'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                                    @endif

                                                </div>


                                                <div class="col-span-6 sm:col-span-3">
                                                    
                                                    

                                                    <input placeholder="Ketua pelakasana pada kegiatan ini" type="text" name="price" id="price" autocomplete="price" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('price') }}" required>

                                                    @if ($errors->has('price'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('price') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="slug" class="block mb-3 font-medium text-gray-700 text-md">Slug</label>

                                                    <input placeholder="Samakan dengan Tema dan tanpa sepasi" type="text" name="slug" id="slug" autocomplete="slug" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('slug') }}" required>

                                                    @if ($errors->has('slug'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('slug') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi </label>

                                                    {{-- <input placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description" autocomplete="description" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('description') }}" required>

                                                    @if ($errors->has('description'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                                    @endif --}}

                                                    @push('after-style')
                                                        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                                                        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
                                                        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
                                                    @endpush

                                                     <textarea name="description" id="summernote" cols="30" rows="10"></textarea>
                                                        <script>
                                                            $('#summernote').summernote({
                                                            tabsize: 4,
                                                            height: 320,
                                                            minHeight: 320,             // set minimum height of editor
                                                            maxHeight: 500,             // set maximum height of editor
                                                            focus: true,
                                                            toolbar: [
                                                                ['style', ['style']],
                                                                ['font', ['bold', 'underline', 'clear']],
                                                                ['color', ['color']],
                                                                ['para', ['ul', 'ol', 'paragraph']],
                                                                ['table', ['table']],
                                                                ['insert', ['link', 'picture', 'video']],
                                                                ['view', ['fullscreen', 'codeview', 'help']]
                                                            ]
                                                            });
                                                        </script>

                                                    @if ($errors->has('description'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                                    @endif

                                                </div>

                                                {{-- materi --}}
                                                {{-- <div class="col-span-6">

                                                    <label for="advantage-service" class="block mb-2 font-medium text-gray-700 text-md">Materi Bootcamp</label>
                                                    
                                                    <p class="block mb-3 text-sm text-gray-700">
                                                        Materi dengan tema apa di setiap sesi pada Bootcamp ini?
                                                    </p>

                                                    <input placeholder="Tema 1" type="text" name="materi[]" id="materi" autocomplete="materi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('materi[]') }}" required>

                                                    <input placeholder="Teema 2" type="text" name="materi[]" id="materi" autocomplete="materi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('materi[]') }}" required>

                                                    <input placeholder="Teema 3" type="text" name="materi[]" id="materi" autocomplete="materi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('materi[]') }}" required>

                                                    <div id="newMateriRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addMateriRow">
                                                        Tambahkan Materi +
                                                    </button>

                                                </div> --}}

                                                <div class="col-span-6">

                                                    <label for="advantage-service" class="block mb-2 font-medium text-gray-700 text-md">Key Point Kegiatan</label>
                                                    
                                                    <p class="block mb-3 text-sm text-gray-700">
                                                        Pengalaman apa aja yang didapakan dari Kegiatan ini?
                                                    </p>

                                                    <input placeholder="Pengalaman 1" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <input placeholder="Pengalaman 2" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <input placeholder="Pengalaman 3" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>

                                                    <div id="newServicesRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                                        Tambahkan Pengalaman +
                                                    </button>

                                                </div>

                                                {{-- <div class="col-span-6 -mb-6">
                                                    <label for="estimation & revision" class="block mb-3 font-medium text-gray-700 text-md">Ketua Pelaksana Kegiatan</label>
                                                </div> --}}

                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="delivery_time" class="block mb-3 font-medium text-gray-700 text-md">Waktu Pelaksana</label>

                                                    <input placeholder="Waktu pelakasanaan pada kegiatan ini" type="date" name="delivery_time" id="delivery_time" autocomplete="delivery_time" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('delivery_time') }}" required>

                                                    @if ($errors->has('delivery_time'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('delivery_time') }}</p>
                                                    @endif

                                                </div>
                                                
                                                <div class="col-span-6 sm:col-span-3">

                                                    <label for="revision_limit" class="block mb-3 font-medium text-gray-700 text-md">Tempat Pelaksanaan</label>

                                                    <input placeholder="Tempat pelakasanaan pada kegiatan ini" type="text" name="revision_limit" id="revision_limit" autocomplete="revision_limit" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('revision_limit') }}" required>

                                                    @if ($errors->has('revision_limit'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('revision_limit') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="thumbnail" class="block mb-3 font-medium text-gray-700 text-md">Gallery Kegiatan</label>

                                                    <input placeholder="Thumbnail 1" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                    <input placeholder="Thumbnail 2" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                    <input placeholder="Thumbnail 3" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">

                                                    <div id="newThumbnailRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addThumbnailRow">
                                                        Tambahkan Gambar +
                                                    </button>

                                                </div>

                                                {{-- detail bootcamp --}}
                                                {{-- <div class="col-span-6">

                                                    <label for="advantage-user" class="block mb-3 font-medium text-gray-700 text-md">Detail Bootcamp</label>

                                                    <input placeholder="Detail Bootcamp 1" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required>

                                                    <input placeholder="Detail Bootcamp 2" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required>

                                                    <input placeholder="Detail Bootcamp 3" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-user[]') }}" required>
                                                    <div id="newAdvantagesRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addAdvantagesRow">
                                                        Tambahkan Keunggulan +
                                                    </button>

                                                </div> --}}

                                                <div class="col-span-6">

                                                    <label for="note" class="block mb-3 font-medium text-gray-700 text-md">Note </label>

                                                    <input placeholder="Hal yang ingin disampaikan oleh Pada Kegiatan ini?" type="text" name="note" id="note" autocomplete="note" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('note') }}" required>

                                                    @if ($errors->has('note'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('note') }}</p>
                                                    @endif

                                                </div>

                                                <div class="col-span-6">

                                                    <label for="tagline" class="block mb-3 font-medium text-gray-700 text-md">Benefits Kegiatan? 
                                                        <span class="text-gray-400">(??)</span>
                                                    </label>

                                                    <input placeholder="Hal apa yang di dapatkan dari Kegiatan Ini?" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('tagline') }}" required>

                                                    @if ($errors->has('tagline'))
                                                        <p class="text-red-500 mb-3 text-sm">
                                                            {{ $errors->first('tagline') }}
                                                        </p>
                                                    @endif

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
                                                Create Gallery
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
            $("#addMateriRow").click(function() {
                var html = '';
                html += '<input placeholder="Pengalaman yang didapatkan" type="text" name="materi[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

                $('#newMateriRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeServicesRow', function() {
                $(this).closest('#inputFormServicesRow').remove();
            });
        </script>
        
        <script type="text/javascript">
            // add row
            $("#addAdvantagesRow").click(function() {
                var html = '';
                html += '<input placeholder="Keunggulan Kamu" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                html += '<input placeholder="Keunggulan Service" type="text" name="advantage-service[]" id="advantage-service" autocomplete="advantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                html += '<input placeholder="Hal yang di dapatkan dari Kegiatan?" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

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
                html += '<input placeholder="Thumbnail 3" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';

                $('#newThumbnailRow').append(html);
            });

            // remove row
            $(document).on('click', '#removeThumbnailRow', function() {
                $(this).closest('#inputFormThumbnailRow').remove();
            });
        </script>

    @endpush