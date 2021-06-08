<?php
  use Illuminate\Support\Facades\Auth;
?>
<x-guest-layout>
  <header>
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-4 py-2">
        <a class="toggleColour flex items-center text-white no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
          href="#">
          <img class="w-10 h-10 mr-4" src="{{ asset('images/logo.svg') }}" alt="HIMFEST Logo">
          <h1>HIMFEST</h1>
        </a>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle"
            class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div
          class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 lg:bg-transparent text-black p-4 lg:p-0 z-20"
          id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center lg:m-0 mb-10">
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-underline py-2 px-4 toggleColour"
                href="#about">About</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-underline py-2 px-4 toggleColour"
                href="#timeline">Timeline</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-underline py-2 px-4 toggleColour"
                href="#guidelines">Guidelines</a>
            </li>
            <li class="mr-3">
              <a class="inline-block text-white no-underline hover:text-underline py-2 px-4 toggleColour"
                href="#prizes">Prizes</a>
            </li>
            <?php
              if(!Auth::check()) {
                echo(
                  '<li class="mr-3">
                    <a class="inline-block text-white no-underline hover:text-underline py-2 px-4 toggleColour"
                      href="/login">Login</a>
                  </li>'
                );
              }
            ?>
          </ul>
          <x-action-button :link="Auth::check() ? route('dashboard') : route('register')" id="navAction" class="mt-4">
            {{ __(Auth::check() ? 'Dashboard' : 'Register') }}
          </x-action-button>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <section id="#" class="pt-24">
      <div class="container px-12 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
          <h1 class="my-4 w-full lg:text-5xl text-3xl font-bold leading-tight">
            Improving Society with Code
          </h1>
          <p class="leading-normal w-full lg:text-2xl text-l mb-8">
            Solve real world problems and create an amazing solution to win amazing prizes!
          </p>
          <x-action-button :link="route('register')" id="navAction" class="text-gray-800 mb-16 md:ml-0">
            {{ __('Get Started') }}
          </x-action-button>
        </div>
        <!--Right Col-->
        <div class="w-full md:w-3/5 py-6 text-center flex justify-center items-center">
          <img class="w-full" src="images/hero.png" alt="HIMFEST 2021" />
        </div>
      </div>

      <div class="relative mt-12 lg:mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink">
          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path
                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"></path>
              <path
                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                id="Path-4" opacity="0.200000003"></path>
            </g>
            <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
              <path
                d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z">
              </path>
            </g>
          </g>
        </svg>
      </div>
    </section>

    <section id="about" class="bg-white shadow-xl border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
          About
        </h1>
        <div class="w-full mb-12">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 sm:w-1/2 p-6 flex flex-col justify-center md:items-end">
            <h3 class="text-3xl font-bold leading-none mb-3">
              UI/UX Competition
            </h3>
            <p class="text-gray-600 mb-8">
              Lomba perancangan mockup UI/UX tingkat SMA/SMK.
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img class="w-auto sm:h-64 mx-auto" src="{{ asset('images/uiux.jpg') }}" alt="UI/UX Competition">
          </div>
        </div>
        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
          <div class="w-auto sm:w-1/2 p-6 mt-6">
            <img class="w-5/6 sm:h-64 mx-auto" src="{{ asset('images/appdev.jpg') }}" alt="App Development Competition">
          </div>
          <div class="w-full sm:w-1/2 p-6 mt-6 flex flex-col justify-center items-start">
            <h3 class="text-3xl font-bold leading-none mb-3">
              App Development Competition
            </h3>
            <p class="text-gray-600 mb-8">
              Lomba pengembangan aplikasi berbasis web atau mobile tingkat Mahasiswa.
            </p>
          </div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 sm:w-1/2 p-6 flex flex-col justify-center md:items-end">
            <h3 class="text-3xl font-bold leading-none mb-3">
              Webinar
            </h3>
            <p class="text-gray-600 mb-8 lg:text-right">
              Webinar tentang bagaimana kita bisa mengembangkan masyarakat melalui kode.
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img class="w-auto sm:h-64 mx-auto" src="{{ asset('images/webinar.jpg') }}" alt="Webinar">
          </div>
        </div>
        <div class="flex flex-wrap flex-col-reverse sm:flex-row">
          <div class="w-auto sm:w-1/2 p-6 mt-6">
            <img class="w-5/6 sm:h-64 mx-auto" src="{{ asset('images/workshop.jpg') }}" alt="Workshop">
          </div>
          <div class="w-full sm:w-1/2 p-6 mt-6 flex flex-col justify-center items-start">
            <h3 class="text-3xl font-bold leading-none mb-3">
              Hands-on Workshops
            </h3>
            <p class="text-gray-600 mb-8">
              Workshop UI/UX untuk siswa SMA/SMK dan workshop app development untuk Mahasiswa.
            </p>
          </div>
        </div>
      </div>
      </div>
    </section>

    <section id="timeline" class="bg-gray-100 border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
          Timeline
        </h1>
        <div class="w-full mb-6">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="container">
          <div class="flex flex-col md:grid grid-cols-9 mx-auto p-2 text-white">
            <!-- left -->
            <div class="flex flex-row-reverse md:contents">
              <div class="bg-indigo-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">3 Mei 2021 - 14 Juni 2021</h3>
                <p class="leading-tight text-left">
                  Pendaftaran
                </p>
              </div>
              <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow">
                </div>
              </div>
            </div>
            <!-- right -->
            <div class="flex md:contents">
              <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow">
                </div>
              </div>
              <div class="bg-indigo-400 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">12 Juli 2021</h3>
                <p class="leading-tight text-left">
                  Webinar "Improving Society with Code" & Technical Meeting
                </p>
              </div>
            </div>
            <!-- left -->
            <div class="flex flex-row-reverse md:contents">
              <div class="bg-indigo-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">13-16 Juni 2021</h3>
                <p class="leading-tight text-left">
                  Workshop
                </p>
              </div>
              <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
              </div>
            </div>
            <!-- right -->
            <div class="flex md:contents">
              <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
              </div>
              <div class="bg-indigo-400 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">12 Juni - 30 Juli 2021</h3>
                <p class="leading-tight text-left">
                  Pelaksanaan Lomba
                </p>
              </div>
            </div>
            <!-- left -->
            <div class="flex flex-row-reverse md:contents">
              <div class="bg-indigo-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">23-30 Juli 2021</h3>
                <p class="leading-tight text-left">
                  Pengumpulan karya dan Pernyataan Orisinalitas Karya
                </p>
              </div>
              <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
              </div>
            </div>
            <!-- right -->
            <div class="flex md:contents">
              <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow">
                </div>
              </div>
              <div class="bg-indigo-400 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">31 Juli 2021 - 7 Juli 2021</h3>
                <p class="leading-tight text-left">
                  Penilaian Karya
                </p>
              </div>
            </div>
            <!-- left -->
            <div class="flex flex-row-reverse md:contents">
              <div class="bg-indigo-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">9 Agustus 2021</h3>
                <p class="leading-tight text-left">
                  Pengumuman Finalis
                </p>
              </div>
              <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
              </div>
            </div>
            <!-- right -->
            <div class="flex md:contents">
              <div class="col-start-5 col-end-6 mr-10 md:mx-auto relative">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow">
                </div>
              </div>
              <div class="bg-indigo-400 col-start-6 col-end-10 p-4 rounded-xl my-4 mr-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">12 Agustus 2021</h3>
                <p class="leading-tight text-left">
                  Presentasi Finalis
                </p>
              </div>
            </div>
            <!-- left -->
            <div class="flex flex-row-reverse md:contents">
              <div class="bg-indigo-400 col-start-1 col-end-5 p-4 rounded-xl my-4 ml-auto shadow-md">
                <h3 class="font-semibold text-lg mb-1">13 Agustus 2021</h3>
                <p class="leading-tight text-left">
                  Pengumuman Juara
                </p>
              </div>
              <div class="col-start-5 col-end-6 md:mx-auto relative mr-10">
                <div class="h-full w-6 flex items-center justify-center">
                  <div class="h-full w-1 bg-blue-800 pointer-events-none"></div>
                </div>
                <div class="w-6 h-6 absolute top-1/2 -mt-3 rounded-full bg-blue-500 shadow"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="guidelines" class="bg-gray-100 border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-8 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
          Guidelines
        </h1>
        <div class="w-full mb-6">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-center">
          <div class="w-full bg-white py-6 rounded-t rounded-b-none overflow-hidden shadow">
            <h2 class="w-full text-center font-bold text-xl px-6">
              UI/UX Competition
            </h2>
            <div class="mt-3 text-gray-800 text-base px-6 mb-5">
              <ul class="text-sm list-decimal p-4">
                <li>Peserta WAJIB merupakan siswa aktif SMA IPA/MA IPA/SMK jurusan IT/RPL/TKL.</li>
                <li>Peserta merupakan tim yang terdiri dari tepat 3 anggota.</li>
                <li>Semua anggota tim WAJIB mengunggah Kartu Pelajar yang nanti akan diverifikasi oleh admin.</li>
                <li>Biaya pendaftaran yang HARUS dibayarkan adalah sebesar Rp 50.000/tim dan mengunggah Bukti Transfer
                  yang nanti akan diverifikasi oleh admin.</li>
                <li>Peserta WAJIB membaca dan memahami seluruh isi dari guidebook.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2 p-6 flex flex-col justify-center">
          <div class="w-full bg-white py-6 rounded-t rounded-b-none overflow-hidden shadow">
            <h2 class="w-full text-center font-bold text-xl px-6">
              App Development Competition
            </h2>
            <div class="mt-3 text-gray-800 text-base px-6 mb-5">
              <ul class="text-sm list-decimal p-4">
                <li>Peserta WAJIB merupakan Mahasiswa aktif S1 jurusan IT.</li>
                <li>Peserta merupakan tim yang terdiri dari tepat 3 anggota.</li>
                <li>Semua anggota tim WAJIB mengunggah Kartu Tanda Mahasiswa yang nanti akan diverifikasi oleh admin.
                </li>
                <li>Biaya pendaftaran yang HARUS dibayarkan adalah sebesar Rp 100.000/tim dan mengunggah Bukti
                  Transfer yang nanti akan diverifikasi oleh admin.</li>
                <li>Peserta WAJIB membaca dan memahami seluruh isi dari guidebook.</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="w-full flex justify-center mt-auto p-6">
          <x-action-button :link="asset('guidebook.pdf')" target="_blank" rel="noopener" class="gradient text-white">
            {{ __('Download Guidebook') }}
          </x-action-button>
        </div>
    </section>

    <section id="prizes" class="bg-gray-100 py-8">
      <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
          Prizes
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-col sm:flex-row justify-center pt-12 my-12 sm:my-4">
          <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
              <h2 class="p-8 text-3xl font-bold text-center border-b-4 text-gray-500">
                2<sup>nd</sup>
              </h2>
              <ul class="w-full text-center text-sm">
                <li class="border-b py-4">UI/UX: Rp 500.000 dan Beasiswa DP3 50%</li>
                <li class="border-b py-4">App Development: Rp 1.000.000</li>
              </ul>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/3 mx-auto lg:mx-0 rounded-lg bg-white mt-6 sm:-mt-6 shadow-lg">
            <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
              <h2 class="w-full p-8 text-3xl font-bold text-center">
                1<sup>st</sup>
              </h2>
              <div class="h-1 w-full gradient my-0 py-0 rounded-t"></div>
              <ul class="w-full text-center text-base font-bold">
                <li class="border-b py-6">UI/UX: Rp 700.000 dan Beasiswa DP3 100%</li>
                <li class="border-b py-6">App Development: Rp 1.400.000</li>
              </ul>
            </div>
          </div>
          <div class="flex flex-col w-5/6 lg:w-1/4 mx-auto lg:mx-0 rounded-none lg:rounded-l-lg bg-white mt-4">
            <div class="flex-1 bg-white text-gray-600 rounded-t rounded-b-none overflow-hidden shadow">
              <h2 class="p-8 text-3xl font-bold text-center border-b-4 text-gray-500">
                3<sup>rd</sup>
              </h2>
              <ul class="w-full text-center text-sm">
                <li class="border-b py-4">UI/UX: Rp 300.000 dan Beasiswa DP3 50%</li>
                <li class="border-b py-4">App Development: Rp 600.000</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="w-full text-center text-sm pt-4">Note: syarat dan ketentuan berlaku.</div>
      </div>
    </section>

    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg"
      xmlns:xlink="http://www.w3.org/1999/xlink">
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
          <g class="wave" fill="#f8fafc">
            <path
              d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z">
            </path>
          </g>
          <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
            <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
              <path
                d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496"
                opacity="0.100000001"></path>
              <path
                d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                opacity="0.100000001"></path>
              <path
                d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z"
                opacity="0.200000003"></path>
            </g>
          </g>
        </g>
      </g>
    </svg>

    <section id="cta" class="container mx-auto text-center py-6 mb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center">
        Join Now!
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
      </div>
      <p class="my-12 text-3xl text-white leading-tight">
        Tunggu apalagi? Buruan! Daftarkan tim-mu sekarang!
      </p>
      <x-action-button :link="route('register')" class="text-gray-800 mb-16">
        {{ __('Register Now') }}
      </x-action-button>
    </section>
  </main>

  <footer class="bg-white">
    <div class="container mx-auto px-8">
      <div class="w-full flex flex-col md:flex-row py-6">
        <div class="flex-1">
          <h4 class="uppercase md:mb-6">Contact</h4>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="mailto:contact@himfobinus.com" class="no-underline hover:underline text-gray-800">Email</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="https://line.me/R/ti/p/jonathanevans" target="_blank" rel="noopener"
                class="no-underline hover:underline text-gray-800">Line</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="https://wa.me/6285855872872" target="_blank" rel="noopener"
                class="no-underline hover:underline text-gray-800">Whatsapp</a>
            </li>
          </ul>
        </div>
        <div class="flex-1">
          <h4 class="uppercase md:mb-6">Social</h4>
          <ul class="list-reset mb-6">
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="https://www.instagram.com/himfo.binusmlg/" target="_blank" rel="noopener"
                class="no-underline hover:underline text-gray-800">Instagram</a>
            </li>
            <li class="mt-2 inline-block mr-2 md:block md:mr-0">
              <a href="https://www.youtube.com/channel/UCv5_20gYnK6uv4bp3ESSO9w" target="_blank" rel="noopener"
                class="no-underline hover:underline text-gray-800">Youtube</a>
            </li>
          </ul>
        </div>

        <div class="flex-1 mb-6 text-black">
          <a class="flex flex-col text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
            href="https://www.dewaweb.com/" target="_blank" rel="noopener">
            <p class=" p-0 text-xs">Powered By</p>
            <img class="w-36 mr-2" src="{{ asset('images/dewaweb.png') }}" alt="Dewaweb Backlink">
          </a>
          <p class="text-xs text-justify">Dewaweb adalah salah satu layanan cloud hosting di Indonesia yang telah
            mendapatkan
            sertifikasi ISO 27001
            (World Class Information Security). Saat ini Dewaweb telah melayani lebih dari 55,000 pelanggan di seluruh
            Indonesia dan memberikan dukungan pelanggan Ninja Support 24/7 via helpdesk, telepon, dan live chat kapan
            pun dibutuhkan.</p>
        </div>
      </div>
  </footer>
</x-guest-layout>