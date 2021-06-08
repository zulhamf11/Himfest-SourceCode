<div class="container member-table">
    <!-- Team Table -->
    <div class="row">
        <div class="col-md-12 p-10">
            <!-- DATA TABLE -->
            <h3 class="title-5 m-b-35">Members : {{ $member->count() }}</h3>
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
                            <option value=0>Pending</option>
                            <option value="1">Verified</option>
                        </select>
                    </div>
                    <div class="rs-select2--light rs-select2--sm">
                        <input wire:model.debounce.300ms="search" class="form-control team-search" type="text"
                            placeholder="Search Member..."></div>
                </div>
            </div>
            <div class="table-responsive table-responsive-data2">
                <table class="table table-data2">
                    <thead>
                        <tr>
                            <th scope="col" wire:click="sortBy('id')" style="cursor: pointer;">Member ID
                                @include('partials._sort-icon',['field'=>'id'])</th>
                            <th scope="col" wire:click="sortBy('team_id')" style="cursor: pointer;">Team ID
                                @include('partials._sort-icon',['field'=>'team_id'])</th>
                            <th scope="col" wire:click="sortBy('name')" style="cursor: pointer;">Name
                                @include('partials._sort-icon',['field'=>'name'])</th>
                            <th scope="col">Email</th>
                            <th scope="col">Line ID</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Status</th>
                            <th scope="col">Download Student Card</th>
                            <th scope="col">Validation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($member as $members)
                        <tr class="tr-shadow">
                            <td scope="row">{{  $members['id'] }}</td>
                            <td>{{  $members['team_id'] }}</td>
                            <td>{{  $members['name'] }}</td>
                            <td>{{  $members['email'] }}</td>
                            <td><?php $check = $members['lineid'];
                            if($check == NULL){
                                echo "-";
                            }else{
                                echo $check;
                            }?></td>
                            <td><?php $check = $members['phone'];
                            if($check == NULL){
                                echo "-";
                            }else{
                                echo $check;
                            }?></td>
                            <td><?php $check = $members['verified'];
                            if(!$check){
                                echo "<span class='status--denied'>". "Unverified" . "</span>";
                            }else{
                                echo "<span class='status--process'>". "Verified" . "</span>";
                            }?></td>
                            <td>
                                <form action="{{ route('dashboard.download-file') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $members['id'] }}" />
                                    <?php $check = $members['student_card_file_path'];
                                if($check == ''){
                                    echo "<button type='submit' class='download_btn' disabled><i class='fas fa-download text-gray-300'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='download_btn'><i class='fas fa-download'></i></button>";
                                }?>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('dashboard.verify') }}" method="POST">
                                    @csrf
                                    <input id="teamid" type="hidden" name="teamid" value="{{  $members['id'] }}" />
                                    <input id="type" type="hidden" name="type" value="member" />
                                    <input id="status" type="hidden" name="status" value="1" />
                                    <?php $check = $members['verified'];
                                if(!$check && $members['student_card_file_path'] != ''){
                                    echo "<button type='submit' class='verify_btn'><i class='fas fa-check-square'></i></button>";
                                }
                                else if($check) {
                                    echo "<button type='submit' class='verify_btn' disabled><i class='fas fa-check-square text-green-400'></i></button>";
                                }
                                else{
                                    echo "<button type='submit' class='verify_btn' disabled><i class='fas fa-check-square text-gray-300'></i></button>";
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
            {{$member->links()}}
        </p>
    </div>
    <!-- Pagination -->
</div>