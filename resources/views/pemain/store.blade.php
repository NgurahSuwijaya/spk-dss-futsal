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
            @if ($message = Session::get('error-input'))
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="">
                <div class="card">
                    <form action="{{ route('pemain.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Tambah Pemain</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pemain</label>
                                <input type="text"
                                    placeholder="nama pemain"
                                    name="nama"
                                    class="form-control"
                                    required="">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label>Nama Team</label>
                                <input type="text"
                                    placeholder="nama team"
                                    name="nama_team"
                                    class="form-control"
                                    required="">
                                <!-- <div class="invalid-feedback">
                                    Oh no! Email is invalid.
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label>Nomor Punggung</label>
                                <input type="text"
                                    placeholder="nomor punggung"
                                    name="nomor_punggung"
                                    class="form-control"
                                    required="">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="text"
                                    placeholder="usia"
                                    name="usia"
                                    class="form-control"
                                    required="numeric">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label class="d-block">Position</label>
                                <div class="form-check">
                                    <input class="form-check-input"
                                        type="radio"
                                        name="position"
                                        id="position1"
                                        value="Attacker"
                                        checked>
                                    <label class="form-check-label"
                                        for="position1">
                                        Attacker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"
                                        type="radio"
                                        value="Keeper"
                                        name="position"
                                        id="position2">
                                    <label class="form-check-label"
                                        for="position2">
                                        Keeper
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Goal or Save</label>
                                <select class="form-control" name="goal_cleansheet">
                                    <option value="20">0 Goal or Save</option>
                                    <option value="40">1-3 Goal or Save</option>
                                    <option value="60">4-7 Goal or Save</option>
                                    <option value="80">8-10 Goal or Save</option>
                                    <option value="100">Diatas 10 Goal or Save</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Assist or Cleansheet</label>
                                <select class="form-control" name="assist_save">
                                    <option value="20">0 Assist or Cleansheet</option>
                                    <option value="40">1-3 Assist or Cleansheet</option>
                                    <option value="60">4-7 Assist or Cleansheet</option>
                                    <option value="80">8-10 Assist or Cleansheet</option>
                                    <option value="100">Diatas 10 Assist or Cleansheet</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Yellow Card</label>
                                <select class="form-control" name="yellow_card">
                                    <option value="100">0 Yellow Card</option>
                                    <option value="80">1-3 Yellow Card</option>
                                    <option value="60">4-7 Yellow Card</option>
                                    <option value="40">8-10 Yellow Card</option>
                                    <option value="20">Diatas 10 Yellow Card</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Yellow Card</label>
                                <select class="form-control" name="red_card">
                                    <option value="100">0 Red Card</option>
                                    <option value="80">1-3 Red Card</option>
                                    <option value="60">4-7 Red Card</option>
                                    <option value="40">8-10 Red Card</option>
                                    <option value="20">Diatas 10 Red Card</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
