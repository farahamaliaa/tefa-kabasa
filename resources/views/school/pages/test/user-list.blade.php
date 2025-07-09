<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List | Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .nav-tabs {
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #fff;
            border-top: 1px solid #dee2e6;
            width: 100%;
            justify-content: center;
            z-index: 1000; /* Ensure tabs are above content */
        }

        .nav-tabs .nav-item {
            margin-bottom: 0;
        }

        .nav-tabs .nav-link {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 0.25rem;
            padding: 0.5rem 1rem;
        }

        .nav-tabs .nav-link svg {
            width: 20px;
            height: 20px;
            margin-bottom: 0.25rem; /* Adjust vertical spacing */
        }

        .tab-content {
            padding-top: 100px; /* Adjust based on tab navigation height */
        }

        .table-card {
            border-radius: 15px 15px 0 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-top: -50px; /* Offset for overlapping tab navigation */
            background-color: #fff; /* Ensure table background is white */
        }

        .table-card .card-body {
            padding: 1.5rem; /* Adjust padding for table content */
        }

        .table-card .table {
            margin-bottom: 0;
            text-align: center; /* Center align table content */
        }

        .table-card .table th,
        .table-card .table td {
            border-top: 0;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="align-items-center mb-4">
            <h3 class="text-center flex-grow-1 m-0">Daftar Pengguna</h3>
            <div class="d-flex justify-content-between">
                <div class="text-start">
                    <a href="{{ route('attendance-test.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="Search">
                    <input type="date" class="form-control">
                </div>
            </div>
        </div>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="table1" role="tabpanel" aria-labelledby="table1-tab">
                <div class="card table-card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Sekolah</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Istirahat</th>
                                    <th>Kembali</th>
                                    <th>Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="table2" role="tabpanel" aria-labelledby="table2-tab">
                <div class="card table-card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Sekolah</th>
                                    <th>Keterangan</th>
                                    <th>Masuk</th>
                                    <th>Istirahat</th>
                                    <th>Kembali</th>
                                    <th>Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>John Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="table1-tab" data-bs-toggle="tab" data-bs-target="#table1" type="button"
                role="tab" aria-controls="table1" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M6 30h20v-5a7.01 7.01 0 0 0-7-7h-6a7.01 7.01 0 0 0-7 7zM9 9a7 7 0 1 0 7-7a7 7 0 0 0-7 7" />
                </svg>
                <span>Siswa</span>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="table2-tab" data-bs-toggle="tab" data-bs-target="#table2" type="button"
                role="tab" aria-controls="table2" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
                    <path fill="currentColor"
                        d="M4 6a2 2 0 1 0 0-4a2 2 0 0 0 0 4m4.5 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3M2.25 7C1.56 7 1 7.56 1 8.25c0 0 0 2.25 3 2.25c2.378 0 2.871-1.414 2.973-2C7 8.347 7 8.25 7 8.25C7 7.56 6.44 7 5.75 7zm5.746 1.6q-.003.06-.012.142a2.9 2.9 0 0 1-.42 1.16c.265.061.574.098.935.098c2.5 0 2.5-1.75 2.5-1.75c0-.69-.56-1.25-1.25-1.25H7.62c.24.358.379.787.379 1.25v.25z" />
                </svg>
                <span>Pegawai</span>
            </button>
        </li>
    </ul>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
