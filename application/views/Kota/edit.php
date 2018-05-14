<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style type="text/css">
    	select.input-sm{
    		line-height: 20px;
    	}
    </style>
    
    </head>
    <body>
    <div class="container">
        <h1>Edit Kota</h1>
        <?=form_open(current_url()) ?>
        Nama Kota <input type="text" name="nama" class="form-control" value="<?=$kota['NamaKota'] ?>">
        Bandara <input type="text" name="bandara" class="form-control" value="<?=$kota['Bandara'] ?>">
        <br>
        <input type="submit" class="btn btn-primary" value="Update">
        <?=form_close() ?>
        <hr>
        <?=validation_errors() ?>
    </div>
    </body>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</html>