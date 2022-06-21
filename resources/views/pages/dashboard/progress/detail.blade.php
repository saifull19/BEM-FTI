@extends('layouts.app')

@section('title', 'Detail')
@section('content')
    
    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                Tugas {{ $order->user_buyer->name ?? '' }}
                            </h2>
                            <p class="text-sm text-gray-400">
                                Class {{ $service->title ?? '' }}
                            </p>

                        </div>

                        <div class="col-span-4 lg:text-right"></div>

                    </div>
                </div>
                
                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">

                                @foreach ($tugas as $item)
                                    @if ($item->users_id == $order->buyer_id)

                                        @if ($item->users_id == $order->service_id)
                                            
                                        @endif
                                        <div class="flex items-center py-4 mt-4">
                                            <div class="">
                                                <h1 class="font-medium font-bold text-gray-700">
                                                    {{ $item->Materi->title ?? '' }}
                                                </h1>
                                                <p class="py-5 text-sm  font-medium text-gray-700">
                                                  <span class="font-bold">Tugas :</span>   {{ $item->Materi->tugas_materi ?? '' }}
                                                </p>
                                                <p class="mb-3 text-sm font-medium text-gray-700">
                                                    <span class="font-bold mr-5">Upload :</span> {{ $item->created_at->format('d M Y') ?? '' }} <a href="" class="px-3 ml-5 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i> <span class="">Riview</span>
                                                        
                                                    </a>
                                                </p>
                                                

                                                {!! $item->description ?? '' !!}

                                            </div>

                                            <div class="w-1/2">
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </main>
                    </div>
                </section>
            </main>

@endsection