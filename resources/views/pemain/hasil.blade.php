@extends('layouts.app')

@section('title', 'SPK DSS Futsal')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Hasil Perhitungan Pemain Terbaik</h1>
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
                            <div class="table-responsive">
                                <table class="table-bordered table-md table">
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Pemain</th>
                                        <th>Nama Team</th>
                                        <th>Nomor Punggung</th>
                                        <th>Usia</th>
                                        <th>Position</th>
                                        <th>Nilai</th>
                                    </tr>
                                    @php
                                        $i = 1
                                    @endphp
                                    @foreach($hasils as $hasil)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$hasil->nama}}</td>
                                        <td>{{$hasil->nama_team}}</td>
                                        <td>{{$hasil->nomor_punggung}}</td>
                                        <td>{{$hasil->usia}}</td>
                                        <td>{{$hasil->position}}</td>
                                        <td>{{$hasil->nilai}}</td>
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

    <!-- Page Specific JS File -->
@endpush
