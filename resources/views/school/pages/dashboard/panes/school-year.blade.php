<div class="row">
    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100 border bg-transparent">
            <div class="card-body flex-column">
                <div class="d-flex justify-content-between align-items-stretch">
                    <div>
                        <h4 class="mb-3 me-2"><b>Tahun Ajaran Saat Ini</b></h4>
                        <h3 class="text-warning fw-semibold mb-0"><b>{{ $schoolYear->school_year }}</b></h3>
                    </div>
                    <div>
                        <span class="badge font-medium bg-light-warning text-warning d-flex align-items-center"
                            style="padding: 15px; border-radius: 8px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                            </svg>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6 d-flex align-items-stretch">
        <div class="card w-100 border bg-transparent">
            <div class="card-body flex-column">
                <div class="d-flex justify-content-between align-items-stretch">
                    <div>
                        <h4 class="mb-3 me-2"><b>Semester Saat ini</b></h4>
                        <h3 class="text-primary fw-semibold mb-0">
                            <b>{{ $semester->type == 'ganjil' ? 'Ganjil' : 'Genap' }}</b></h3>
                    </div>
                    <div>
                        <span class="badge font-medium bg-light-primary text-primary d-flex align-items-center"
                            style="padding: 15px; border-radius: 8px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="39" height="39" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5.616 20q-.667 0-1.141-.475T4 18.386V5.615q0-.666.475-1.14T5.615 4h4.27q.666 0 1.14.475t.475 1.14v12.77q0 .666-.475 1.14T9.885 20zm8.5 0q-.667 0-1.141-.475t-.475-1.14v-4.77q0-.666.475-1.14t1.14-.475h4.27q.666 0 1.14.475t.475 1.14v4.77q0 .666-.475 1.14t-1.14.475zm0-9q-.667 0-1.141-.475t-.475-1.14v-3.77q0-.666.475-1.14T14.115 4h4.27q.666 0 1.14.475T20 5.615v3.77q0 .666-.475 1.14t-1.14.475z" />
                            </svg>
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
