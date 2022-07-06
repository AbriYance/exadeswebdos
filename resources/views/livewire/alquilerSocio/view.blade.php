@section('title', __('Alquilers'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						<div class="float-left">
							<h4><i class="fab fa-laravel text-info"></i>
							Listando Alquileres </h4>
						</div>
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
                        <div>
							<select wire:model='keyWord' type="text" class="form-control" name="search" id="search">
                            <option value="">Opcion</option>
                        @foreach ($socios as $soc_id=>$socnombre)
                            <option value="{{$soc_id}}">{{$socnombre}}</option>
                        @endforeach
							</select>
						</div>
						<div>
							<a href="{{ 'alquilersocios/pdf' }}" class="btn btn-sm btn-info" data-placement="left">
							<i class="fa fa-file-pdf"></i>  PDF
							</a>
						</div>
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr> 
								<td>#</td> 
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
				</div>
			</div>
		</div>
	</div>
</div>