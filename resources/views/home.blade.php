@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if (auth::user()->status=='1')
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <td>no</td>
                            <td>nama</td>
                            <td>email</td>
                            <td>random pass</td>
                            <td>status</td>
                            <td>aksi</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                         <tr>
                           <?php $no= 1; ?> 
                           @foreach($data as $a)
                          <td> {{ $no }}</td>
                          <td> {{ $a->name }}</td>
                          <td> {{ $a->email }}</td>
                          <td> {{ $a->pass_random }}</td>
                          <td> 
                                 @if($a->status == 1)
                                    Aktif
                                    @elseif($a->status == 0)
                                        belum verifikasi
                                        @else
                                            belum verifikasi
                                            @endif
                          </td>
                           <td>
                                @if($a->status == 1)
                                <form class="form-signin" method="POST" action="{{url('/update')}}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="id" value="{{ $a->id }}">
                                     <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn btn-danger"> Non-Aktif</button>
                                </form>
                                @else
                                    <form class="form-signin" method="POST" action="{{url('/update')}}" enctype="multipart/form-data">
                                     {{ csrf_field() }}
                                     <input type="hidden" name="id" value="{{ $a->id }}">
                                     <input type="hidden" name="status" value="1">
                                    <button type="submit" class="btn btn-success"> Aktifkan</button>
                                </form>

                                @endif

                                
                            </td>
                            <td> 
                              {{ csrf_field() }}
                             <a href="#" data-toggle="modal" data-target="#modal-edit{{ $a->id }}" class="btn btn-warning">Edit</a>
                               <a href="/tescoba/public/home/delete/{{ $a->id }}" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>
                       
                    </table>
                </div>


                   @else 
                   <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                        <tr>
                            <td>no</td>
                            <td>nama</td>
                            <td>email</td>
                            <td>status</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                         <tr>
                           <?php $no= 1; ?> 
                           @foreach($data as $a)
                          <td> {{ $no }}</td>
                          <td> {{ $a->name }}</td>
                          <td> {{ $a->email }}</td>
                          <td> 
                                 @if($a->status == 1)
                                    Aktif
                                    @elseif($a->status == 0)
                                        belum verifikasi
                                        @else
                                            belum verifikasi
                                            @endif
                          </td>
                           
                        </tr>
                        <?php $no++; ?>
                        @endforeach
                    </tbody>                    
                    </table>
                </div>
                      @endif
            </div>
        </div>
    </div>
</div>
@foreach($data as $b)
<form class="form-signin" method="POST" action="{{url('/ubah')}}" enctype="multipart/form-data">
  {{ csrf_field() }}
<div class="modal fade" id="modal-edit{{ $b->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-ams" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judul">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-row">
              <div class="form-group col-sm">
                  <div class="form-group">
                    <label class="col-form-label">Nama:</label>
                    <input type="text" value="{{ $b->name }}" name="name" class="form-control form-control-sm needed">
                    <input type="hidden" value="{{ $b->id }}" name="id" class="form-control form-control-sm needed">
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">email:</label>
                    <textarea class="form-control needed" name="email" rows="3">{{ $b->email }}</textarea>
                  </div>

              </div>
             

              </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</form>
</div>
@endforeach
@endsection
