
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
        <h1>Data Kota</h1>
        <button type="button" class="btn btn-success" style="background-color: #6fd508;" data-toggle="modal" data-target="#myModal">Tambah Kota</button>
        <table id="example" class="table table-hover">
        	<thead>
        		<tr>
        			<td>ID Kota</td>
        			<td>Nama Kota</td>
        			<td>Bandata</td>
        			<td>Action</td>
        		</tr>
        	</thead>
        	<tbody>
        		<?php foreach ($kota->result() as $data) {
        			echo "<tr>";
        			echo "<td>$data->IdKota</td>";
        			echo "<td>$data->NamaKota</td>";
        			echo "<td>$data->Bandara</td>";
        			echo "<td><a href='kota/update/$data->IdKota' class='btn btn-primary btn-xs'>Edit</a>
        				      <a href='kota/delete/$data->IdKota' class='btn btn-danger btn-xs'>Delete</a></td>";
        			echo "</tr>";
        		}?>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Kota</h4>
      </div>
      <div class="modal-body">
      	<?php echo form_open('kota/add'); ?>
        <input type="text" class="form-control" name="nama" required="" placeholder="Nama Kota">
        <br>
        <input type="text" class="form-control" name="bandara" required="" placeholder="Bandara">
      </div>
      <div class="modal-footer">
      	<input type="submit" class="btn btn-success" style="background-color: #6fd508;" value="save">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <?php echo form_close(); ?>
      </div>
    </div>

  </div>
</div>