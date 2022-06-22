
<a href="{{ route('detail.landing', $service->slug) }}" class="inline-block px-3">
    <div class="w-80 h-90 overflow-hidden md:p-5 p-4 bg-white hover:bg-gray-200 rounded-2xl inline-block">
        <div class="flex items-center space-x-2 mb-6">
            
            <!--Author's profile photo-->
            @if ($service->user->detail_user->photo != NULL)

                <img src="{{ url(Storage::url($service->user->detail_user->photo)) }}" alt="photo freelancer" loading="lazy" class="w-14 h-14 object-cover rounded-full mr-1">

            @else
            
                <img class="w-14 h-14 object-cover object-center rounded-full mr-1"
                src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="random user" />

            @endif

            <div>
                <!--Author name-->
                <p class="text-gray-900 font-semibold text-lg">{{ $service->user->name ?? '' }}</p>
                <p class="text-serv-text font-light text-md">
                    {{ $service->user->detail_user->role ?? '' }}
                </p>
            </div>
        </div>

        <!--Banner image-->

        @if ($service->thumbnail_service[0]->thumbnail != NULL)

            <img src="{{ url(Storage::url($service->thumbnail_service[0]->thumbnail)) }}" alt="photo freelancer" loading="lazy" class="w-full h-30 object-cover rounded-2xl ">

        @else
            
            <img class="rounded-2xl w-full" src="{{ url('https://via.placeholder.com/750x500') }}" alt="placeholder" />

        @endif

        <!--Title-->
        <h1 class="font-semibold text-gray-900 text-lg mt-1 leading-normal pt-4">
            {{ $service->title ?? '' }}
        </h1>
        <p class=" text-gray-900 text-sm pb-4 mt-1 leading-normal">
            {{ $service->note ?? '' }}
        </p>
        <!--Description-->
        <div class="max-w-full">
            @include('components.landing.rating')
        </div>

        <div class="text-center mt-5 flex justify-between w-full">
            <span
                class="text-serv-text mr-3 inline-flex items-center leading-none text-md py-1 ">
                Ketua Pelaksana
            </span>
            <span
                class="text-serv-button inline-flex items-center leading-none text-md font-semibold">
               {{ $service->price ?? '' }}
            </span>
        </div>
    </div>
</a>