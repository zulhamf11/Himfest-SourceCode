<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="mt-6 w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Team Name -->
            <div>
                <x-label for="name" :value="__(' Team Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus />
            </div>

            <!-- Team Leader's Full Name -->
            <div>
                <x-label for="leader_name" :value="__('Team Leader\'s Full Name')" />

                <x-input id="leader_name" class="block mt-1 w-full" type="text" name="leader_name"
                    :value="old('leader_name')" required autofocus />
            </div>

            <!-- Team Leader's Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Team Leader\'s Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <!-- Team Leader's Line ID -->
            <div class="mt-4">
                <x-label for="lineid" :value="__('Team Leader\'s Line ID')" />

                <x-input id="lineid" class="block mt-1 w-full" type="text" name="lineid" :value="old('lineid')"
                    required />
            </div>

            <!-- Team Leader's Phone Number -->
            <div class="mt-4">
                <x-label for="phone" :value="__('Team Leader\'s Phone Number')" />

                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- Category -->
            <div class="mt-4">
                <x-label for="category" :value="__('Category')" />

                <x-select id="category" class="block mt-1 w-full" name="category" :value="old('category')" required>
                    <option value="SMA/SMK">SMA/SMK</option>
                    <option value="Mahasiswa">Mahasiswa</option>
                </x-select>
            </div>

            <!-- Referrer -->
            <div class="mt-4">
                <x-label for="referrer" :value="__('From Whom Did You Find Out About HIMFEST?')" />

                <x-select id="referrer" class="block mt-1 w-full" name="referrer" :value="old('referrer')" required>
                    <optgroup label="Media Partners" class="text-sm">
                        <option value="Info Lomba Malang">Info Lomba Malang</option>
                        <option value="Event Pelajar">Event Pelajar</option>
                        <option value="Olimpiade Update">Olimpiade Update</option>
                        <option value="RPL-GDC Laboratory">RPL-GDC Laboratory</option>
                        <option value="HIMTI">HIMTI</option>
                        <option value="Acarakampus.id">Acarakampus.id</option>
                        <option value="Info Lomba">Info Lomba</option>
                        <option value="Ruang Mahasiswa">Ruang Mahasiswa</option>
                    </optgroup>
                    <optgroup label="Other" class="text-sm">
                        <option value="HIMFO">HIMFO</option>
                        <option value="Binus">Binus</option>
                        <option value="Lainnya">Lainnya</option>
                    </optgroup>
                </x-select>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 flex items-center">
                <x-input id="accepted" class="block mr-2 w-1/20" type="checkbox" name="accepted" required />

                <label for="accepted" class="block font-medium text-sm text-gray-700">I have read, understood, and
                    accepted the <a href="{{ asset('guidebook.pdf') }}" target="_blank" rel="noopener"
                        class="underline text-gray-700">guidelines</a>.</label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>