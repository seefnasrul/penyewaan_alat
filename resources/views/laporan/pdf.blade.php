<html>
    <head>
        <title>Laporan Bulanan</title>
        <style>
            td{
                font-size:9pt;
            }
        </style>
    </head>
    <body>
        <center>
        Laporan Transaksi Penyewaan Pada Tanggal ({{$date_start}} - {{$date_end}})<br>
        Perusahaan : {{$perusahaan->nama_perusahaan}}
        <hr>
        <table border="1">
            <tr>
                <td>ID Transaksi</td>
                <td>ID Alat</td>
                <td>Tipe Alat</td>
                <td>No Reg Alat</td>
                <td>Biaya Sewa / Hari</td>
                <td>Waktu Sewa (Tanggal - Lama Hari)</td>
                <td>Total Biaya Sewa</td>
                <td>Waktu Denda (Lama Hari)</td>
                <td>Total Biaya Denda</td>
                <td>Grand Total</td>
            </tr>
            @php $all_total = 0; @endphp
            @foreach ($transaksis as $t)
                <tr>
                    <td>#{{$t->id}}</td>
                    <td>{{$t->alat_id}}</td>
                    <td>{{$t->tipe}}</td>
                    <td>{{$t->no_reg}}</td>
                    <td>{{format_rupiah($t->harga_sewa_perhari)}}</td>
                    <td>{{$t->tanggal_pinjam}} - {{$t->tanggal_rencana_kembali}} ({{count_days_two_dates($t->tanggal_pinjam,$t->tanggal_rencana_kembali)}} Hari)</td>
                    <td>{{format_rupiah($t->total_biaya_sewa)}}</td>
                    <td>{{count_days_two_dates($t->tanggal_pinjam,$t->tanggal_rencana_kembali)}} Hari</td>
                    <td>{{format_rupiah($t->total_denda)}}</td>
                    <td>{{format_rupiah($t->total_biaya_sewa+$t->total_denda)}}</td>
                </tr>
                @php $all_total += $t->total_biaya_sewa+$t->total_denda; @endphp
            @endforeach
            <tr>
                <td colspan="8"></td>
                <td>Grand Total</td>
                <td>{{format_rupiah($all_total)}}</td>
            </tr>
        </table>
        
    </center>
    </body>
</html>