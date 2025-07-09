@extends('school.layouts.app')

@section('style')
    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }

        .select2 {
            width: 100% !important;
        }

        .select2-selection__rendered {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>

    <style>
        .category-selector .dropdown-menu {
            position: absolute;
            z-index: 1050;
            transform: translate3d(0, 0, 0);
        }

        .select2-custom {
            width: 100% !important;
        }

        .select2-custom-selection__rendered {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-custom-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="d-flex flex-wrap">
            <div class="col-12 col-md-6 col-lg-12 mb-3 me-3">
                <form class="position-relative d-flex gap-2">
                    <div>
                        <input type="text" name="search" class="form-control product-search ps-5" id="input-search"
                            placeholder="Cari..." value="{{ old('search', request()->search) }}">
                        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                    <div>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        <button type="button" class="btn mb-1 btn-primary" data-bs-toggle="modal" data-bs-target="#modal-create-access">
            Tambah Pengakses
        </button>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th class="fs-4 fw-semibold mb-0">No</th>
                    <th class="fs-4 fw-semibold mb-0">Nama</th>
                    <th class="fs-4 fw-semibold mb-0">Email</th>
                    <th class="fs-4 fw-semibold mb-0">NIK</th>
                    <th class="fs-4 fw-semibold mb-0">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                    class="rounded-circle me-2 user-profile" style="object-fit: cover" width="30"
                                    height="30" alt="" />
                                {{ $user->user->name }}
                            </div>
                        </td>
                        <td>
                            {{ $user->user->email }}
                        </td>
                        <td>
                            {{ $user->nik }}
                        </td>
                        <td>
                            <div class="d-flex gap-3">
                                <button class="border-0 bg-transparent btn-detail" data-name="{{ $user->user->name }}"
                                    data-email="{{ $user->user->email }}" data-phone="{{ $user->phone_number }}"
                                    data-gender="{{ $user->gender->label() }}" data-nip="{{ $user->nip }}"
                                    data-address="{{ $user->address }}"
                                    data-image="{{ $user->image ? asset('storage/' . $user->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}"
                                    data-rfid="{{ $user->modelHasRfid ? $user->modelHasRfid->rfid : 'Belum memiliki rfid' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-primary" width="20"
                                        height="20" viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4 4 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025l-.035-.109a5.7 5.7 0 0 0-.945-1.674C11.286 5.912 10.045 5 8 5s-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674l-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0" />
                                    </svg>
                                </button>
                                <button class="border-0 bg-transparent btn-delete" data-id="{{ $user->user->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        class="text-danger" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                            d="M9.5 14.5v-3m5 3v-3M3 6.5h18v0c-1.404 0-2.107 0-2.611.337a2 2 0 0 0-.552.552C17.5 7.893 17.5 8.596 17.5 10v5.5c0 1.886 0 2.828-.586 3.414s-1.528.586-3.414.586h-3c-1.886 0-2.828 0-3.414-.586S6.5 17.386 6.5 15.5V10c0-1.404 0-2.107-.337-2.611a2 2 0 0 0-.552-.552C5.107 6.5 4.404 6.5 3 6.5zm6.5-3s.5-1 2.5-1s2.5 1 2.5 1" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada data
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- <div class="pagination justify-content-center mb-0">
    <x-paginate-component :paginator="$levelClasses" />
</div> --}}

    @include('school.pages.access-violation.widgets.modal-create-access')
    @include('school.pages.access-violation.widgets.modal-detail')
    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.access-violation.script.delete-access');
    @include('school.pages.access-violation.script.detail-access');
    @include('school.pages.access-violation.script.select2');
@endsection
