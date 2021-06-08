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
</head>
<body>

    <!-- Navbar -->
    <header>
        <div class="left_area">
            <h3>Admin <span>Panel</span> Welcome, {{ $admins }}</h3>
            
        </div>
        <div class="right_area">
        <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
            <button type="submit" class="logout_btn">Logout</button>
            </form>
        </div>
        @if(Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ Session::get('fail') }}
                    </div>
                @endif
    </header>
    <!-- End of Navbar -->

    <!-- Body content -->
    <div class="container">
        <div class="row">
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                    <h5 class="card-title">Jumlah Team</h5>
                    <p class="card-text">{{$team->count()}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-3"></div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Peserta</h5>
                    <p class="card-text">{{$member->count()}}</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Team Table -->
    <h3 class="h3-team">Teams : {{ $team->count() }}</h3>
                    <table class="table table-bordered team-table">
                        <thead>
                            <tr>
                            <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">Team ID</th>
                            <th scope="col">Team Name</th>
                            <th scope="col">Leader ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Referrer</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Download Answer</th>
                            <th scope="col">Download Bukti Bayar</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($team as $teams)
                            <tr>
                            <th scope="row">{{  $teams['id'] }}</th>
                            <td>{{  $teams['name'] }}</td>
                            <td>{{  $teams['leader_id'] }}</td>
                            <td>{{  $teams['category'] }}</td>
                            <td>{{  $teams['referrer'] }}</td>
                            <td><?php $check = $teams['payment_proof_file_path'];
                            if($check == NULL){
                                echo "Belum bayar";
                            }else{
                                echo "Sudah bayar";
                            }?></td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                <input id="type" type="hidden" name="type" value="submission" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                <input id="type" type="hidden" name="type" value="payment_proof" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
    
    <!-- End of Team Table -->

    <!-- Member Table -->

    <h3 class="h3-member">Members : {{ $member->count() }}</h3>
                    <table class="table table-bordered member-table">
                        <thead>
                            <tr>
                            <th scope="col">Member ID</th>
                            <th scope="col">Team ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Line ID</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Download Student Card</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $members)
                            <tr>
                            <th scope="row">{{  $members['id'] }}</th>
                            <td>{{  $members['team_id'] }}</td>
                            <td>{{  $members['name'] }}</td>
                            <td>{{  $members['email'] }}</td>
                            <td>{{  $members['lineid'] }}</td>
                            <td>{{  $members['phone'] }}</td>
                            <td>
                            <form action="{{ route('dashboard.download-file') }}" method="POST">
                            @csrf
                                <input id="teamid" type="hidden" name="teamid" value="{{  $members['id'] }}" />
                                <button type="submit" class="download_btn"><i class="fas fa-download"></i></button></a>
                                </form>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

    <!-- End of Member Table -->

    <!-- End of Body content-->
</body>
</html>