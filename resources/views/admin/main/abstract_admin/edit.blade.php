@extends('admin/layouts/app')
@section('path')
Register Courses
@endsection
@section('content')

<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0 d-flex justify-content-between">
                    <h3 class="mb-0">Send Abstract</h3>
                    <a href="{{route('abstract-admin.index')}}" class="btn btn-outline-success btn-sm"><i
                        class="bi bi-arrow-left"></i> Back</a>
                </div>

                <form action="{{route('abstract-admin.updatePartial', ['id_abstrak' => $data_abstract->id_abstrak, 'id_mahasiswa' => $data_abstract->mahasiswa_id])}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf

                    <!-- Light table -->
                    <div class="table-responsive">
                        <div class="card-body">
                            <h3 class="mb-0">Please make sure all fields are filled in correctly.</h3>
                            <div class="row mt-5 justify-content-center">
                                <div class="col-xl-10">
                                    <label for="form-control">Student Name</label>
                                    <input type="text" class="form-control" placeholder="{{ $data_abstract->mahasiswa->nama }}" disabled>
                                </div>
                            </div>


                            <div class="row mt-3 mb-5 justify-content-center" id="container-foto-bukti-pembayaran">
                                <div class="col-xl-10">
                                    <label for="form-control">File Abstract</label>
                                    <input class="form-control customicon" type="file" name="path_file_abstrak_admin"
                                        required>
                                    <small class="form-text text-muted">
                                        * File format must be in word (doc, docx).
                                        <br>

                                    </small>
                                </div>
                            </div>




                            <div class="row justify-content-center mb-5">
                                <div class="col-xl-10">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection

    @push('js')
    {{-- <script>
        $(function() {
            $("#courses-dropdown").on("change", async function() {
                // Disable dropdown session saat JSON masih diload.
                $("#courses-session").attr("disabled", "disabled");
                
                // Ubah dropdown schedules
                await $.getJSON(
                    `api/courses/${ $(this).val() }/schedules`, 
                    function(jsonData) {  
                        let select = "<select class='form-control' id='courses-session' name='jadwal_id'>";
                        $.each(jsonData, function(i, jadwal) {
                            select += `<option value='${jadwal.id_jadwal}'>`
                            + `${jadwal.hari}, ${jadwal.jadwal_mulai.substring(0, 5)} - `
                            + `${jadwal.jadwal_selesai.substring(0, 5)}`
                            + "</option>";
                        });
                        select += "</select>";
                        $("#courses-session").html(select);
                    }
                );

                // Enable dropdown session saat JSON selesai diload.
                $("#courses-session").removeAttr("disabled");

                // Hide dan show foto mahasiswa
                $.getJSON(
                    `api/courses/${ $(this).val() }`, 
                    function(jsonData) {
                        const kursus = jsonData[0];
                        const containerFotoBuktiPembayaran = $("#container-foto-bukti-pembayaran");
                        const containerFotoMahasiswa = $("#container-foto-mahasiswa");
                        const containerSertifikat = $("#container-sertifikat");
                        
                        if (kursus.sertifikat === 1) {
                            containerFotoBuktiPembayaran.removeClass("mb-5").addClass("mb-4");
                            containerFotoMahasiswa.removeClass("mb-5").addClass("mb-4");
                            containerSertifikat.removeClass("d-none");
                        } else {
                            containerFotoBuktiPembayaran.removeClass("mb-4").addClass("mb-5");
                            containerFotoMahasiswa.removeClass("mb-4").addClass("mb-5");
                            containerSertifikat.addClass("d-none");
                            
                        }
                    }
                );
            });
           
        });
    </script> --}}
    @endpush