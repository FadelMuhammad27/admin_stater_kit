<x-app>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <!-- Card 1: Judul Halaman -->
    <div class="card shadow p-3 mb-3">
        <h5 class="fw-bold mb-0">Tambah User</h5>
    </div>

    <!-- Card 2: Form Input Utama -->
    <div class="card shadow p-4">
        <!-- PENTING: Menambahkan enctype="multipart/form-data" agar form bisa mengirim file/gambar -->
        <form method="POST" action="{{ route('user.store') }}" class="form" enctype="multipart/form-data"
            data-parsley-validate>
            @csrf

            <!-- Baris 1: Nama & Email -->
            <div class="row g-3 mb-3">
                <!-- Nama Mahasiswa -->
                <div class="col-md-6">
                    <label for="name" class="form-label required">Nama Mahasiswa <span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name') }}" required
                        data-parsley-required-message="Nama Harus Diisi">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-md-6">
                    <label for="email" class="form-label required">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" required data-parsley-type="email"
                        data-parsley-required-message="Email Harus Diisi" data-parsley-type-message="Email tidak valid">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Baris 2: Password & Konfirmasi Password -->
            <div class="row g-3 mb-3">
                <!-- Password -->
                <div class="col-md-6">
                    <label for="password" class="form-label required">Password <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" required minlength="8" data-parsley-minlength="8"
                        data-parsley-required-message="Password Harus Diisi"
                        data-parsley-minlength-message="Password minimal 8 karakter">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="col-md-6">
                    <label for="passwordconfirm" class="form-label required">Konfirmasi Password <span
                            class="text-danger">*</span></label>
                    <input type="password" class="form-control @error('passwordconfirm') is-invalid @enderror"
                        id="passwordconfirm" name="passwordconfirm" required minlength="8" data-parsley-minlength="8"
                        data-parsley-equalto="#password" data-parsley-required-message="Konfirmasi Password Harus Diisi"
                        data-parsley-equalto-message="Konfirmasi Password harus sama dengan Password">
                    @error('passwordconfirm')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Baris 3: Pilihan Role & Avatar (TAMBAHAN AVATAR DARI VIDEO) -->
            <div class="row g-3 mb-4">
                <!-- Role -->
                <div class="col-md-6">
                    <label for="role" class="form-label required">Role <span class="text-danger">*</span></label>
                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role"
                        required data-parsley-required-message="Role Harus Diisi">
                        <option value="">Pilih Role</option>
                        <option value="Superadmin" @selected(old('role') == 'Superadmin')>Superadmin</option>
                        <option value="Admin" @selected(old('role') == 'Admin')>Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Avatar & Preview (Sesuai menit 29:37 di video) -->
                <div class="col-md-6">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="upload"
                        name="avatar">
                    @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <!-- Preview Gambar Default -->
                    <div class="mt-2">
                        <img src="{{ asset('niceadmin/img/noprofil.png') }}" alt="Avatar" class="w-50 rounded mt-2"
                            id="preview">
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="text-end">
                <a class="btn btn-warning" href="{{ route('user.index') }}" role="button">Cancel</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    @push('modals')
    @endpush

    @push('scripts')
    @endpush
</x-app>
