<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-flash-message class="mb-4" :message="isset($message) ? $message : null" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            @if($team->payment_status != 'verified')
            <div class="p-6 bg-white border-b border-gray-200">
                <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.upload-file') }}">
                    @csrf

                    Upload your payment proof here!
                    <p class="mt-1 text-sm text-red-600">(Pembayaran biaya pendaftaran sebesar
                        {{ $team->category == "Mahasiswa" ? "Rp100.000,-" : "Rp50.000,-" }}
                        ke 4400200209 (BCA a.n. Putri
                        Aurelia Shilo))</p>
                    @if($team->payment_proof_file_path == '' || $team->payment_status == 'declined')
                    <div class="my-4">
                        @if($team->payment_status == 'declined')
                        <p class="my-2">
                            Bukti pembayaran yang Anda upload telah kami tolak. Mohon upload bukti pembayaran
                            yang tepat.
                        </p>
                        @endif
                        <x-label for="file" :value="__('Payment Proof')" />

                        <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')"
                            required />
                    </div>
                    <input id="type" type="hidden" name="type" value="payment_proof" />

                    <x-button class="mt-2">
                        {{ __('Submit') }}
                    </x-button>
                    @else
                    <div class="my-4">
                        <p>
                            Pembayaran Anda sedang kami verifikasi, mohon tunggu. Ketika pembayaran Anda telah
                            terverifikasi, kolom upload bukti pembayaran ini akan hilang.
                        </p>
                    </div>
                    @endif
                </form>
            </div>
            @endif
            @if($team->payment_status == 'verified' && $team->members[0]->verified && count($team->members) == 3 &&
            $team->members[1]->verified && $team->members[2]->verified && $isSubmissionDate)
            <div class="flex-1 p-6 bg-white border-b border-gray-200">
                <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.upload-file') }}">
                    @csrf

                    Submit your work here!
                    <div class="my-4">
                        <x-label for="file" :value="__('Submission')" />

                        <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')"
                            required />
                    </div>
                    <input id="type" type="hidden" name="type" value="submission" />

                    <x-button class="mt-2">
                        {{ __('Submit') }}
                    </x-button>
                </form>
            </div>
            @endif

            <div class="flex flex-row space-x-4">
                <div class="flex-1 mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    First Member (Team Leader)

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}"
                        class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', $team->members[0]->name)" required
                                disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', $team->members[0]->email)" required
                                disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid"
                                :value="old('lineid', $team->members[0]->lineid ?? '')" required
                                disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', $team->members[0]->phone ?? '')" required
                                disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <div class="my-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')"
                                required disabled="{{ $team->members[0]->verified }}" />
                        </div>

                        <x-input id="id" type="hidden" name="id" value='{{ $team->members[0]->id ?? null }}' />
                        <x-input id="type" type="hidden" name="type" value="student_card" />
                        <x-button class="mt-4" disabled="{{ $team->members[0]->verified }}">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>

                <div class="flex-1 mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    Second Member

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}"
                        class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', isset($team->members[1]) ? $team->members[1]->name : '')" required
                                disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', isset($team->members[1]) ? $team->members[1]->email : '')" required
                                disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}" />
                        </div>

                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid"
                                :value="old('lineid', isset($team->members[1]) ? $team->members[1]->lineid : '')"
                                required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', isset($team->members[1]) ? $team->members[1]->phone : '')" required
                                disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}" />
                        </div>

                        <div class="my-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')"
                                required disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}" />
                        </div>

                        <x-input id="id" type="hidden" name="id"
                            value="{{ isset($team->members[1]) ? $team->members[1]->id : null }}" />
                        <x-input id="type" type="hidden" name="type" value="student_card" />
                        <x-button class="mt-4"
                            disabled="{{ isset($team->members[1]) ? $team->members[1]->verified : '' }}">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>

                <div class=" flex-1 mt-3 p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    Third Member

                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.update-member') }}"
                        class="mt-3">
                        @csrf

                        <!--  Full Name -->
                        <div>
                            <x-label for="name" :value="__('Full Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name', isset($team->members[2]) ? $team->members[2]->name : '')" required
                                disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email', isset($team->members[2]) ? $team->members[2]->email : '')" required
                                disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}" />
                        </div>

                        <!-- Line ID -->
                        <div class="mt-4">
                            <x-label for="lineid" :value="__('Line ID')" />

                            <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid"
                                :value="old('lineid', isset($team->members[2]) ? $team->members[2]->lineid : '')"
                                required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}" />
                        </div>

                        <!-- Phone Number -->
                        <div class="mt-4">
                            <x-label for="phone" :value="__('Phone Number')" />

                            <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                :value="old('phone', isset($team->members[2]) ? $team->members[2]->phone : '')" required
                                disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}" />
                        </div>

                        <div class="my-4">
                            <x-label for="file" :value="__('Student Card')" />

                            <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')"
                                required disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}" />
                        </div>

                        <x-input id="id" type="hidden" name="id"
                            value="{{ isset($team->members[2]) ? $team->members[2]->id : null }}" />
                        <x-input id="type" type="hidden" name="type" value="student_card" />
                        <x-button class="mt-4"
                            disabled="{{ isset($team->members[2]) ? $team->members[2]->verified : '' }}">
                            {{ __('Update') }}
                        </x-button>
                    </form>
                </div>
            </div>

            <div class=" flex w-full justify-center items-center text-white text-sm mt-12">
                Having a trouble? Email us at <a href="mailto:contact@himfobinus.com"
                    class="no-underline hover:underline text-white ml-1">contact@himfobinus.com</a>
            </div>
        </div>
    </div>
</x-app-layout>