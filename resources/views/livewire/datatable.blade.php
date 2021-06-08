<div class="container team-table">

    <!-- Team Table -->
    <div class="row">
        <div class="col-md-12 p-10">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Teams : {{ $team->count() }}</h3>
            <div class="table-data__tool">
                <div class="table-data__tool-left">
                    <div class="rs-select2--light rs-select2--sm">
                        <p>Filter By Category: </p>
                        <select class="form-control form-control-sm" wire:model="selectedCategory">
                            <option selected value="">All</option>
                            <option value="SMA/SMK">SMA/SMK</option>
                            <option value="Mahasiswa">Mahasiswa</option>
                        </select>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <p>Filter By Status: </p>
                        <select class="form-control form-control-sm" wire:model="selectedStatus">
                            <option selected value="">All</option>
                            <option value='pending'>Pending</option>
                            <option value="Verified">Verified</option>
                        </select>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <input wire:model.debounce.300ms="search" class="form-control team-search" type="text"
                            placeholder="Search Team..."></div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th scope="col" wire:click="sortBy('id')" style="cursor: pointer;">Team ID
                                @include('partials._sort-icon',['field'=>'id'])</th>
                            <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">Team Name
                                @include('partials._sort-icon',['field'=>'name'])</th>
                            <th scope="col">Leader ID</th>
                            <th scope="col">Category</th>
                            <th scope="col">Referrer</th>
                            <th scope="col">Status Pembayaran
                            <th scope="col">Download Answer</th>
                            <th scope="col">Download Bukti Bayar</th>
                            <th scope="col">Validation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($team as $teams)
                        <tr class="tr-shadow">
                            <td scope="row">{{  $teams['id'] }}</td>
                            <td>{{  $teams['name'] }}</td>
                            <td>{{  $teams['leader_id'] }}</td>
                            <td>{{  $teams['category'] }}</td>
                            <td>{{  $teams['referrer'] }}</td>
                            <td><?php $check = $teams['payment_status'];
                            if($check == 'pending'){
                                echo "<span class='status--denied'>". "Pending" . "</span>";
                            }else{
                                echo "<span class='status--process'>". "Verified" . "</span>";
                            }?></td>
                            <td>
                                <form action="{{ route('dashboard.download-file') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                    <input id="type" type="hidden" name="type" value="submission" />
                                    <?php $check = $teams['submission_file_path'];
                                if($check == ''){
                                    echo "<button type='submit' class='download_btn' disabled><i class='fas fa-download text-gray-300'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='download_btn'><i class='fas fa-download'></i></button>";
                                }?>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.download-file') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                    <input id="type" type="hidden" name="type" value="payment_proof" />
                                    <?php $check = $teams['payment_proof_file_path'];
                                if($check == ''){
                                    echo "<button type='submit' class='download_btn' disabled><i class='fas fa-download text-gray-300'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='download_btn'><i class='fas fa-download'></i></button>";
                                }?>

                                </form>
                            </td>
                            <td class="flex justify-content-between items-center">
                                <form action="{{ route('dashboard.verify') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                    <input id="type" type="hidden" name="type" value="team" />
                                    <input id="status" type="hidden" name="status" value="1" />
                                    <?php $check = $teams['payment_status'];
                                if($check == 'pending' && $teams['payment_proof_file_path'] != ''){
                                    echo "<button type='submit' class='verify_btn'><i class='fas fa-check-square'></i></button>";
                                }
                                else if($check == 'verified') {
                                    echo "<button type='submit' class='verify_btn' disabled><i class='fas fa-check-square text-green-400'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='verify_btn' disabled><i class='fas fa-check-square text-gray-300'></i></button>";
                                }?>
                                </form>

                                <form action="{{ route('dashboard.decline') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $teams['id'] }}" />
                                    <input id="type" type="hidden" name="type" value="team" />
                                    <?php $check = $teams['payment_status'];
                                if($check == 'pending' && $teams['payment_proof_file_path'] != ''){
                                    echo "<button type='submit' class='decline_btn'><i class='fas fa-times-circle'></i></button>";
                                }
                                else if($check == 'declined') {
                                    echo "<button type='submit' class='decline_btn' disabled><i class='fas fa-times-circle text-red-400'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='decline_btn' disabled><i class='fas fa-times-circle text-gray-300'></i></button>";
                                }?>

                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE -->
        </div>
    </div>
    <!-- Pagination -->
    <div class="container">
        <p>
            {{ $team->links() }}
        </p>
    </div>
    <!-- Pagination -->

    <!-- End of Team Table -->
</div>
</body>

</html>