@extends('layouts.admin')

@section('content')
 <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3>Daftar Pesan</h3>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
               <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
               </thead>
               <tbody>
        @forelse($massages as $massage)
                    <tr>
                     <td> {{ $loop->iteration }}</td>
                    <td>{{ $massage->nama}}</td>
                    <td>{{ $massage->email}}</td>
                    <td>{{ $massage->subject}}</td>
                    <td>{{ $massage->pesan}}</td>
                        <td>
                        <form onclick="return confirm('anda yakin untuk menghapus data?')" class="d-inline" action="{{ route('admin.massages.destroy', $massage->id)}}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Kosong</td>
                        </tr>
                    @endforelse
               </tbody>

            </table>
        </div>
    </div>
 </div>
@endsection