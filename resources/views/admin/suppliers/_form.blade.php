@csrf

<div class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Nama Supplier</label>
        <input type="text" name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $supplier->name ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Telepon</label>
        <input type="text" name="phone"
               class="form-control @error('phone') is-invalid @enderror"
               value="{{ old('phone', $supplier->phone ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" name="email"
               class="form-control"
               value="{{ old('email', $supplier->email ?? '') }}">
    </div>

    <div class="col-md-12">
        <label class="form-label">Alamat</label>
        <textarea name="address" class="form-control" rows="3">
            {{ old('address', $supplier->address ?? '') }}
        </textarea>
    </div>

</div>

<div class="mt-4 d-flex justify-content-between">
    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">
        Kembali
    </a>

    <button type="submit" class="btn btn-primary">
        Simpan
    </button>
</div>