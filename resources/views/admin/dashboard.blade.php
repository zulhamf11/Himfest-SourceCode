<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>ADMIN DASHBOARD</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- google font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <!-- bootstrap scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/admindashboard.css')?>">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .gradient {
            background: linear-gradient(90deg, #1488CC 0%, #2B32B2 100%);
        }
    </style>
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <!--Totally optional :) -->

    @livewireStyles
</head>

<body>

    <!-- Navbar -->
    <nav class="gradient p-2 mt-0 fixed w-full z-10 top-0">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                    <span class="text-2xl pl-2"> Admin Panel </span><br>Welcome, {{ $admins }}</span>
                </a>
            </div>
            <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="mr-3">
                        <div class="inline-block py-2 px-4 text-white no-underline">
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        @if(Session::get('fail'))
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('fail') }}
        </div>
        @endif
        @if(Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ Session::get('success') }}
        </div>
        @endif
    </nav>

    <!-- End of Navbar -->

    <!-- Body content -->
    <div class="container mt-24 md:mt-16">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title card-tittlec">Jumlah Team</h5>
                        <p class="card-text card-textc">{{$team->count()}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title card-tittlec">Jumlah Peserta</h5>
                        <p class="card-text card-textc">{{$member->count()}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Table -->

    <livewire:datatable />

    <!-- End of Team Table -->


    <!-- Member Table -->

    <livewire:membertable />

    <!-- End of Member Table -->

    <!-- End of Body content-->

    <!-- Script -->
    @livewireScripts
    <!-- End of Script -->
</body>

</html>