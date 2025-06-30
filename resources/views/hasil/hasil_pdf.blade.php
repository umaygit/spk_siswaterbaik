<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Hasil Penilaian Siswa</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #000;
        }

        th {
            background-color: #eee;
        }

        th, td {
            padding: 6px;
            text-align: center;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Laporan Hasil Penilaian Siswa</h2>

    <table>
        <thead>
            <tr>
                <th>Peringkat</th>
                <th class="text-left">Nama Siswa</th>
                <th>Nilai Akhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hasil as $item)
                <tr>
                    <td>{{ $item->peringkat }}</td>
                    <td class="text-left">{{ $item->siswa->nama_siswa }}</td>
                    <td>{{ number_format($item->nilai_akhir, 2) }}</td>
                    <td>
                        @php
                            $nilai = $item->nilai_akhir;
                            if ($nilai >= 90) $status = 'Sangat Baik';
                            elseif ($nilai >= 80) $status = 'Baik';
                            elseif ($nilai >= 70) $status = 'Cukup';
                            elseif ($nilai >= 60) $status = 'Kurang';
                            else $status = 'Sangat Kurang';
                        @endphp
                        {{ $status }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
