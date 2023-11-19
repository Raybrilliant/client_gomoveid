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
                    <h5 class="card-title fw-semibold">Pesanan Aktif</h5>
                  </div>
                  </div>
                  <!-- Table -->
                  <table id="active-order" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            @if (session()->get('role') == 1)
                            <th>Nama</th>
                            @endif
                            <th>Titik Ambil</th>
                            <th>Tujuan</th>
                            <th>Tanggal Ambil</th>
                            <th>Biaya</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($data as $item)
                        <tr>
                            @if (session()->get('role') == 1)
                            <td>{{$item->user->nama}}</td>
                            @endif
                            <td>{{$item->titik_ambil}}</td>
                            <td>{{$item->tujuan}}</td>
                            <td>{{$item->tanggal_pengambilan}}</td>
                            <td>{{$item->total}}</td>
                            @if ($item->status == 1)
                            <td><span class="badge bg-danger">Not Paid</span></td>
                            @elseif ($item->status == 2)
                            <td><span class="badge bg-warning">Pending</span></td>
                            @elseif ($item->status == 3)
                            <td><span class="badge bg-success">Paid</span></td>
                            @endif
                            <td>
                              <a href="detail/{{$item->id}}" class="btn btn-primary">{{session()->get('role') == 1 ? 'Edit' : 'Detail'}}</a>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection