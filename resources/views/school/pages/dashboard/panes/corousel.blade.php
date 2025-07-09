<div class="owl-carousel custom-carousel owl-theme">
    <div class="item">
        <div class="card border-0 zoom-in bg-light-warning shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="50" height="50" viewBox="0 0 36 36">
                        <path fill="currentColor"
                            d="M16.43 16.69a7 7 0 1 1 7-7a7 7 0 0 1-7 7m0-11.92a5 5 0 1 0 5 5a5 5 0 0 0-5-5M22 17.9a25.4 25.4 0 0 0-16.12 1.67a4.06 4.06 0 0 0-2.31 3.68v5.95a1 1 0 1 0 2 0v-5.95a2 2 0 0 1 1.16-1.86a22.9 22.9 0 0 1 9.7-2.11a23.6 23.6 0 0 1 5.57.66Zm.14 9.51h6.14v1.4h-6.14z" />
                        <path fill="currentColor"
                            d="M33.17 21.47H28v2h4.17v8.37H18v-8.37h6.3v.42a1 1 0 0 0 2 0V20a1 1 0 0 0-2 0v1.47H17a1 1 0 0 0-1 1v10.37a1 1 0 0 0 1 1h16.17a1 1 0 0 0 1-1V22.47a1 1 0 0 0-1-1" />
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-warning mb-1">Pegawai</p>
                    <h5 class="fw-semibold text-warning mb-0">{{ $employees }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-light-success shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="65" height="50"
                        viewBox="0 0 640 512">
                        <path fill="currentColor"
                            d="M208 352c-2.39 0-4.78.35-7.06 1.09C187.98 357.3 174.35 360 160 360s-27.98-2.7-40.95-6.91c-2.28-.74-4.66-1.09-7.05-1.09C49.94 352-.33 402.48 0 464.62C.14 490.88 21.73 512 48 512h224c26.27 0 47.86-21.12 48-47.38c.33-62.14-49.94-112.62-112-112.62m-48-32c53.02 0 96-42.98 96-96s-42.98-96-96-96s-96 42.98-96 96s42.98 96 96 96M592 0H208c-26.47 0-48 22.25-48 49.59V96c23.42 0 45.1 6.78 64 17.8V64h352v288h-64v-64H384v64h-76.24c19.1 16.69 33.12 38.73 39.69 64H592c26.47 0 48-22.25 48-49.59V49.59C640 22.25 618.47 0 592 0" />
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-success mb-1">Guru</p>
                    <h5 class="fw-semibold text-success mb-0">{{ $teachers }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-light-danger shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-danger" width="60" height="60"
                        viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2">
                            <path d="M22 9L12 5L2 9l10 4l10-4v6"></path>
                            <path d="M6 10.6V16a6 3 0 0 0 12 0v-5.4"></path>
                        </g>
                    </svg>
                    <p class="fw-semibold fs-3 mt-2 text-danger mb-1">Alumni</p>
                    <h5 class="fw-semibold text-danger mb-0">{{ $alumni }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card border-0 zoom-in bg-light-info shadow-none">
            <div class="card-body p-5">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="55" height="55" viewBox="0 0 14 14">
                        <path fill="#5D87FF" fill-rule="evenodd"
                            d="M6.375 1.653C5.386 1.099 3.536.42 1.496.179C.674.082 0 .76 0 1.588v8c0 .829.677 1.489 1.492 1.637c1.84.334 3.371 1.216 4.348 1.914c.164.117.345.205.535.266zm1.25 11.752c.19-.06.37-.149.534-.265c.977-.698 2.508-1.581 4.349-1.915c.815-.148 1.492-.808 1.492-1.637v-8C14 .76 13.326.082 12.504.18c-2.04.242-3.89.92-4.879 1.474v11.752Z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="fw-semibold fs-5 mt-2 text-info mb-1">Siswa</p>
                    <h5 class="fw-semibold text-info mb-0">{{ $students }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
