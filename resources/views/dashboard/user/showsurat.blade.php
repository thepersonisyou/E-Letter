@extends('dashboard.layouts.main')

@section('isi')
    <main>
        <div class="container-fluid px-3">
            <button type="submit" class="kembali btn btn-primary btn-sm mb-2 p-1" onclick="javascript:window.history.back();">
                <i class="fa fa-arrow-left" ></i> Kembali
            </button>
            <div class="row gx-4">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header">Detail Surat</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th><i class="fa fa-user" ></i> Pengirim</th>
                                            <td>{{ optional($surat)->pengirim }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-envelope" ></i> Nomor Surat</th>
                                            <td>{{ optional($surat)->nomor_surat }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-calendar" ></i> Tanggal Surat</th>
                                            <td>{{ optional($surat->tanggal_surat)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-calendar" ></i> Tanggal Diterima</th>
                                            <td>{{ optional($surat->tanggal_diterima)->format('d-m-Y') }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-file-text" ></i> Perihal</th>
                                            <td>{{ optional($surat)->perihal }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-building" ></i> Asal Surat</th>
                                            <td>{{ optional($surat)->asal_surat }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-sitemap" ></i> Departemen</th>
                                            <td>{{ optional($surat)->departemen }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fa fa-folder" ></i> Tipe Surat</th>
                                            <td>{{ optional($surat)->tipe_surat }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fa fa-file-pdf" ></i> File Surat -
                            <a href="{{ route('download', $surat->id) }}" class="btn btn-sm btn-primary">
                                <i class="fa fa-download"  aria-hidden="true"></i> &nbsp; Download Surat
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <embed src="{{ asset('storage/' . $surat->file_surat) }}" width="500" height="335" type="application/pdf">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
