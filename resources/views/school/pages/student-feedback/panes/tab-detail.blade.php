<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle">
        <thead class="text-dark fs-4">
            <tr class="">
                <th class="text-white" style="background-color: #5D87FF;">No</th>
                <th class="text-white" style="background-color: #5D87FF;">Nama Siswa</th>
                <th class="text-white" style="background-color: #5D87FF;">Jenis Kelamin
                </th>
                <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
                <th class="text-white text-center" style="background-color: #5D87FF;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if ($teacherSubject)
                @forelse ($teacherSubject as $data)
                    @if ($data && isset($feedbacks[$data->id]))
                        @forelse ($feedbacks[$data->id] as $feedback)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $feedback->student->image ? asset('storage/'. $feedback->student->image) : asset('assets/images/default-user.jpeg') }}"
                                            class="rounded-circle me-2 user-profile"
                                            style="object-fit: cover" width="40" height="40"
                                            alt="" />
                                        <div class="ms-3">
                                            <h6 class="fs-4 fw-semibold mb-0 text-start">
                                                {{ $feedback->student->user->name }}</h6>
                                            <span class="fw-normal">{{ $feedback->student->classroomStudents->first()->classroom->name }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $feedback->student->gender->label() }}</td>
                                <td>{{ $feedback->student->classroomStudents()->latest()->first()->classroom->name }}</td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" type="button" class="btn-detail"
                                        data-name="{{ $feedback->student->user->name }}"
                                        data-classroom="{{ $feedback->student->classroomStudents->first()->classroom->name }}"
                                        data-is_teacher_present="{{ $feedback->is_teacher_present }}"
                                        data-summary="{{ $feedback->summary }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                            height="20" viewBox="0 0 12 12">
                                            <path fill="currentColor"
                                                d="M1.974 6.659a.5.5 0 0 1-.948-.317c-.01.03 0-.001 0-.001a2 2 0 0 1 .062-.162c.04-.095.099-.226.18-.381c.165-.31.422-.723.801-1.136C2.834 3.827 4.087 3 6 3s3.166.827 3.931 1.662a5.5 5.5 0 0 1 .98 1.517l.046.113c.003.008.013.06.023.11L11 6.5s.084.333-.342.474a.5.5 0 0 1-.632-.314v-.003l-.006-.016l-.031-.078a4.5 4.5 0 0 0-.795-1.226C8.584 4.674 7.587 4 6 4s-2.584.673-3.194 1.338a4.5 4.5 0 0 0-.795 1.225l-.03.078zM6 5a2 2 0 1 0 0 4a2 2 0 0 0 0-4M5 7a1 1 0 1 1 2 0a1 1 0 0 1-2 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center align-middle">Tidak ada tanggapan dari siswa</td>
                            </tr>
                        @endforelse
                    @endif
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div
                                class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                                    alt="" width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Tidak ada tanggapan dari siswa
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            @endif
        </tbody>
    </table>
</div>
