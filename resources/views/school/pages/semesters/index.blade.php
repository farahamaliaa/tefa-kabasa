@php
    use App\Enums\SemesterEnum;
    use Carbon\Carbon;
    use Illuminate\Support\Str;

    $firstSemester = $semesters->sortBy('created_at')->first();
    // dd($semesters);
    $latestSemester = $semesters->sortByDesc('created_at')->first();
@endphp
@extends('school.layouts.app')

@section('style')
    <style>
        .btn-primary.toggle-btn.active {
            background-color: #5D87FF;
            border: none;
        }

        .btn-primary.toggle-btn:not(.active) {
            background-color: transparent;
            color: #5D87FF;
        }
    </style>
@endsection

@section('content')
    <div>
        <div class="btn-group" role="group" aria-label="Button Navigation">
            <button type="button"
                class="btn btn-primary toggle-btn {{ $latestSemester->type == SemesterEnum::GANJIL->value ? 'active' : 'btn-ganjil' }}"
                data-toggle="button" aria-pressed="false">
                Ganjil
            </button>
            <button type="button"
                class="btn btn-primary toggle-btn {{ $latestSemester->type == SemesterEnum::GENAP->value ? 'active' : 'btn-genap' }}"
                data-toggle="button" aria-pressed="false">
                Genap
            </button>
        </div>
        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="ganjil" role="tabpanel">
                <div class="container mt-4">
                    <div class="position-relative mb-4">
                        <img src="{{ asset('admin_assets/dist/images/backgrounds/background-semesters.png') }}"
                            alt="Profile Background" class="img-fluid rounded">
                        <div style="position: absolute; top: 25px; left: 30px;">
                            <h6 style="color: white;">Semester Saat Ini :</h6>
                        </div>
                        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                            <h1 style="color: white;">{{ Str::upper($latestSemester->type) }}</h1>
                        </div>
                    </div>
                </div>

                <div class="table-responsive rounded-2 mb-4">
                    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                        <thead class="text-dark fs-4">
                            <tr class="">
                                <th class="fs-4 fw-semibold mb-0">Semester</th>
                                <th class="fs-4 fw-semibold mb-0">Tanggal diubah</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            @forelse ($semesters as $semester)
                                <tr>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if ($semester->type == SemesterEnum::GANJIL->value)
                                                <p> Genap</p>
                                            @else
                                                <p> Ganjil</p>
                                            @endif
                                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-3" width="20"
                                            height="20" viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                    d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32" />
                                            </svg>
                                            <p>{{ ucfirst($semester->type) }}</p>
                                        </div>
                                    </td>
                                    <td>
                                        {{ Carbon::parse($semester->created_at)->isoFormat('DD MMMM YYYY') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No semesters found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.toggle-btn').click(function() {
                $(this).toggleClass('active');
                $('.toggle-btn').not(this).removeClass('active');
                $(this).attr('aria-pressed', $(this).hasClass('active'));
                $('.toggle-btn').not(this).attr('aria-pressed', false);
            });

            function appendRow(type, createdAt) {
                var formattedDate = new Date(createdAt).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                var newRow = `
                <tr>
                    <td>
                        <div class="d-flex justify-content-center">
                            <p>${type.charAt(0).toUpperCase() + type.slice(1)}</p>
                        </div>
                    </td>
                    <td>${formattedDate}</td>
                </tr>
            `;
                $('#tbody').append(newRow);
            }

            $('.btn-ganjil').click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('semesters.store') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                    },
                    data: {
                        school_id: {{ auth()->user()->school->id }},
                        type: '{{ SemesterEnum::GANJIL->value }}'
                    },
                    success: function(res) {
                        location.reload()
                        // appendRow('ganjil', res.created_at);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });

            $('.btn-genap').click(function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('semesters.store') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                    },
                    data: {
                        school_id: {{ auth()->user()->school->id }},
                        type: '{{ SemesterEnum::GENAP->value }}'
                    },
                    success: function(res) {
                        location.reload()
                        // appendRow('genap', res.created_at);
                    },
                    error: function(err) {
                        console.log(err);
                    }
                });
            });
        });
    </script>
@endsection
