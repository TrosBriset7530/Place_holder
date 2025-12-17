<div class="p-3 bg-light rounded mt-4">

        <h3>Upload Video</h3>

        <form action="{{ isset($bukuDetail) 

            <div class="mb-3">
                <label class="form-label">Judul Buku</label>
                <input type="text"
                       name="judul"
                       class="form-control"
                       required
                       value="{{ old('judul', $bukuDetail->judul ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Pengarang</label>
                <input type="text"
                       name="pengarang"
                       class="form-control"
                       required
                       value="{{ old('pengarang', $bukuDetail->pengarang ?? '') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number"
                       name="tahun_terbit"
                       class="form-control"
                       min="1900"
                       max="2099"
                       required
                       value="{{ old('tahun_terbit', $bukuDetail->tahun_terbit ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        {{-- Delete --}}
        <form action="{{ route('buku.delete', ['id' => $item->id]) }}" 
                          method="POST" 
                          class="mt-3">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>