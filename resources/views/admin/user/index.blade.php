@extends('layouts.app', ['title' => 'User'])

@section('content')
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold">
                            <i class="fa fa-users"></i>
                            Users
                        </h6>
                    </div>

                    <div class="card-body">
                        <form action="" method="GET">
                            <div class="form-group">
                                <div class="input-group mb-3">   
                                    <div class="input-group-prepend">
                                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">
                                            <i class="fa fa-plus-circle"></i>
                                            Tambah
                                        </a>
                                    </div>
                                    
                                    <input type="text" name="q" id="q" placeholder="cari berdasarkan Nama User" class="form-control">
                                    
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-search"></i>
                                            Cari
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align: center; width: 6%">No.</th>
                                        <th scope="col">Nama User</th>
                                        <th scope="col">Email</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($users as $no => $user)
                                        <tr>
                                            <th scope="row" class="text-center">{{ $users->firstItem() + $no  }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                                <button class="btn btn-danger btn-sm" onclick="Delete(this.id)" id="{{ $user->id }}">
                                                    <i class="fas fa-trash"></i>       
                                                </button>
                                            </td>
                                        </tr>      
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Belum Tersedia!
                                        </div>   
                                    @endforelse
                                </tbody>
                            </table>

                            <div style="text-align: center">
                                {{-- vendor.pagination.bootstrap-4 harus dipublish lewat php artisan --}}
                                {{ $users->links("vendor.pagination.bootstrap-4") }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection