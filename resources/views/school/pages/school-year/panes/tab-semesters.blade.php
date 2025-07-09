@php
    use App\Enums\SemesterEnum;
    use Carbon\Carbon;

    $firstSemester = $semesters->sortBy('created_at')->first();
    $latestSemester = $semesters->sortByDesc('created_at')->first();
@endphp
<div class="card card-body">

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <button class="nav-link {{ $latestSemester->type == SemesterEnum::GANJIL->value ? 'active' : 'btn-ganjil' }}">
                Ganjil
            </button>
        </li>
        <li class="nav-item">
            <button class="nav-link {{ $latestSemester->type == SemesterEnum::GENAP->value ? 'active' : 'btn-genap' }}">
                Genap
            </button>
        </li>
    </ul>
    <div class="tab-content mt-4">
        <div class="tab-pane fade show active" id="pills-ganjil" role="tabpanel">
            <div class="position-relative mb-4">
                <img src="{{ asset('assets/images/background/background-semester.png') }}" alt="Profile Background" class="img-fluid rounded img-background">
                <div class="position-absolute top-0 start-0 p-3 mb-5">
                    <h6 class="text-white mb-3">Semester Saat Ini :</h6>
                </div>
                <div class="position-absolute top-50 start-50 translate-middle text-center">
                    <h1 class="text-white pt-3">{{ Str::upper($latestSemester->type) }}</h1>
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
                                        <p>{{ $semester->type == SemesterEnum::GANJIL->value ? 'Genap' : 'Ganjil' }}</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mx-3" width="20" height="20" viewBox="0 0 256 256">
                                            <path fill="currentColor" d="m221.66 133.66l-72 72a8 8 0 0 1-11.32-11.32L196.69 136H40a8 8 0 0 1 0-16h156.69l-58.35-58.34a8 8 0 0 1 11.32-11.32l72 72a8 8 0 0 1 0 11.32" />
                                        </svg>
                                        <p>{{ ucfirst($semester->type) }}</p>
                                    </div>
                                </td>
                                <td> {{ Carbon::parse($semester->created_at)->isoFormat('DD MMMM YYYY') }}</td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
