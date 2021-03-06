@extends('layouts.app')

@section('title', 'My Events')

@section('content')

@if (count($webinar))

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                My Event
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ auth()->user()->Webinar()->count() }} Total Event
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">
                                <a href="{{ route('member.event.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Add Event
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="container px-6 mx-auto mt-5">
                    <div class="grid gap-5 md:grid-cols-12">
                        <main class="col-span-12 p-4 md:pt-0">
                            <div class="px-6 py-2 mt-2 bg-white rounded-xl">
                                <table class="w-full" aria-label="Table">
                                    
                                    <thead>
                                        <tr class="font-medium text-left text-gray-900 border-b border-b-gray-600">
                                            <th class="py-4" scope="">Event Details</th>
                                            <th class="py-4" scope="">Instructors</th>
                                            <th class="py-4" scope="">Kuota</th>
                                            <th class="py-4" scope="">Time</th>
                                            <th class="py-4" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($webinar as $key => $wbn)
                                            
                                            <tr class="text-gray-700 border-b">
                                                <td class="w-2/6 px-1 py-5">
                                                    <div class="flex items-center font-medium">
                                                        <div class="relative w-10 h-10 mr-3 rounded-full md:block">

                                                            @if (isset($wbn->photo) != null )

                                                                <img class="object-cover w-full h-full rounded" src="{{ url(Storage::url($wbn->photo)) }}" alt="thumbnail" loading="lazy" />

                                                            @else
                                                            
                                                                <img class="object-cover w-full h-full rounded" src="{{ url('https://randomuser.me/api/portraits/men/3.jpg') }}" alt="" loading="lazy" />
                                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>

                                                            @endif

                                                        </div>

                                                        <div>
                                                            
                                                            <a href="{{ route('member.event.show', $wbn->id) }}" class="font-medium text-black">
                                                                {{ $wbn->title ?? '' }}
                                                            </a>

                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="px-1 py-5 font-medium">
                                                    {{ $wbn->instructors ?? '' }}
                                                </td>

                                                <td class="px-1 py-5 font-medium">
                                                    {{ $wbn->kuota ?? '' }} Orang
                                                </td>

                                                <td class="px-1 py-5 font-medium">
                                                    {{ $wbn->tanggal ?? '' }} | {{ $wbn->waktu ?? '' }}
                                                </td>
                                                
                                                <td class="px-1 py-5 font-medium">
                                                    <a href="{{ route('member.event.show', $wbn['id']) }}" class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </a>
                                                    <a href="{{ route('member.event.edit', $wbn['id']) }}" class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                        
                                                    </a>

                                                    <form action="{{ route('member.event.destroy', $wbn->id) }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                    <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>
                                                        
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            {{-- empty --}}
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </main>
                    </div>
                </section>
    </main>

@else

        <div class="flex h-screen">
            <div class="m-auto text-center">
                <img src="{{ asset('/assets/images/empty-illustration.svg') }}" alt="" class="w-48 mx-auto">
                <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                    There is No Requests Yet
                </h2>
                <p class="text-sm text-gray-400">
                    It seems that you haven???t provided any service. <br>
                    Let???s create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('member.event.create') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Webinar
                    </a>
                </div>
            </div>
        </div>

@endif
    
@endsection