@extends('layouts.app')

@section('title', 'My Role')

@section('content')

@if (count($role))

    <main class="h-full overflow-y-auto">

                <div class="container mx-auto">
                    <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                        <div class="col-span-8">

                            <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                                My Roles
                            </h2>
                            
                            <p class="text-sm text-gray-400">
                                {{ $role->count() }} Total Roles
                            </p>
                        </div>
                        
                        <div class="col-span-4 lg:text-right">
                            <div class="relative mt-0 md:mt-6">
                                <a href="{{ route('admin.role.create') }}" class="inline-block px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                                    + Add Role
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
                                        <tr class="text-sm font-normal text-left text-gray-900 border-b border-b-gray-600">
                                            <th class="py-4" scope="">Role Details</th>
                                            <th class="py-4" scope="">Status</th>
                                            <th class="py-4" scope="">Action</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white">

                                        @forelse ($role as $rle)
                                            
                                            <tr class="text-gray-700 border-b">

                                                <td class="px-1 py-5 text-sm">
                                                    {{ $rle->role_user ?? '' }}
                                                </td>

                                                <td class="px-1 py-5 text-sm text-green-500 text-md">
                                                    {{ 'Active' }}
                                                </td>

                                                <td class="px-1 py-5 text-sm">
                                                    <a href="{{ route('admin.role.show', $rle->id) }}" class="py-2 mt-2 text-serv-yellow hover:text-gray-800">
                                                        <i class="fas fa-eye fa-lg"></i>
                                                    </a>
                                                    <a href="{{ route('admin.role.edit', $rle['id']) }}" class="px-3 py-2 mt-2 text-green-500 hover:text-gray-800">
                                                        <i class="fas fa-edit fa-lg"></i>
                                                        
                                                    </a>

                                                    <form action="{{ route('admin.role.destroy', $rle->id) }}" method="post" >
                                                    @method('delete')
                                                    @csrf
                                                    <button class="ml-4 py-2 mt-2 text-red-500 hover:text-gray-800" onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash-alt fa-lg"></i>
                                                        
                                                    </button>
                                                    </form>
                                                </td>
                                            </tr>

                                        @empty
                                            
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
                    It seems that you haven’t provided any service. <br>
                    Let’s create your first service!
                </p>

                <div class="relative mt-0 md:mt-6">
                    <a href="{{ route('admin.webinar.create') }}" class="px-4 py-2 mt-2 text-left text-white rounded-xl bg-serv-button">
                        + Add Role
                    </a>
                </div>
            </div>
        </div>

@endif
    
@endsection