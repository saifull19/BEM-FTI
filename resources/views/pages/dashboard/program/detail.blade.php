@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                 Program Kerja Devisi {{ $program->devisi ?? '' }}
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                Koordinator Devisi {{ $program->koordinator ?? '' }}
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">

                                <a href="{{ route('member.program.edit', $program->id) }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Update {{ $program->devisi ?? '' }}
                                </a>

                            </div>
                        </div>
                    </div>
                </div>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <div class="pb-4">

                                    {{-- <iframe src="{{ $materi->url ?? '' }}" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="rounded-xl" width="100%" height="500px"></iframe> --}}
                                </div>

                                            <div class="content pt-4 my-4">
                                                <div>
                                                    <!-- The tabs content -->
                                                    <div class="leading-8 text-md">

                                                        <h2 class="text-xl font-semibold"><span class="text-serv-button"> {{ $program->devisi ?? '' }}</span></h2>

                                                        
                                                            
                                                            <div class="mt-4 mb-8 content-description">
                                                                <p>
                                                                    {{ $program->koordinator ?? '' }}
                                                                </p>
                                                            </div>
                                                            
                                                        


                                                            <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <table class="w-full" aria-label="Table">
                                    
                                    <thead>
                                        <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                            
                                            <th class="py-4 text-center" scope="">Program Kerja</th>
                                            <th class="py-4 text-center" scope="">Status Program</th>

                                            <th class="py-4 text-center" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($detail as $key => $mtr)
                                            
                                            <tr class="text-gray-700 border-b">

                                                 {{-- <td class="px-1 py-5 font-bold text-sm">
                                                    {{ $mtr->users_id ?? '' }}
                                                </td> --}}

                                                <td class=" px-1 py-5 text-center">
                                                    
                                                            
                                                            <a  class="font-medium text-center text-black">
                                                                {{ $mtr->program_kerja ?? '' }}
                                                            </a>

                                                </td>
                                                <td class=" px-1 py-5 text-center">
                                                    
                                                            
                                                            <a  class="font-medium text-center text-black">
                                                                -
                                                            </a>

                                                </td>
                                                
                                                <td class="pl-5 px-1 py-5 text-sm text-center">
                                                    {{-- <a href="{{ route('member.program.show', $mtr['id']) }}" class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                         <i class="fas fa-eye fa-lg"></i>
                                                    </a> --}}
                                                    
                                                    <a href="{{ route('member.program.edit', $mtr->id) }}" class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i> 
                                                        
                                                    </a>

                                                    <form class="inline" action="{{ route('member.detail.destroy', $mtr['id']) }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                    <button class=" py-2 mt-2 text-red-500 hover:text-gray-800" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>
                                                        
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            {{-- Empty --}}
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </main>
                    </div>
                </section>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                    
                            </div>
                        </main>
                    </div>
                </section>
    </main>

@endsection