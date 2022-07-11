<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

	<!-- <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css"> -->
	 @livewireStyles

    <style>
        #soc{
            font-family: Arial, Helvetica, sans-serif;
            border-collapse:collapse:
            width:100;
        }
        #soc td, #soc th{
            border:1px solid #ddd;
            padding: 8px;
        }
        #soc th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #4CAF50;
            color: #fff;
        }
        h1 {
			font-size: 32px;
			text-align: center;
			background: -webkit-linear-gradient(#eeeeee, #333333);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
        p{
            text-align: center;
        }
    </style>
</head>
<body>

    <h1>REPORTE DE SOCIOS</h1>
	<p>Reporte sobre la lista de los socios existentes en la plataforma digital CineJAM</p>

                <div class="table-responsive">
                <table class="table table-bordered table-sm" id="soc">
						<thead class="thead">
							<tr> 
								<th>#</th> 
								<th>Socio</th>
								<th>Pelicula</th>
								<th>Facha Alquiler</th>
								<th>Costo</th>
							</tr>
						</thead>
						<tbody>
							@foreach($alquilers as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->socio->socnombre }}</td>
								<td>{{ $row->pelicula->pelnombre }}</td>
								<td>{{ $row->alqfechadesde }}</td>
								<td>{{ $row->alqcosto }}</td>
							@endforeach
						</tbody>
					</table>						
					{{ $alquilers->links() }}
				</div>
</body>
</html>