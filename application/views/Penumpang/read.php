<!DOCTYPE html>
<html>
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
        <h1>Data Penumpang</h1>
        <a href="<?php echo base_url()."Penumpang/add/"; ?>">
		                	<button class="btn btn-primary">
		                	tambah</button>
        <table id="example" class="table table-hover">
            <thead>
				<tr>
					<th>ID Penumpang</th>
					<th>Nama</th>
	                <th>KTP</th>
	                <th>Email</th>
	                <th>NO Hp</th>
	                 <th>Action</th>
				</tr>
				</thead>
				<tbody>
					<?php foreach ($result as $data) { ?>
		            <tr>
		                <td><?php echo $data['IdPenumpang']; ?></td>
		                <td><?php echo $data['Nama']; ?></td>
		                <td><?php echo $data['KTP']; ?></td>
		                <td><?php echo $data['Email']; ?></td>
		                <td><?php echo $data['NoHp']; ?></td>
		                <td>	
		                	<a href="<?php echo base_url()."Penumpang/edit/".$data['IdPenumpang']; ?>">
		                	<button class="btn btn-primary">
		                	Edit</button>
		                	</a>
		                	<a href="<?php echo base_url()."Penumpang/do_delete/".$data['IdPenumpang']; ?>">
		                	<button class="btn btn-primary">Delete
		                	</button>
		                	</a>
		                </td>
		            </tr>
		            <?php } ?>
				</tbody>
        </table>
    </div>
   
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
 </body>
</html>