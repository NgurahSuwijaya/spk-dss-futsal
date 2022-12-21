@extends('layouts.app')

@section('title', 'SPK DSS Futsal')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pemain</h1>
            </div>

            <div class="section-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close"
                            data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        {{ $message }}
                    </div>
                </div>
            @endif   
            <div class="">
                <div class="card">
                    <div class="card-header">
                        <td>
                            <h4>Daftar Pemain Futsal</h4>
                        <td>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('pemain.create') }}" class="btn btn-primary mb-4">Tambah Pemain</a>
                        <a href="{{ route('pemain.generate') }}" class="btn btn-warning mb-4">Generate Pemain Terbaik</a>
                        {{-- <a href="{{route('pemain.exportExcelCSV', 'xlsx')}}" class="btn btn-success mb-4">Export Excel</a>
                        <a href="{{route('pemain.exportExcelCSV', 'csv')}}" class="btn btn-success mb-4">Export CSV</a>
                        <form action="{{ route('pemain.importExcelCSV') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                            <button class="btn btn-primary">Import Users</button>
                        </form> --}}
                        <div></div>    
                        <div class="table-responsive">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pemain</th>
                                        <th>Nama Team</th>
                                        <th>Nomor Punggung</th>
                                        <th>Usia</th>
                                        <th>Position</th>
                                        <th>Goal or Cleansheet</th>
                                        <th>Assist or Cleansheet</th>
                                        <th>Yellow Card</th>
                                        <th>Red Card</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $i = 1
                                    @endphp
                                    @foreach($pemains as $pemain)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$pemain->nama}}</td>
                                        <td>{{$pemain->nama_team}}</td>
                                        <td>{{$pemain->nomor_punggung}}</td>
                                        <td>{{$pemain->usia}}</td>
                                        <td>{{$pemain->position}}</td>
                                        <td>{{$pemain->goal_cleansheet}}</td>
                                        <td>{{$pemain->assist_save}}</td>
                                        <td>{{$pemain->red_card}}</td>
                                        <td>{{$pemain->yellow_card}}</td>
                                        <td>
                                            <a href="{{ route('pemain.edit', $pemain->id) }}" class="btn btn-warning">Edit</a>
                                            <a onclick="return confirm ('Hapus pemain ini?')" href="{{ route('pemain.destroy', $pemain->id) }}" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
                
        </section>
        
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush
