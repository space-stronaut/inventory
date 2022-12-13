@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        Pemesanan
                    </div>
                    <div>
                        <a href="{{ route('pemesanan.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>


                {{-- @if ($message = Session::get('gagal'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <div>
                      {{ $message }}
                    </div>
                  </div>
                    @endif --}}


                <div class="card-body">
                    @if ($message = Session::get('gagal'))
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                      </div>
                    @endif
                    <form action="{{ route('pemesanan.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_pengguna" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="">Petugas</label>
                            <select name="id_petugas" id="" class="form-control">
                                <option value="">Choose...</option>
                                @forelse ($petugas as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" class="btn btn-info" id="repeatDivBtn" data-increment="1">Add More Input</button>
                        </div>
                        <div class="mb-3 input-group repeatDiv mt-3" id="repeatDiv">

                            <select name="id_bahan[]" id="bahan" class="form-control">
                                <option value="">Pilih Bahan...</option>
                                @forelse ($bahans as $item)
                                    <option value="{{ $item->id }}" data-stok="{{ $item->stok }}"">{{ $item->nama_bahan }} - @currency($item->harga_jual) - Stok : {{ $item->stok }}</option>
                                @empty
                                    
                                @endforelse
                            </select>
                              <input type="text" class="form-control" name="durasi_pemakaian[]" placeholder="Durasi Pemakaian">
                              <input type="text" class="form-control" name="jumlah[]" placeholder="Jumlah Beli">
                          </div>
          
                          
                        <div class="form-group">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
        
          <div class="col-md-12 mb-4 text-center">
            <h5>Dynamically Add or Remove Input Fields Using Jquery</h5>
          </div>
        
          <div class="col-md-3"></div>
          
          <div class="col-md-6">
                  <form>
                      
                  </form>
          </div>
          
          <div class="col-md-3"></div>
        </div>
      </div>
</div>

<script>
    console.log('ini')

    const bahan = document.getElementById('bahan')

    bahan.addEventListener('change', () => {
        console.log(this.getAttribute('data-stok'))
    })
</script>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

$("#repeatDivBtn").click(function () {

    $newid = $(this).data("increment");
    $repeatDiv = $("#repeatDiv").wrap('<div/>').parent().html();
    $('#repeatDiv').unwrap();
    $($repeatDiv).insertAfter($(".repeatDiv").last());
    $(".repeatDiv").last().attr('id',   "repeatDiv" + '_' + $newid);
    $("#repeatDiv" + '_' + $newid).append('<div class="input-group-append"><button type="button" class="btn btn-danger removeDivBtn" data-id="repeatDiv'+'_'+ $newid+'">Remove</button></div>');
    $newid++;
    $(this).data("increment", $newid);

});


$(document).on('click', '.removeDivBtn', function () {

    $divId = $(this).data("id");
    $("#"+$divId).remove();
    $inc = $("#repeatDivBtn").data("increment");
    $("#repeatDivBtn").data("increment", $inc-1);

});

});
    </script>
@endsection
