
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
            <h4>Pencarian</h4>
        <h1>Data Pesawat</h1>
        <?php echo "<h2>".$this->session->flashdata('pesan')."</h2>" ?>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>Kode Pesawat</th>
	                <th>Maskapai</th>
	                <th>Landing</th>
	                <th>Boarding</th>
	                <th>Kota Asal</th>
	               <th>Bandara Asal</th>
	                <th>Kota Tujuan</th>
	                <th>Bandara Tujuan</th>
	                <th>Kelas</th>
	                <th>Harga</th>
	                <th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($result3 as $data) { ?>
		            <tr>
		                <td><?php echo $data['KodePesawat']; ?></td>
		                <td><?php echo $data['Maskapai']; ?></td>
		                <td><?php echo $data['Landing']; ?></td>
		                <td><?php echo $data['Boarding']; ?></td>
		                	<?php foreach ($result1 as $data1) { ?>
				                <td><?php echo $data1['NamaKota']; ?></td>
				                <td><?php echo $data1['Bandara']; ?></td>
				            <?php } ?>
		                	<?php foreach ($result2 as $data2) { ?>
		                		<td><?php echo $data2['NamaKota']; ?></td>
		                		<td><?php echo $data2['Bandara']; ?></td>
		                	<?php } ?> 
		                <td><?php echo $data['Kelas']; ?></td>
		                <td><?php echo $data['Harga']; ?></td>
		                <td>	
		                	<a href="<?php echo base_url()."Penumpang/pilih/".$data['KodePesawat']; ?>">
		                	<button class="btn btn-primary">
		                	Pilih</button>
		                	</a>
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