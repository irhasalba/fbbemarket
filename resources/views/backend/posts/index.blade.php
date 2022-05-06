<x-app-layout>
    <x-slot name="title_heading">Daftar Postingan</x-slot>
    <x-card>
        <a  href="{{route('admin.posts.create')}}" class="btn btn-primary btn-sm mb-3">Tambah Postingan</a>
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Posting</th>
                    <th>Diposting</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Posting</th>
                    <th>Diposting</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </x-card>
</x-app-layout>