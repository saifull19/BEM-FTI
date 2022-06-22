@extends('layouts.app')

@section('title', 'Struktur Organisasi')

@section('content')

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                 {{ $materi->title ?? '' }}
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                Detail {{ $materi->title ?? '' }}
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">

                                <a href="{{ route('member.materi.edit', $materi['id']) }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Update {{ $materi->title ?? '' }}
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

                                                        <h2 class="text-xl font-semibold"><span class="text-serv-button"> {{ $materi->title ?? '' }}</span></h2>

                                                        
                                                            
                                                            <div class="mt-4 mb-8 content-description">
                                                                <p>
                                                                    {!! $materi->url ?? '' !!}
                                                                </p>
                                                            </div>
                                                            
                                                        


                                                        {{-- <h3 class="my-4 text-lg font-semibold">Tugas Materi ?</h3>

                                                        <p class="font-semibold">
                                                            {{ $materi->tugas_materi ?? '' }}
                                                        </p> --}}
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                    
                            </div>
                        </main>
                    </div>
                </section>
    </main>

@endsection