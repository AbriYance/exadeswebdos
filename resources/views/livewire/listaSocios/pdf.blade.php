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
        h2{
            display:inline-block;
        }
        
        img{
        display:inline-block;
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
                    <table class="table table-sm" id="soc">
                        <thead class="thead-light">
                            <tr> 
                                <td scope="col">#</td> 
                                <th scope="col">Cédula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($socios as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td> 
                                <td>{{ $row->soccedula }}</td>
                                <td>{{ $row->socnombre }}</td>
                                <td>{{ $row->socdireccion }}</td>
                                <td>{{ $row->soctelefono }}</td>
                                <td>{{ $row->soccorreo }}</td>
                            @endforeach
                        </tbody>
                    </table>                        
                    {{ $socios->links() }}
                </div>
</body>
</html>
