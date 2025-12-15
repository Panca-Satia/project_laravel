<div>
    <button type="button"
        class="btn {{ $id ? 'btn-warning' : 'btn-primary' }}"
        data-toggle="modal"
        data-target="#formKategori{{ $id ?? '' }}">
        @if ($id)
            <i class="fas fa-edit"></i>
        @else
        Kategori baru
        @endif
    </button>
</div>

<div class="modal fade" id="formKategori{{ $id ?? '' }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('master-data.kategori.store') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $id ?? '' }}">

                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ $id ? 'Edit Kategori' : 'Form Kategori Baru' }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text"
                               name="nama_kategori"
                               class="form-control"
                               value="{{ $nama_kategori ?? '' }}">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi"
                                  class="form-control"
                                  rows="4">{{ $deskripsi ?? '' }}</textarea>
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
