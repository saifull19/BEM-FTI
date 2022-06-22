<!DOCTYPE html>
<html lang="{{ str_replace('_', '_', app()->getlocale()) }}">
    <head>
        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            {{-- csrf toke --}}
            <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="theme-color" content="#000000" />
        <link rel="shortcut icon" href="{{ asset('/assets/favicon.png') }}" />
        
        <link
            rel="stylesheet"
            href="{{ url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="{{ url('https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css') }}"
        />
        <title>Organisasi | BEM FTI</title>
    </head>

    <body class="text-gray-800 antialiased">
        
        <nav
            class="top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3"
        >
            <div
                class="container px-4 mx-auto flex flex-wrap items-center justify-between"
            >
                <div
                    class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
                >
                    <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="{{ route('index') }}">
                        <img src="{{ asset('/assets/favicon.png') }}" alt="" class="ml-6 h-12 w-12">
                    </a>
                    
                    <button
                        class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                        type="button"
                        onclick="toggleNavbar('example-collapse-navbar')"
                    >
                        <i class="text-white fas fa-bars"></i>
                    </button>
                
                </div>
                
                <div
                    class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
                    id="example-collapse-navbar"
                >
                    <ul class="flex flex-col lg:flex-row list-none mr-auto">
                        <li class="flex items-center">
                
                            <a
                                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="{{ route('create') }}"
                                ><i
                                    class="lg:text-gray-300 text-gray-500 far fa-file-alt text-lg leading-lg mr-2"
                                ></i>
                                Docs</a
                            >
                        </li>
                    </ul>
                
                    <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                        <li class="flex items-center">
                            <a
                                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="#pablo"
                                ><i
                                    class="lg:text-gray-300 text-gray-500 fab fa-facebook text-lg leading-lg"
                                ></i>
                                
                                <span class="lg:hidden inline-block ml-2">Share</span>
                            </a
                            >
                        </li>

                        <li class="flex items-center">
                            <a
                                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="#pablo"
                                ><i
                                    class="lg:text-gray-300 text-gray-500 fab fa-twitter text-lg leading-lg"
                                ></i>

                                <span class="lg:hidden inline-block ml-2">Tweet</span>
                            </a>
                        </li>

                        <li class="flex items-center">
                            <a
                                class="lg:text-white lg:hover:text-gray-300 text-gray-800 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                                href="#pablo"
                                ><i
                                    class="lg:text-gray-300 text-gray-500 fab fa-github text-lg leading-lg"
                                ></i
                                ><span class="lg:hidden inline-block ml-2"
                                    >Star</span
                                >
                            </a>
                        </li>

                        <li class="flex items-center">

                            @auth

                                <a href="{{ route('member.dashboard.index') }}" class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s">
                                            MyDashboard
                                        </a>
                                @if (auth()->user()->detail_user()->first()->photo != NULL)
  
                                    <img src="{{ url(Storage::url(auth()->user()->detail_user()->first()->photo)) }}" alt="Photo Profile" class="inline object-cover ml-3 h-12 w-12 rounded-full">
        
                                @else    
                                                        
                                    <img class="inline ml-3 h-12 w-12 rounded-full" src="{{ url('https://randomuser.me/api/portraits/men/1.jpg') }}" alt="">
    
                                @endif

                            @endauth

                            @guest
                                <button onclick="toggleModal('loginModal')" class="bg-white text-gray-800 active:bg-gray-300 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3" style="transition: all 0.15s ease 0s">
                                        Login
                                </button>
                            @endguest

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <main>
            <div
            class="relative pt-16 pb-32 flex content-center items-center justify-center"
            style="min-height: 75vh"
            >      
                <div
                    class="absolute top-0 w-full h-full bg-center bg-cover"
                    style="
                        background-image: url('{{ url('https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1267&amp;q=80') }}');
                    ">
                    <span
                        id="blackOverlay"
                        class="w-full h-full absolute opacity-75 bg-black"
                    ></span>
                </div>

                <div class="container relative  mx-auto">
                    <div class="items-center flex flex-wrap">
                        <div
                            class="w-full lg:w-6/12 mt-10 px-4 ml-auto mr-auto text-center"
                        >
                            <div class="pr-12">
                                <h1 class="text-white font-semibold text-5xl">
                                    Rekrut Talenta Digital Terbaik Untuk Tim Anda
                                </h1>

                                <p class="mt-4 text-lg text-gray-300">
                                    Lulusan terbaik UWHcamp telah melalui pelatihan Pemrogaman intensif dengan kurikulum terupdate. Jadi Hiring Partner kami dan mulai rekrutmen sekarang!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
                    style="height: 70px"
                >
                    <svg
                        class="absolute bottom-0 overflow-hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none"
                        version="1.1"
                        viewBox="0 0 2560 100"
                        x="0"
                        y="0"
                    >
                        <polygon
                            class="text-gray-300 fill-current"
                            points="2560 0 2560 100 0 100"
                        ></polygon>

                    </svg>
                </div>
            </div>

            <section class="pb-20 bg-gray-300 -mt-24">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap">
                        <div
                            class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center"
                        >
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            >
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400"
                                    >
                                        <i class="fas fa-award"></i>
                                    </div>

                                    <h6 class="text-xl font-semibold">
                                        Teknologi Terkini
                                    </h6>

                                    <p class="mt-2 mb-4 text-gray-600">
                                        UWHcamp hanya menggunakan kurikulum dan teknologi terkini untuk pendidikan para siswa. Kami pastikan siswa kami mendapatkan pelatihan dan pendidikan yang up-to-date dan intensif.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="w-full md:w-4/12 px-4 text-center">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            >
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400"
                                    >
                                        <i class="fas fa-retweet"></i>
                                    </div>

                                    <h6 class="text-xl font-semibold">
                                        Efisien & Produktif
                                    </h6>

                                    <p class="mt-2 mb-4 text-gray-600">
                                        Dengan akses ke Hiring Portal kami Anda bisa melihat profil setiap kandidat dalam satu kali klik. Dengan fitur "filter" Anda dapat melihat kandidat dengan kualifikasi yang diinginkan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
                            >
                                <div class="px-4 py-5 flex-auto">
                                    <div
                                        class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400"
                                    >
                                        <i class="fas fa-fingerprint"></i>
                                    </div>

                                    <h6 class="text-xl font-semibold">
                                        Kualifikasi Talenta yang Terukur
                                    </h6>

                                    <p class="mt-2 mb-4 text-gray-600">
                                        Siswa UWHcamp lulus dengan standar nilai dan melalui Final Project Evaluation yang membuat alumni UWHcamp adalah talenta IT yang siap kerja.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center mt-32">
                        <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                            <div
                                class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                            >
                                <i class="fas fa-user-friends text-xl"></i>
                            </div>

                            <h3
                                class="text-3xl mb-2 font-semibold leading-normal"
                            >
                                Mengapa Merekrut Lulusan UWHcamp
                            </h3>

                            <p
                                class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700"
                            >
                                Berikut adalah alasan kenapa lulusan kami siap untuk direkrut perusahaan.
                            </p>
                            
                            <p class="font-bold text-gray-800 mt-3 "> <i class="text-pink-600 mr-2 fas fa-check"></i> 
                                Problem solver yang gigih.</p>

                            <p class="font-bold text-gray-800 mt-3"><i class="text-pink-600 mr-2 fas fa-check"></i>Memiliki growth mindset.</p>

                            <p class="font-bold text-gray-800 mt-3"><i class="text-pink-600 mr-2 fas fa-check"></i>Skill dan pengetahuan yang relevan dengan tren terkini.</p>

                            <p class="font-bold text-gray-800 mt-3"><i class="text-pink-600 mr-2 fas fa-check"></i>Memiliki Motivasi Tinggi</p>

                        </div>

                        <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-600"
                            >
                                <img
                                    alt="..."
                                    src="{{ url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1051&amp;q=80') }}"
                                    class="w-full align-middle rounded-t-lg"
                                />
                                <blockquote class="relative p-8 mb-4">
                                    <svg
                                        preserveAspectRatio="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 583 95"
                                        class="absolute left-0 w-full block"
                                        style="height: 95px; top: -94px"
                                    >
                                        <polygon
                                            points="-30,95 583,95 583,65"
                                            class="text-pink-600 fill-current"
                                        ></polygon>
                                    </svg>

                                    <h4 class="text-xl font-bold text-white">
                                        Akses Hiring Portal
                                    </h4>

                                    <p
                                        class="text-md font-light mt-2 text-white"
                                    >
                                        UWHcamp akan memberikan akses ke Hiring Portal di mana Anda dapat dengan mudah mencari programmer/developer yang sesuai untuk tim Anda.
                                    </p>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative py-10">
                <div
                    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                    style="height: 80px"
                >
                    <svg
                        class="absolute bottom-0 overflow-hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none"
                        version="1.1"
                        viewBox="0 0 2560 100"
                        x="0"
                        y="0"
                    >
                        <polygon
                            class="text-white fill-current"
                            points="2560 0 2560 100 0 100"
                        ></polygon>
                    </svg>
                </div>

                <div class="container mx-auto px-4">
                    <div class="items-center flex flex-wrap">
                        <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                            <img
                                alt="..."
                                class="max-w-full rounded-lg shadow-lg"
                                src="{{ url('https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=634&amp;q=80') }}"
                            />
                        </div>

                        <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                            <div class="md:pr-12">
                                <div
                                    class="text-pink-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-pink-300"
                                >
                                    <i class="fas fa-rocket text-xl"></i>
                                </div>

                                <h3 class="text-3xl font-semibold">
                                    Profesi yang Bisa Ditempati Oleh Lulusan Kami
                                </h3>

                                <p
                                    class="mt-4 text-lg leading-relaxed text-gray-600"
                                >
                                    The extension comes with three pre-built
                                    pages to help you get started faster. You
                                    can change the text and images and you're
                                    good to go.
                                </p>

                                <ul class="list-none mt-6">
                                    <li class="py-2">
                                        <div class="flex items-center text-lg">
                                            <div>
                                                <span
                                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                                    ><i
                                                        class="fas fa-fingerprint"
                                                    ></i
                                                ></span>
                                            </div>

                                            <div>
                                                <h4 class="text-gray-600 font-bold">
                                                    Data Scientist
                                                </h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="py-2">
                                        <div class="flex items-center text-lg">
                                            <div>
                                                <span
                                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                                    ><i class="fab fa-html5"></i
                                                ></span>
                                            </div>

                                            <div>
                                                <h4 class="text-gray-600 font-bold">
                                                    Fullstack Developer
                                                </h4>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="py-2">
                                        <div class="flex items-center text-lg">
                                            <div>
                                                <span
                                                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-pink-600 bg-pink-200 mr-3"
                                                    ><i
                                                        class="far fa-paper-plane"
                                                    ></i
                                                ></span>
                                            </div>

                                            <div>
                                                <h4 class="text-gray-600 font-bold">
                                                    Digital Marketing
                                                </h4>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pt-20 pb-48">
                <div class="container mx-auto px-4">
                    <div
                        class="flex flex-wrap justify-center text-center mb-24"
                    >
                        <div class="w-full lg:w-6/12 px-4">
                            <h2 class="text-4xl font-semibold">
                                Lulusan Kami yang Berbakat
                            </h2>

                            <p
                                class="text-lg leading-relaxed m-4 text-gray-600"
                            >
                                Terlepas dari pendidikan terakhir mereka, siswa UWHcamp belajar dan lulus proses pelatihan intensif dengan ketekunan dan kemauan yang kuat. Berikut ini beberapa lulusan terbaik UWHcamp yang telah sukses memulai karirnya.
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap">
                        <div
                            class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4"
                        >
                            <div class="px-6">
                                <img
                                    alt="..."
                                    src="{{ asset('assets/images/avatar/8.jpg') }}"
                                    class="shadow-lg rounded-full max-w-full mx-auto"
                                    style="max-width: 120px"
                                />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">
                                        Ryan Tompson
                                    </h5>

                                    <p
                                        class="mt-1 text-sm text-gray-500 uppercase font-semibold"
                                    >
                                        Web Developer
                                    </p>

                                    <div class="mt-6">
                                        <button
                                            class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-twitter"
                                            ></i>
                                        </button>
                                        
                                        <button
                                            class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-facebook-f"
                                            ></i>
                                        </button>
                                        <button
                                            class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i class="fab fa-dribbble"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4"
                        >
                            <div class="px-6">
                                <img
                                    alt="..."
                                    src="{{ asset('assets/images/avatar/9.jpg') }}"
                                    class="shadow-lg rounded-full max-w-full mx-auto"
                                    style="max-width: 120px"
                                />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">
                                        Romina Hadid
                                    </h5>

                                    <p
                                        class="mt-1 text-sm text-gray-500 uppercase font-semibold"
                                    >
                                        Marketing Specialist
                                    </p>

                                    <div class="mt-6">
                                        <button
                                            class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button"
                                        >
                                            <i
                                                class="fab fa-google"
                                            ></i>
                                        </button>

                                        <button
                                            class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i class="fab fa-facebook-f"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4"
                        >
                            <div class="px-6">
                                <img
                                    alt="..."
                                    src="{{ asset('assets/images/avatar/7.jpg') }}"
                                    class="shadow-lg rounded-full max-w-full mx-auto"
                                    style="max-width: 120px"
                                />
                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">
                                        Alexa Smith
                                    </h5>

                                    <p
                                        class="mt-1 text-sm text-gray-500 uppercase font-semibold"
                                    >
                                        UI/UX Designer
                                    </p>

                                    <div class="mt-6">
                                        <button
                                            class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-google"
                                            ></i>
                                        </button>

                                        <button
                                            class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-twitter"
                                            ></i>
                                        </button>

                                        <button
                                            class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button"
                                        >
                                            <i class="fab fa-instagram"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4"
                        >
                            <div class="px-6">
                                <img
                                    alt="..."
                                    src="{{ asset('assets/images/avatar/10.jpg') }}"
                                    class="shadow-lg rounded-full max-w-full mx-auto"
                                    style="max-width: 120px"
                                />

                                <div class="pt-6 text-center">
                                    <h5 class="text-xl font-bold">
                                        Jenna Kardi
                                    </h5>

                                    <p
                                        class="mt-1 text-sm text-gray-500 uppercase font-semibold"
                                    >
                                        Founder and CEO
                                    </p>

                                    <div class="mt-6">
                                        <button
                                            class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-dribbble"
                                            ></i>
                                        </button>
                                        
                                        <button
                                            class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-google"
                                            ></i>
                                        </button>

                                        <button
                                            class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i
                                                class="fab fa-twitter"
                                            ></i>
                                        </button>

                                        <button
                                            class="bg-gray-800 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                            type="button">
                                            <i class="fab fa-instagram"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="pb-20 relative block bg-gray-900">
                <div
                    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                    style="height: 80px"
                >
                    <svg
                        class="absolute bottom-0 overflow-hidden"
                        xmlns="http://www.w3.org/2000/svg"
                        preserveAspectRatio="none"
                        version="1.1"
                        viewBox="0 0 2560 100"
                        x="0"
                        y="0"
                    >
                        <polygon
                            class="text-gray-900 fill-current"
                            points="2560 0 2560 100 0 100"
                        ></polygon>
                    </svg>
                </div>

                <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                    <div class="flex flex-wrap text-center justify-center">
                        <div class="w-full lg:w-6/12 px-4">
                            <h2 class="text-4xl font-semibold text-white">
                                Siap untuk Merekrut?
                            </h2>

                            <p
                                class="text-lg leading-relaxed mt-4 mb-4 text-gray-500"
                            >
                                Bagaimana Cara Menjadi Hiring Partner Kami?
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-wrap mt-12 justify-center">
                        <div class="w-full lg:w-3/12 px-4 text-center">
                            <div
                                class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                            >
                                <i class="fas fa-medal text-xl"></i>
                            </div>

                            <h6 class="text-xl mt-5 font-semibold text-white">
                                Pendaftaran
                            </h6>

                            <p class="mt-2 mb-4 text-gray-500">
                                Isi formulir pendaftaran dan tim UWHcamp akan menghubungi Anda.
                            </p>
                        </div>

                        <div class="w-full lg:w-3/12 px-4 text-center">
                            <div
                                class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                            >
                                <i class="fas fa-poll text-xl"></i>
                            </div>

                            <h5 class="text-xl mt-5 font-semibold text-white">
                                Syarat dan Ketentuan
                            </h5>

                            <p class="mt-2 mb-4 text-gray-500">
                                Tim kami akan mengirimkan syarat dan ketentuan menjadi Hiring Partner yang akan ditanda tangani oleh Anda dan UWHcamp.
                            </p>
                        </div>

                        <div class="w-full lg:w-3/12 px-4 text-center">
                            <div
                                class="text-gray-900 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                            >
                                <i class="fas fa-lightbulb text-xl"></i>
                            </div>

                            <h5 class="text-xl mt-5 font-semibold text-white">
                                Akses Hiring Portal
                            </h5>

                            <p class="mt-2 mb-4 text-gray-500">
                                UWHcamp akan memberikan akses ke Hiring Portal di mana Anda dapat dengan mudah mencari programmer/developer yang sesuai untuk tim Anda.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="relative block py-24 lg:pt-0 bg-gray-900">
                <div class="container mx-auto px-4">
                    <div class="flex flex-wrap justify-center lg:-mt-64 -mt-48">
                        <div class="w-full lg:w-6/12 px-4">
                            <div
                                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300"
                            >
                                <div class="flex-auto p-5 lg:p-10">
                                    <h4 class="text-2xl font-semibold">
                                       Siap untuk Merekrut?

                                    </h4>

                                    <p
                                        class="leading-relaxed mt-1 mb-4 text-gray-600"
                                    >
                                        Isi form berikut dan bangun tim IT idaman Anda.
                                    </p>

                                    <div class="relative w-full mb-3 mt-8">
                                        <label
                                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                            for="full-name"
                                            >Full Name</label
                                        ><input
                                            type="text"
                                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                            placeholder="Full Name"
                                            style="
                                                transition: all 0.15s ease 0s;
                                            "
                                        />
                                    </div>

                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                            for="email"
                                            >Email</label
                                        ><input
                                            type="email"
                                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                            placeholder="Email"
                                            style="
                                                transition: all 0.15s ease 0s;
                                            "
                                        />
                                    </div>

                                    <div class="relative w-full mb-3">
                                        <label
                                            class="block uppercase text-gray-700 text-xs font-bold mb-2"
                                            for="message"
                                            >Message</label
                                        ><textarea
                                            rows="4"
                                            cols="80"
                                            class="border-0 px-3 py-3 placeholder-gray-400 text-gray-700 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full"
                                            placeholder="Type a message..."
                                        ></textarea>
                                    </div>

                                    <div class="text-center mt-6">
                                        <button
                                            class="bg-gray-900 text-white active:bg-gray-700 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1"
                                            type="button"
                                            style="
                                                transition: all 0.15s ease 0s;
                                            "
                                        >
                                            Kirim Formulir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="relative bg-gray-300 pt-8 pb-6">
            <div
                class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
                style="height: 80px"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="text-gray-300 fill-current"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>

            <div class="container mx-auto px-4">
                <div class="mt-8 sm:mt-0 sm:w-full flex flex-col md:flex-row justify-between">
                            <div class="flex-1 mt-2 flex-col">
                                <h2 class="font-medium text-gray-600 font-bold text-lg mb-4">Company</h2>
                                
                                <div class="my-3">
                                    <a href="{{ route('index') }}" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Home
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="{{ route('explore.landing') }}" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Bootcamp
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Professional Development
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Corporate
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        About
                                    </a>
                                </div>
                            </div>

                            <div class="flex-1 mt-2 flex-col">
                                <h4 class="font-medium text-gray-600 font-bold text-lg mt-4 md:mt-0 mb-4">Featured Services</h4>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Programming &amp; Tech
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Graphics &amp; Design
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Digital Marketing
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Business
                                    </a>
                                </div>
                            </div>

                            <div class="flex-1 mt-2 flex-col">
                                <h4 class="font-medium text-gray-600 font-bold text-lg mt-4 md:mt-0 mb-4">Our Community</h4>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Instagram
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Telegram
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Facebook
                                    </a>
                                </div>

                                <div class="my-3">
                                    <a href="#" class="text-gray-600 hover:text-gray-700 font-normal">
                                        Discord
                                    </a>
                                </div>
                            </div>

                            <div class="flex-1 mt-2 flex-col lg:mr-28">
                                <h4 class="font-medium text-gray-600 font-bold text-lg mt-4 md:mt-0 mb-4">
                                    Get Weekly Updates & Tips
                                </h4>

                                <div class="my-3">
                                    <p class="text-gray-600 hover:text-gray-700 font-normal">
                                        Berlangganan buletin kami untuk mendapatkan berita mingguan, pembaruan, kiat, dan penawaran khusus Anda. Di setiap hari Senin!
                                    </p>

                                    <div class="flex flex-wrap items-stretch w-full mt-4 relative h-15 hover:text-black font-bold bg-serv-email rounded-lg items-center rounded mb-2 pr-5">
                                        <div class="flex -mr-px justify-center w-15 p-4">
                                            <span
                                            class="flex items-center leading-normal bg-serv-email px-3 border-0 rounded rounded-r-none text-2xl text-gray-600"
                                            >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="2" y="5" width="20" height="14" rx="3" fill="#22B07D"/>
                                            <path d="M5 8L12 12L19 8" stroke="#0F3040" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>                                        
                                            </span>
                                        </div>
                                        
                                    </div>

                                    <button onclick="toggleModal('loginModal')" id="navAction" class="mx-auto lg:mx-0 hover:underline bg-gray-700 text-white font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                                    Subscribe
                                    </button>

                                </div>
                            </div>
                        </div>
                <hr class="my-6 border-gray-400" />
                <div
                    class="flex flex-wrap items-center md:justify-between justify-center"
                >
                    <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                        <div class="text-sm text-gray-600 font-semibold py-1">
                            Copyright © 2022 UWHcamp
                            <a
                                href="#"
                                class="text-gray-600 hover:text-gray-900"
                                >Creative Tim</a
                            >.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        @include('components.modal.login')
        @include('components.modal.register')
        
        <script src="{{ asset('/js/toggleModal.js') }}"></script>
        {{-- <script src="{{ asset('/js/bootstrap.min.js') }}"></script> --}}
        <script>
            $(document).ready(function() {
                $(".modal").on('click', ':not(.relative)', function (e) {
                    e.stopPropagation();
                });
                $("#loginModal").on('click', function (e) {
                    toggleModal('loginModal');
                });
                $("#registerModal").on('click', function (e) {
                    toggleModal('registerModal');
                });
            });
        </script>
        <script>
            function toggleNavbar(collapseID) {
                document.getElementById(collapseID).classList.toggle("hidden");
                document.getElementById(collapseID).classList.toggle("block");
            }
        </script>
    </body>
</html>
