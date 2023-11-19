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
                    <h5 class="card-title fw-semibold">{{session()->get('role') == 1 ? 'Edit' : 'Detail'}} Pesanan</h5>
                  </div>
                  @if ($data->status == 1)
                  <div class="badge bg-danger">Not Paid</div>
                  @elseif ($data->status == 2)
                  <div class="badge bg-warning">Pending</div>
                  @elseif ($data->status == 3)
                  <div class="badge bg-success">Paid</div>
                  @endif
                  </div>
                  <!-- Input -->
                  <form action="/edit-pesanan" method="post">
                    @csrf
                    <input type="text" name="id" value="{{$data->id}}" hidden>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="titik-ambil" name="titik-ambil" placeholder="Jalan Margo Utomo" value="{{$data->titik_ambil}}" disabled>
                      <label for="titik-ambil">Titik Ambil</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Jalan Mekar Jaya" value="{{$data->tujuan}}" disabled>
                      <label for="tujuan">Tujuan</label>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="date" class="form-control" id="tanggal-ambil" name="tanggal-ambil" value="{{$data->tanggal_pengambilan}}" disabled>
                      <label for="tanggal-ambil">Tanggal Ambil</label>
                    </div>
                    <div class="form-floating mb-3">
                      <textarea class="form-control" placeholder="Leave a comment here" id="deskripsi" name="deskripsi" style="height: 100px" disabled>{{$data->deskripsi}}</textarea>
                      <label for="deskripsi">Deskripsi</label>
                    </div>
                    <div class="form-floating mb-3">
                      @if ($data->status != 1 || session()->get('role') == 2)
                      <input type="text" class="form-control" id="ongkosKirim" name="ongkosKirim" placeholder="10000" value="{{$data->ongkos_kirim}}" disabled>
                      @else
                      <input type="text" class="form-control" id="ongkosKirim" name="ongkosKirim" placeholder="10000" value="{{$data->ongkos_kirim}}">
                      @endif
                      <label for="ongkosKirim">Ongkos Kirim</label>
                    </div>
                    <div class="form-floating mb-3">
                      @if ($data->status != 1 || session()->get('role') == 2)
                      <input type="text" class="form-control" id="biayaTambahan" name="biayaTambahan" placeholder="10000" value="{{$data->biaya_tambahan}}" disabled>
                      @else
                      <input type="text" class="form-control" id="biayaTambahan" name="biayaTambahan" placeholder="10000" value="{{$data->biaya_tambahan}}">
                      @endif
                      <label for="biayaTambahan">Biaya Tambahan</label>
                    </div>
                    <div class="d-flex">
                      @if ($data->status != 2 && session()->get('role') == 1)
                      <a href="/confirm/{{$data->id}}" class="btn btn-warning d-flex ms-auto disabled" role="button" >Konfirmasi Pembayaran</a>
                      @elseif($data->status != 1 && session()->get('role') == 2 || !$data->ongkos_kirim)
                      <a href="/confirm/{{$data->id}}" class="btn btn-warning d-flex ms-auto disabled" role="button" >Konfirmasi Pembayaran</a>
                      @else
                      <a href="/confirm/{{$data->id}}" class="btn btn-warning d-flex ms-auto" role="button" >Konfirmasi Pembayaran</a>
                      @endif
                      @if ($data->status != 1 || session()->get('role') != 1)
                      <button type="submit" class="btn btn-primary ms-3" hidden >Update</button>
                      @else
                      <button type="submit" class="btn btn-primary ms-3" >Update</button>
                      @endif
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection