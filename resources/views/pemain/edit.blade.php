@extends('layouts.app')

@section('title', 'SPK DSS Futsal')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')<div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pemain</h1>
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
                    <form action="{{ route('pemain.update', $pemain->id) }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Pemain</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Pemain</label>
                                <input type="text"
                                    value="{{$pemain->nama}}"
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
                                    value="{{$pemain->nama_team}}"
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
                                    value="{{$pemain->nomor_punggung}}"
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
                                    value="{{$pemain->usia}}"
                                    name="usia"
                                    class="form-control"
                                    required="">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label class="d-block">Position</label>
                                <div class="form-check">
                                    <input class="form-check-input"
                                        type="radio"
                                        @if($pemain->position == "Attacker")
                                            @checked(true)
                                        @endif
                                        value="Attacker"
                                        name="position"
                                        id="position1">
                                    <label class="form-check-label"
                                        for="position1">
                                        Attacker
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input"
                                        @if($pemain->position == "Keeper")
                                            @checked(true)
                                        @endif
                                        value="Keeper"
                                        type="radio"
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
                                    <option value="{{$pemain->goal_cleansheet}}" @if ($pemain->goal_cleansheet == 20 ) selected="selected" @endif>0 Goal or Save</option>
                                    <option value="{{$pemain->goal_cleansheet}}" @if ($pemain->goal_cleansheet == 40 ) selected="selected" @endif>1-3 Goal or Save</option>
                                    <option value="{{$pemain->goal_cleansheet}}" @if ($pemain->goal_cleansheet == 60 ) selected="selected" @endif>4-7 Goal or Save</option>
                                    <option value="{{$pemain->goal_cleansheet}}" @if ($pemain->goal_cleansheet == 80 ) selected="selected" @endif>8-10 Goal or Save</option>
                                    <option value="{{$pemain->goal_cleansheet}}" @if ($pemain->goal_cleansheet == 100 ) selected="selected" @endif>Diatas 10 Goal or Save</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Assist or Cleansheet</label>
                                <select class="form-control" name="assist_save">
                                    <option value="{{$pemain->assist_save}}" @if ($pemain->assist_save == 20 ) selected="selected" @endif>0 Assist or Cleansheet</option>
                                    <option value="{{$pemain->assist_save}}" @if ($pemain->assist_save == 40 ) selected="selected" @endif>1-3 Assist or Cleansheet</option>
                                    <option value="{{$pemain->assist_save}}" @if ($pemain->assist_save == 60 ) selected="selected" @endif>4-7 Assist or Cleansheet</option>
                                    <option value="{{$pemain->assist_save}}" @if ($pemain->assist_save == 80 ) selected="selected" @endif>8-10 Assist or Cleansheet</option>
                                    <option value="{{$pemain->assist_save}}" @if ($pemain->assist_save == 100 ) selected="selected" @endif>Diatas 10 Assist or Cleansheet</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Red Card</label>
                                <input type="text"
                                    placeholder="Red Card"
                                    value="{{$pemain->red_card}}"
                                    name="red_card"
                                    class="form-control"
                                    required="">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                            <div class="form-group">
                                <label>Yellow Card</label>
                                <input type="text"
                                    placeholder="Red Card"
                                    value="{{$pemain->yellow_card}}"
                                    name="yellow_card"
                                    class="form-control"
                                    required="">
                                <!-- <div class="valid-feedback">
                                    Good job!
                                </div> -->
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Ubah</button>
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
