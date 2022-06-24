@extends('layouts.app')

@section('title', 'Edit, My Bootcamp')

@section('content')

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-12">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Update {{ $program->devisi ?? ''}}
                            </h2>

                            <p class="text-sm text-gray-400">
                                Update the Program Kerja devisi {{ $program->devisi ?? ''}}
                            </p>

                        </div>
                    </div>
                </div>

                <!-- breadcrumb -->
                <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
                    <ol class="inline-flex p-0 list-none">

                        <li class="flex items-center">
                            <a href="{{ route('member.materi.index') }}" class="text-gray-400">My Organisasi</a>
                            <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                            </svg>
                        </li>

                        <li class="flex items-center">
                            <a href="#" class="font-medium">Update Your Struktural Organisani</a>
                        </li>

                    </ol>
                </nav>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                                <form action="{{ route('member.program.update', [$program->id]) }}" method="POST" enctype="multipart/form-data">

                                    @method('PUT')
                                    @csrf

                                    <div class="">
                                        <div class="px-4 py-5 sm:p-6">

                                            <div class="grid grid-cols-6 gap-6">


                                                <div class="col-span-6 -mb-6">

                                                    <label for="devisi" class="block mb-3 font-medium text-gray-700 text-md">Devisi</label>

                                                </div>

                                                <div class="col-span-6 ">
                                                    <input placeholder="Devisi Organisasi Periode" type="text" name="devisi" id="devisi" autocomplete="devisi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $program->devisi ?? '' }}" required>

                                                    @if ($errors->has('devisi'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('devisi') }}</p>
                                                    @endif

                                                </div>
                                                
                                                <div class="col-span-6 -mb-6">

                                                    <label for="koordinator" class="block mb-3 font-medium text-gray-700 text-md">Koordinator</label>

                                                </div>

                                                <div class="col-span-6 ">
                                                    <input placeholder="KoordinatorDevisi " type="text" name="koordinator" id="koordinator" autocomplete="koordinator" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $program->koordinator ?? '' }}" required>

                                                    @if ($errors->has('koordinator'))
                                                        <p class="text-red-500 mb-3 text-sm">{{ $errors->first('koordinator') }}</p>
                                                    @endif

                                                </div>

                                                 <div class="col-span-6">

                                                    <label for="program_kerja" class="block mb-2 font-medium text-gray-700 text-md">Program Kerja</label>
                                                    
                                                    <p class="block mb-3 text-sm text-gray-700">
                                                        Sebutkan Program Kerja apa saja yang ada pada devisi anda?
                                                    </p>

                                                    @forelse ($detail_program as $item)
                                                    
                                                        <input placeholder="Keunggulan Bootcamp" type="text" name="{{ ('details['.$item->id.']') }}" id="materi" autocomplete="materi" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ $item->program_kerja ?? '' }}" required>

                                                    @empty
                                                        empty
                                                    @endforelse

                                                    <div id="newServicesRow"></div>

                                                    <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                                        Tambahkan Pengalaman +
                                                    </button>

                                                </div>

                                                
                                                
                                            </div>

                                        </div>
                                    </div>

                                    

                                        <div class="px-4 py-3 text-right sm:px-6">

                                            <a href="{{ route('member.program.index') }}" type="button" class="inline-flex justify-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved !')">
                                                Cancel
                                            </a>

                                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" onclick="return confirm('Are you sure want to submit this data ?')">
                                                Create Materi
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
           
            $("#addServicesRow").click(function() {
                var html = '';
                html += '<input placeholder="Program Kerja" type="text" name="detail[]" id="description" autocomplete="description" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';

                $('#newServicesRow').append(html);
            });

            $(document).on('click', '#removeDescriptionRow', function() {
                $(this).closest('#inputFormDescriptionRow').remove();
            });
        </script>
        
       
@endpush
