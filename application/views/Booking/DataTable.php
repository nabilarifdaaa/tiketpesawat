
<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <style type="text/css">
    	select.input-sm{
    		line-height: 20px;
    	}
    </style>
    
    </head>
    <body>
        <div class="container">
        <h1>Data Booking</h1>
        <?php echo "<h2>".$this->session->flashdata('pesan')."</h2>" ?>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>Id Booking</th>
					<th>Id Penumpang</th>
					<th>Kode Pesawat</th>
	                <th>Tanggal Book</th>
	                <th>Jumlah Tiket</th>
	                <th>Total Harga</th>
	                <th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $data) { ?>
		            <tr>
		            	<td><?php echo $data['IdBooking']; ?></td>
		                <td><?php echo $data['FK_IdPenumpang']; ?></td>
		                <td><?php echo $data['FK_KodePesawat']; ?></td>
		                <td><?php echo $data['TanggalBook']; ?></td>
		                <td><?php echo $data['JumlahTiket']; ?></td>
		                <td><?php echo $data['TotalHarga']; ?></td>
		                <td>	
		                	<a href="<?php echo base_url()."Booking/preview/".$data['IdBooking']; ?>"><button class="btn btn-primary">Detail</button></a>
		                	<a href="<?php echo base_url()."Booking/edit/".$data['IdBooking']; ?>"><button class="btn btn-warning">Edit</button></a>
		                	<a href="<?php echo base_url()."Booking/do_delete/".$data['IdBooking']; ?>"><button class="btn btn-danger">Delete</button></a>
		                </td>
		            </tr>
		            <?php } ?>
				</tbody>
        </table>
    </div>
    </body>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
</html>