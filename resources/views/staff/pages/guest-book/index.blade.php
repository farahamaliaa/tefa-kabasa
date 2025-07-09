@extends('staff.fulllayouts.app')

@section('title')
    Buku Tamu
@endsection

@section('content')
    <h2 class="text-white pt-3"><b>Selamat Datang di Buku Tamu</b></h2>
    <h6 class="text-white">Kunjungan akan di simpan dibuku tamu dan direkap oleh sekolah</h6>

    <div class="row">
        <div class="col-12 pt-3">
            <div class="card p-2 border" style="border: none; border-radius: 30px">
                <div class="card-body">
                    <form action="{{ route('employee.guestbook.store') }}" method="POST" enctype="multipart/form-data">
                        @method('post')
                        @csrf
                        <div class="d-flex align-items-center justify-content-between flex-column flex-md-row"
                            style="border-bottom: 2px solid #CCCCCC; padding-bottom: 5px;">
                            <h4 class="mb-4">
                                <b>Pengisian Form</b>
                            </h4>
                            </span>
                        </div>


                        <div class="row">
                            <div class="col-lg-8 pt-3">
                                <div class="card shadow-none position-relative rounded-3 overflow-hidden mb-0"
                                    style="background: linear-gradient(to bottom, #51B6FF, #4F7CFF);">
                                    <div class="card-body px-4 py-3">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <div class="d-flex align-items-center gap-2 mb-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-white"
                                                        width="25" height="25" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="m12 2l.642.005l.616.017l.299.013l.579.034l.553.046c4.687.455 6.65 2.333 7.166 6.906l.03.29l.046.553l.041.727l.006.15l.017.617L22 12l-.005.642l-.017.616l-.013.299l-.034.579l-.046.553c-.455 4.687-2.333 6.65-6.906 7.166l-.29.03l-.553.046l-.727.041l-.15.006l-.617.017L12 22l-.642-.005l-.616-.017l-.299-.013l-.579-.034l-.553-.046c-4.687-.455-6.65-2.333-7.166-6.906l-.03-.29l-.046-.553l-.041-.727l-.006-.15l-.017-.617l-.004-.318v-.648l.004-.318l.017-.616l.013-.299l.034-.579l.046-.553c.455-4.687 2.333-6.65 6.906-7.166l.29-.03l.553-.046l.727-.041l.15-.006l.617-.017Q11.673 2 12 2m0 9h-1l-.117.007a1 1 0 0 0 0 1.986L11 13v3l.007.117a1 1 0 0 0 .876.876L12 17h1l.117-.007a1 1 0 0 0 .876-.876L14 16l-.007-.117a1 1 0 0 0-.764-.857l-.112-.02L13 15v-3l-.007-.117a1 1 0 0 0-.876-.876zm.01-3l-.127.007a1 1 0 0 0 0 1.986L12 10l.127-.007a1 1 0 0 0 0-1.986z" />
                                                    </svg>
                                                    <h5 class="text-white fw-semibold mb-0">Informasi</h5>
                                                </div>

                                                <p class="text-white">Fitur buku tamu ini memungkinkan Anda mencatat dan
                                                    melacak data pengunjung,
                                                    memberikan catatan lengkap tentang siapa saja yang telah berkunjung</p>
                                            </div>
                                            <div class="col-4">
                                                <div class="text-center">
                                                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc2.png') }}"
                                                        alt="" class="img-fluid mb-n5"
                                                        style="width: 300px; height: auto;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-4 pt-3">
                                <div class="card rounded-3"
                                    style="background: linear-gradient(to bottom, #FFB431, #F6BB22); color: white; position: relative;">
                                    <div class="card-body" style="position: relative; z-index: 1;">
                                        <div class="d-flex justify-content-between" style="margin-bottom: 13px; border-bottom-right-radius: 20px">
                                            <h5 class="fw-semibold mb-0 text-white">Tanggal Saat Ini</h5>
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <h3 class="fw-semibold text-white" id="currentDate"></h3>
                                    </div>
                                <img src="{{ asset('assets/images/background/buble-5.png') }}" alt="Image"
                                        class="position-absolute"
                                        style="bottom: 0; right: 0; width: 110px; height: auto; z-index: 0;">
                                </div>
                            </div>

                            <div class="col-12 col-md-8 pt-3">
                                <div class="row">
                                    <input type="hidden" name="date" id="currentDateInput">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="name1" class="mb-2"><b>Nama</b></label>
                                            <input type="text" class="form-control" id="name1"
                                                placeholder="Masukkan nama" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="status" class="mb-2"><b>Status</b></label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="individual">Individu</option>
                                                <option value="negeri">Negeri</option>
                                                <option value="swasta">Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="email" class="mb-2"><b>Email</b></label>
                                            <input type="email" class="form-control" id="email"
                                                placeholder="Masukkan email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="phone_number" class="mb-2"><b>Nomor Telepon</b></label>
                                            <input type="number" class="form-control" id="phone_number"
                                                placeholder="Masukkan nomor telepon" name="phone_number">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="position" class="mb-2"><b>Jabatan</b></label>
                                            <input type="text" class="form-control" id="position"
                                                placeholder="Masukkan jabatan" name="position">
                                        </div>
                                    </div>
                                    <div class="col-md-6" id="instansi-container" style="display: none;">
                                        <div class="form-group">
                                            <label for="address" class="mb-2"><b>Asal Instansi</b></label>
                                            <input type="text" class="form-control" id="address"
                                                placeholder="Masukkan asal instansi" name="address">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mb-3 pt-3">
                                <label for="needs" class="mb-2"><b>Keperluan</b></label>
                                <textarea class="form-control" id="needs" placeholder="Masukkan keperluan" name="needs" rows="7"></textarea>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn mb-1 waves-effect waves-light px-5" type="submit"
                                    style="background-color: #13DEB9; color: white;">Simpan</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('staff.pages.guest-book.scripts.script-input')
@endsection
