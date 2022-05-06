<x-app-layout>
    <x-slot name="title_heading">
        Tambah Postingan
    </x-slot>
    <a href="" class="btn btn-warning btn-sm mb-3 "><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
    <x-card>
        <form action="{{route('admin.posts.save')}}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Judul Postingan</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="textarea" rows="3" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Thumbnail Produk</label>
                <input type="file" class="form-control" id="title" required name="image">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Seo Meta Tag</label>
                <input type="text" class="form-control" id="title" name="meta_tag" required>
            </div>
            <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
        </form>
    </x-card>
    @push('scripts')    
    <script>
        tinymce.init({
          selector: 'textarea',
          plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
          toolbar_mode: 'floating',
        });
      </script>
    @endpush
</x-app-layout>
