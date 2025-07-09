<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .highlight {
            background-color: #d9ead3;
        }
        .highlight1 {
            background-color: #ffffff;
        }
        .header {
            background-color: #ffff00;
        }
        .notes {
            margin-top: 20px;
            font-size: 12px;
        }
        .notes p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    {{-- @dd($lessonSchedule) --}}
    <h2 align="center">Daftar Pelajaran Kelas {{ $classroom->name }}</h2>
    <table>
        <thead>
            <tr>
                <th class="header">JAM KE</th>
                <th class="header">WAKTU</th>
                <th class="header">SENIN</th>
                <th class="header">SELASA</th>
                <th class="header">RABU</th>
                <th class="header">KAMIS</th>
                <th class="header">JUMAT</th>
                <th class="header">SABTU</th>
            </tr>
        </thead>
        <tbody>
            <tr class="highlight1">
                <td>1</td>
                <td>07.30-08.35</td>
                <td>UPACARA</td>
                <td>Bhs Indonesia</td>
                <td>Bhs Indonesia</td>
                <td>Seni</td>
                <td>PAI</td>
                <td>PJOK</td>
            </tr>
            <tr class="highlight1">
                <td>2</td>
                <td>08.35-08.40</td>
                <td>BTA</td>
                <td>Bhs Indonesia</td>
                <td>Bhs Indonesia</td>
                <td>Seni</td>
                <td>PAI</td>
                <td>PJOK</td>
            </tr>
            <tr class="highlight1">
                <td>3</td>
                <td>08.40-09.15</td>
                <td>BTA</td>
                <td>Bhs Indonesia</td>
                <td>Bhs Indonesia</td>
                <td>Seni</td>
                <td>PAI</td>
                <td>PJOK</td>
            </tr>
            <tr class="highlight">
                <td></td>
                <td>09.15-09.30</td>
                <td colspan="6">ISTIRAHAT</td>
            </tr>
            <tr class="highlight1">
                <td>4</td>
                <td>09.30-10.05</td>
                <td>MTK</td>
                <td>MTK</td>
                <td>Pend. Pancasila</td>
                <td>Pend. Pancasila</td>
                <td>Bhs Inggris</td>
                <td>Bhs. Daerah</td>
            </tr>
            <tr class="highlight1">
                <td>5</td>
                <td>10.05-10.40</td>
                <td>MTK</td>
                <td>MTK</td>
                <td>Pend. Pancasila</td>
                <td>Pend. Pancasila</td>
                <td>Bhs Inggris</td>
                <td>Bhs. Daerah</td>
            </tr>
            <tr class="highlight">
                <td></td>
                <td>10.40-10.55</td>
                <td colspan="6">ISTIRAHAT</td>
            </tr>
            <tr class="highlight1">
                <td>6</td>
                <td>10.55-11.30</td>
                <td>P5</td>
                <td>P5</td>
                <td>P5</td>
                <td>P5</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr class="highlight1">
                <td>7</td>
                <td>11.30-12.05</td>
                <td>P5</td>
                <td>P5</td>
                <td>P5</td>
                <td>P5</td>
                <td>-</td>
                <td>-</td>
            </tr>
        </tbody>
    </table>
    <div class="notes" style="text-align: center;">
        <p>Diikuti oleh peserta didik sesuai dengan agama masing-masing.</p>
        <p>Satuan pendidikan menyediakan minimal 1 (satu) jenis seni (Seni Musik, Seni Rupa, Seni Teater, dan/atau Seni Tari). Peserta didik memilih 1 (satu) jenis seni (Seni Musik, Seni Rupa, Seni Teater, atau Seni Tari).</p>
        <p>Paling banyak 2 (dua) JP per minggu atau 72 (tujuh puluh dua) JP per tahun sebagai mata pelajaran pilihan.</p>
        <p>Total JP tidak termasuk mata pelajaran Bahasa Inggris, Muatan Lokal, dan/atau mata pelajaran tambahan yang diselenggarakan oleh satuan pendidikan.</p>
    </div>
</body>
</html>
