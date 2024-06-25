<?php
session_start();

include "koneksi.php";
?>
<html>
<head>
  <title>Data Riwayat Peminjaman Ruangan Dikonfirmasi</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
<br>
			<h2>Data Riwayat Peminjaman Ruangan Dikonfirmasi</h2>
			<h4></h4>
            <br>
				<div class="data-tables datatable-dark">
					
                <table class="table table-bordered" id="mauexport" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>NO</th>
            <th>Nama Penyewa</th> 
            <th>Departemen</th>
            <th>No. Hp</th>
            <th>Ruangan</th>
            <th>Keperluan</th>
            <th>Tanggal Sewa</th>
            <th>Jam Sewa</th>
            <th>Status</th>
            
        </tr>
    </thead>
    <tbody>
        <?php
        
        $no = 0;
        $data = mysqli_query($koneksi, "SELECT * FROM sewa WHERE status='Dikonfirmasi' ORDER BY id DESC");


        while ($d = mysqli_fetch_array($data)) {
            $no++;
        ?>
            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['departemen']; ?></td>
                <td><?php echo $d['no_hp']; ?></td>
                <td><?php echo str_replace('_', ' ', $d['nama_ruangan']); ?></td>
                <td><?php echo $d['keperluan']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($d['tanggal_sewa'])) ?>  </td>
<td><?php echo date('H:i', strtotime($d['jam_mulai'])) . ' - ' . date('H:i', strtotime($d['jam_selesai'])); ?> </td>

                <td class="text-success"><b><?php echo $d['status']; ?></b></td>
                
            </tr>

            <!-- Modal Edit -->
           
                
           
        <?php
        }
        ?>
    </tbody>
</table>

					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ],
        lengthMenu: [[-1], ['All']] // Menampilkan semua data
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>