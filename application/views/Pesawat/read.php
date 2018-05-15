<!-- 
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
    <body> -->
        <div class="container">
        <h1>Data Pesawat</h1>
        <?php echo "<h2>".$this->session->flashdata('pesan')."</h2>" ?>
        <br/>

        <a href="<?php echo base_url()."pesawat/addPesawat"; ?>"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>Add Pesawat</button></a>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>Kode Pesawat</th>
	                <th>Maskapai</th>
	                <th>Landing</th>
	                <th>Boarding</th>
	                <th>Kota Asal</th>
	                <th>Kota Tujuan</th> 	
	                <th>Kelas</th>
	                <th>Harga</th>
	                <th>Logo Pesawat</th>
	                <th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $data) { ?>
		            <tr>
		                <td><?php echo $data['KodePesawat']; ?></td>
		                <td><?php echo $data['Maskapai']; ?></td>
		                <td><?php echo $data['Landing']; ?></td>
		                <td><?php echo $data['Boarding']; ?></td>
		                <td><?php echo $data['FK_IdAsal']; ?></td>
		                <td><?php echo $data['FK_IdTujuan']; ?></td>
		                <td><?php echo $data['Kelas']; ?></td>
		                <td><?php echo $data['Harga']; ?></td>
		                <td><img src="<?php echo base_url() . "uploads/" . $data['LogoPesawat']; ?>" alt="" width="100" /></td>
		                <td>	
		                	<a href="<?php echo base_url()."Pesawat/editPesawat/".$data['KodePesawat']; ?>">
		                	<button class="btn btn-primary">
		                	Edit</button>
		                	</a>
		                	<a href="<?php echo base_url()."Pesawat/deletePesawat/".$data['KodePesawat']; ?>">
		                	<button class="btn btn-primary">
		                	Delete</button>
		                	</a>
		                </td>
		            </tr>
		            <?php } ?>
				</tbody>
        </table>
    </div>
    <!-- </body>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
</html> -->