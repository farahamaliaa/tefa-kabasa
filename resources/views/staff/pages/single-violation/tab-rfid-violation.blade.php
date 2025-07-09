@extends('staff.pages.single-violation.layout.app')

@section('style')
    <style>
        .card {
            position: relative;
            height: 90vh;
            overflow: hidden;
        }

        .blob {
            filter: blur(10px);
            position: absolute;
            z-index: 1;
        }

        .blob-1 {
            width: 150px;
            height: 150px;
            top: -10%;
            left: 60%;
        }

        .blob-2 {
            width: 100px;
            height: 100px;
            bottom: 15%;
            left: 75%;
            top: 35%;
        }

        .blob-3 {
            width: 100px;
            height: 100px;
            bottom: 5%;
            right: 70%;
            top: 50%;
        }

        .blob-4 {
            width: 180px;
            height: 180px;
            top: 70%;
            right: 80%;
        }

        .card-img-overlay {
            position: absolute;
            top: 45px;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 2;
        }

        .card-logo {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 3;
            width: auto;
            height: 50px;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card border">
                <div class="card-body">
                    <section style="position: relative; width: 100%; height: 100%;">
                        <div class="blob blob-1">
                            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" id="blobSvg">
                                <path fill="#5D87FF">
                                    <animate attributeName="d" dur="5000ms" repeatCount="indefinite"
                                        values="
                                        M428,318Q438,386,371.5,403Q305,420,247,429Q189,438,128,410.5Q67,383,46.5,316.5Q26,250,60.5,194Q95,138,138,87.5Q181,37,242,62Q303,87,340.5,122Q378,157,398,203.5Q418,250,428,318Z;
                                        M414.5,313.5Q425,377,372.5,420.5Q320,464,259,436.5Q198,409,162,374.5Q126,340,108,295Q90,250,77.5,183Q65,116,127.5,90.5Q190,65,258,41Q326,17,387,61.5Q448,106,426,178Q404,250,414.5,313.5Z;
                                        M446,323Q451,396,386.5,434.5Q322,473,257.5,449.5Q193,426,136.5,399.5Q80,373,79.5,311.5Q79,250,64.5,177.5Q50,105,121.5,89.5Q193,74,259.5,45.5Q326,17,354.5,85Q383,153,412,201.5Q441,250,446,323Z;
                                        M459,321.5Q447,393,387,440Q327,487,255,472Q183,457,140,409Q97,361,77.5,305.5Q58,250,77.5,194.5Q97,139,144.5,105Q192,71,254,58.5Q316,46,382,76Q448,106,459.5,178Q471,250,459,321.5Z;
                                        M428,318Q438,386,371.5,403Q305,420,247,429Q189,438,128,410.5Q67,383,46.5,316.5Q26,250,60.5,194Q95,138,138,87.5Q181,37,242,62Q303,87,340.5,122Q378,157,398,203.5Q418,250,428,318Z;">
                                    </animate>
                                </path>
                            </svg>
                        </div>
                        <div class="blob blob-2">
                            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" id="blobSvg">
                                <path fill="#5D87FF">
                                    <animate attributeName="d" dur="5000ms" repeatCount="indefinite"
                                        values="
                                        M437.5,309Q412,368,366.5,418.5Q321,469,249,471.5Q177,474,136.5,418Q96,362,52.5,306Q9,250,64.5,203Q120,156,146.5,84.5Q173,13,245.5,27Q318,41,362.5,88.5Q407,136,435,193Q463,250,437.5,309Z;
                                        M460,320Q443,390,372,398.5Q301,407,252,400Q203,393,135.5,387.5Q68,382,51.5,316Q35,250,63,192.5Q91,135,146.5,119Q202,103,252.5,95.5Q303,88,369,101.5Q435,115,456,182.5Q477,250,460,320Z;
                                        M443.5,320.5Q445,391,373,398.5Q301,406,238,443Q175,480,140.5,417.5Q106,355,79,302.5Q52,250,75,195Q98,140,138,84.5Q178,29,246.5,39.5Q315,50,365.5,89.5Q416,129,429,189.5Q442,250,443.5,320.5Z;
                                        M437,309Q413,368,359.5,395Q306,422,242,447.5Q178,473,123.5,427.5Q69,382,79.5,316Q90,250,78,183Q66,116,122,72Q178,28,237,67.5Q296,107,347.5,124.5Q399,142,430,196Q461,250,437,309Z;
                                       M437.5,309Q412,368,366.5,418.5Q321,469,249,471.5Q177,474,136.5,418Q96,362,52.5,306Q9,250,64.5,203Q120,156,146.5,84.5Q173,13,245.5,27Q318,41,362.5,88.5Q407,136,435,193Q463,250,437.5,309Z;">
                                    </animate>
                                </path>
                            </svg>
                        </div>
                        <div class="blob blob-3">
                            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" id="blobSvg">
                                <path fill="#5D87FF">
                                    <animate attributeName="d" dur="5000ms" repeatCount="indefinite"
                                        values="M428,321Q392,392,321,422.5Q250,453,193.5,408Q137,363,80.5,306.5Q24,250,58.5,171.5Q93,93,171.5,69.5Q250,46,324.5,73.5Q399,101,431.5,175.5Q464,250,428,321Z;
                                        M414,308.5Q367,367,308.5,418.5Q250,470,195.5,414.5Q141,359,83,304.5Q25,250,56,168.5Q87,87,168.5,46.5Q250,6,317.5,60.5Q385,115,423,182.5Q461,250,414,308.5Z;
                                        M434,327Q404,404,327,450Q250,496,183.5,439.5Q117,383,70.5,316.5Q24,250,78,191Q132,132,191,91Q250,50,319.5,80.5Q389,111,426.5,180.5Q464,250,434,327Z;
                                        M420.5,311.5Q373,373,311.5,400.5Q250,428,161.5,427.5Q73,427,86.5,338.5Q100,250,98.5,173.5Q97,97,173.5,76Q250,55,312.5,90Q375,125,421.5,187.5Q468,250,420.5,311.5Z;
                                        M428,321Q392,392,321,422.5Q250,453,193.5,408Q137,363,80.5,306.5Q24,250,58.5,171.5Q93,93,171.5,69.5Q250,46,324.5,73.5Q399,101,431.5,175.5Q464,250,428,321Z;">
                                    </animate>
                                </path>
                            </svg>
                        </div>
                        <div class="blob blob-4">
                            <svg viewBox="0 0 500 500" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" id="blobSvg">
                                <path fill="#5D87FF">
                                    <animate attributeName="d" dur="5000ms" repeatCount="indefinite"
                                        values="M428,321Q392,392,321,422.5Q250,453,193.5,408Q137,363,80.5,306.5Q24,250,58.5,171.5Q93,93,171.5,69.5Q250,46,324.5,73.5Q399,101,431.5,175.5Q464,250,428,321Z;
                                        M414,308.5Q367,367,308.5,418.5Q250,470,195.5,414.5Q141,359,83,304.5Q25,250,56,168.5Q87,87,168.5,46.5Q250,6,317.5,60.5Q385,115,423,182.5Q461,250,414,308.5Z;
                                        M434,327Q404,404,327,450Q250,496,183.5,439.5Q117,383,70.5,316.5Q24,250,78,191Q132,132,191,91Q250,50,319.5,80.5Q389,111,426.5,180.5Q464,250,434,327Z;
                                        M420.5,311.5Q373,373,311.5,400.5Q250,428,161.5,427.5Q73,427,86.5,338.5Q100,250,98.5,173.5Q97,97,173.5,76Q250,55,312.5,90Q375,125,421.5,187.5Q468,250,420.5,311.5Z;
                                        M428,321Q392,392,321,422.5Q250,453,193.5,408Q137,363,80.5,306.5Q24,250,58.5,171.5Q93,93,171.5,69.5Q250,46,324.5,73.5Q399,101,431.5,175.5Q464,250,428,321Z;">
                                    </animate>
                                </path>
                            </svg>
                        </div>
                        <img src="{{ asset('assets/images/background/logo.png') }}" alt="" class="card-logo">
                        <img src="{{ asset('assets/images/background/people.png') }}" alt=""
                            class="card-img-overlay">
                    </section>
                </div>
            </div>
        </div>

        <div class="col-lg-6 ps-4">
            <div class="px-4 form-container">
                <h1 class="pt-4">
                    <b><span class="text-primary">Ma</span>suk</b>
                </h1>
                <h4 class="pt-3">Silahkan tap <span class="text-primary">id card Siswa</span> sekolah Anda untuk memasuki
                    halaman pelanggaran</h4>

                <div class="text-center">
                    <img src="{{ asset('assets/images/background/scan.png') }}" alt="" class="img-fluid"
                        style="max-width: 40%; height: auto; margin-top: 20px;">
                </div>
                <h4 class="mb-3">RFID :</h4>
                <div class="form-group">
                    <input type="text" id="rfidInput" class="form-control"
                        placeholder="Masukkan rfid siswa" style="background-color: #F5F5F5; color: #333;">
                </div>
                <h4 style="margin-top: 140px;" class="text-primary">Copyright by Hummatech</h4>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script>
        const rfidInput = document.getElementById('rfidInput');

        rfidInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault();

                const rfidValue = rfidInput.value;
                const url = '{{ route('employee.post-rfid.violation', '') }}/' + rfidValue;
                window.location.href = url;
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rfidInput = document.getElementById('rfidInput');
            rfidInput.focus();
            rfidInput.select();
        });
    </script>
@endsection
