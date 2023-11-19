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
                                <h5 class="card-title fw-semibold">Review</h5>
                            </div>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambah-review"
                                {{ session()->get('role') == 1 ? 'hidden' : '' }}>Tambah</button>
                        </div>
                        @if (session()->has('error'))
                            <div class="alert alert-warning" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <!-- Card -->
                        <div class="justify-content-evenly align-items-center d-flex flex-wrap">
                            @foreach ($review as $item)
                                <div class="card rounded" style="width: 30%;">
                                    <div class="card-body">
                                        <h5><b>{{ $item->pesanan->titik_ambil }} Ke {{ $item->pesanan->tujuan }}</b></h5>
                                        <p>{{ $item->review }}</p>
                                        <p class="text-end">~ {{ $item->user->nama }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tambah-review" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Review</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="create-review" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" id="layanan" name="layanan">
                                @foreach ($layanan as $item)
                                    <option value="{{ $item->id }}">{{ $item->titik_ambil }} => {{ $item->tujuan }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="layanan">Layanan</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="review" name="review" style="height: 100px"></textarea>
                            <label for="review">Review</label>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
