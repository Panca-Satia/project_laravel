<div>
    <button type="button"
        class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}"
        data-toggle="modal"
        data-target="#formProduct{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
        Product baru
        @endif
    </button>
</div>

<div class="modal fade" id="formProduct{{ $id ?? '' }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('master-data.product.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id ?? '' }}">

                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $id ? 'Form Edit Product' : 'Form Product Baru' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="form-group my-2">
                        <label>Nama Product</label>
                        <input type="text"
                            name="nama_product"
                            id="nama_product"
                            class="form-control"
                            value="{{ $id ? $nama_product : old('nama_product') }}">
                    </div>

                    <div class="form-group my-2">
                        <label>Kategori Product</label>
                        <select name="kategori_id" id="kategori_id" class="form-control">
                            <option value="">Pilih Kategori</option>
                            {{-- Memperbaiki logika 'selected' --}}
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}"
                                    @if (($id && $kategori_id == $item->id) || old('kategori_id') == $item->id)
                                        selected
                                    @endif>
                                    {{ $item->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group my-2">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="form-control" value="{{ $id ? $harga_jual : old('harga_jual') }}">
                    </div>

                    <div class="form-group my-2">
                        <label for="harga_beli_pokok">Harga Beli Pokok</label>
                        <input type="number" name="harga_beli_pokok" id="harga_beli_pokok" class="form-control" value="{{ $id ? $harga_beli_pokok : old('harga_beli_pokok') }}">
                    </div>

                    <div class="form-group my-2">
                        <label for="stok">Stok Persediaan</label>
                        <input type="number" name="stok" id="stok" class="form-control" value="{{ $id ? $stok : old('stok') }}">
                    </div>

                    <div class="form-group my-2">
                        <label for="stok_minimal">Stok Minimal</label>
                        <input type="number" name="stok_minimal" id="stok_minimal" class="form-control" value="{{ $id ? $stok_minimal : old('stok_minimal') }}">
                    </div>

                    <div class="form-group my-2">
                        <div class="form-check">
                            <input type="checkbox" name="is_active" id="is_active" class="form-check-input"
                                {{ $id && $is_active ? 'checked' : (old('is_active') ? 'checked' : '') }}>
                            <label class="form-check-label" for="is_active">
                                Produk Aktif ?
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save changes
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>