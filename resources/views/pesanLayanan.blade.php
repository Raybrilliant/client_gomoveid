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
                    <h5 class="card-title fw-semibold">Pesan Layanan</h5>
                  </div>
                  <div>
                  </div>
                </div>
                <!-- Input -->
                <form action="pesan-layanan" method="post">
                  @csrf
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="titikAmbil" name="titikAmbil" placeholder="jalan mamakau" required>
                    <label for="titikAmbil">Titik Ambil</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="jalan mamakau" required>
                    <label for="tujuan">Tujuan</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="date" class="form-control" id="tanggalPengambilan" name="tanggalPengambilan" required>
                    <label for="tanggalPengambilan">Tanggal Pengambilan</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" style="height: 100px"></textarea>
                    <label for="deskripsi">Deskripsi</label>
                  </div>
                  <button type="submit" class="btn btn-primary d-flex ms-auto">Selanjutnya</button>
                </form>
              </div>
            </div>
          </div>
        </div>
@endsection
