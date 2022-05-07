<x-app-layout>
    <x-slot name="title_heading">
        Update Postingan
    </x-slot>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <a href="" class="btn btn-warning btn-sm mb-3 "><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
    <x-card>
        <form action="{{route('admin.posts.update',$posts->id)}}" method="POST"  enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Postingan</label>
                <input type="text" class="form-control" id="title" name="title" value="{{$posts->title}}">

            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{$posts->description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Thumbnail Produk</label>
                <input type="file" class="form-control" id="image" name="image" value="{{$posts->images_path}}">
            </div>
            <div class="mb-3">
                <label for="meta_tag" class="form-label">Seo Meta Tag</label>
                <input type="text" class="form-control" id="meta_tag" name="meta_tag" value="{{$posts->meta_tag}}">
            </div>
            <button class="btn btn-warning btn-sm" type="submit">Update</button>
        </form>
    </x-card>  
    <script>
        tinymce.init({
          selector: '#description',
          plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
          toolbar_mode: 'floating',
        });
      </script>
</x-app-layout>
