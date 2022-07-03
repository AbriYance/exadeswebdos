@section('title', __('Inventario de Peliculas'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listando Peliculas </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<select wire:model='keyWord' type="text" class="form-control" name="search" id="search">
								<option value="01">Enero</option>
								<option value="02">Febrero</option>
								<option value="03">Marzo</option>
								<option value="04">Abril</option>
								<option value="05">Mayo</option>
								<option value="06">Junio</option>
								<option value="07">Julio</option>
								<option value="08">Agosto</option>
								<option value="09">Septiembre</option>
								<option value="10">Octubre</option>
								<option value="11">Noviembre</option>
								<option value="12">Diciembre</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="card-body">
						@include('livewire.peliculas.create')
						@include('livewire.peliculas.update')
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
								<th>Nombre</th>
								<th>Genero</th>
								<th>Director</th>
								<th>Formato</th>
								<th>Fecha de Estreno</th>
							</tr>
						</thead>
						<tbody>
							@foreach($peliculas as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->pelnombre }}</td>
								<td>{{ $row->genero->gennombre }}</td>
								<td>{{ $row->director->dirnombre }}</td>
								<td>{{ $row->formato->fornombre }}</td>
								<td>{{ $row->pelfechaestreno }}</td>
							@endforeach
						</tbody>
					</table>						
					{{ $peliculas->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
        $(document).ready(function(){
 
            // cargamos los años
            for(var i=2000;i<2020;i++)
            {
                $("select[name=ano]").append(new Option(i,i));
            }
 
            // Evento que se ejecuta cuando se pulsa el boton del formulario
            $("input[name=boton]").click(function(){
 
                // Creamos un Date con el año y mes seleccionado del formulario
                // y con el dia 0, que nos devolvera el ultimo dia del mes
                // anterior.
                fecha=new Date($("select[name=ano]").val(), $("select[name=mes]").val(), 0);
 
                $("select[name=dia]").find('option').remove();
                for(var i=1;i<fecha.getDate();i++)
                {
					$("select[name=dia]").append(new Option(i,"dia "+i));
                }
                $("#resultado").html(fecha.toDateString());
            });
        });
    </script>

