@extends('layouts/layouts')
@section('content')
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">Profil Saya</h5>
                            </div>
                        </div>
                        <!-- Input -->
                        @if (session()->has('error'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="/edit-user" method="post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Jalan Margo Utomo" value="{{ $data->nama }}" required>
                                <label for="name">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Jalan Mekar Jaya" value="{{ $data->email }}" required>
                                <label for="email">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px">{{ $data->alamat }}</textarea>
                                <label for="alamat">Alamat</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" class="form-control" id="noHp" name="noHp"
                                    value="{{ $data->no_hp }}" placeholder="08181202312" required>
                                <label for="noHp">No HP</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="casawe" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-warning d-flex ms-auto">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
