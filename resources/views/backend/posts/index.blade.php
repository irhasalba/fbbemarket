<x-app-layout>
    <x-slot name="title_heading">Daftar Postingan</x-slot>
    <x-card>
        <a  href="{{route('admin.posts.create')}}" class="btn btn-primary btn-sm mb-3">Tambah Postingan</a>
        <table class="table table-stripped" id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Thumbnail</th>
                    <th>Waktu Posting</th>
                    <th>Diposting</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td><img src="{{asset($post->images_path)}}" alt="" srcset="" height="100" width="100"></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>Admin</td>
                        <td><a href="{{route('admin.posts.edit',$post->slug)}}" class="btn btn-warning btn-sm ml-2 mb-2 ">Edit</a><a href="" class="btn btn-danger btn-sm ml-2">Hapus</a></td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                     <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Thumbnail</th>
                    <th>Waktu Posting</th>
                    <th>Diposting</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </x-card>
    @push('scripts')    
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        });
    </script>
    @endpush
</x-app-layout>