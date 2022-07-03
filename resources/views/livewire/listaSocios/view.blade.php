@section('title', __('Socios'))
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-dark">
				<div class="card-header">
					<div style="display: flex; justify-content: space-between; align-items: center;">
						@if (session()->has('message'))
						<div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;"> {{ session('message') }} </div>
						@endif
						<div>
							<input wire:model='keyWord' type="text" class="form-control" name="search" id="search" placeholder="Buscar Socio">
						</div>
						<div>
							<a href="{{ 'listasocios/pdf' }}" class="btn btn-sm btn-info" data-placement="left">
							<i class="fa fa-file-pdf"></i>  PDF
							</a>
						</div>
					</div>
				</div>
				
				<div class="card-body">
				<div class="table-responsive">
					<table class="table table-sm">
						<thead class="thead-light">
							<tr> 
                                <td scope="col">#</td> 
                                @foreach ($columns as $c)
                                    <th scope="col" wire:click="sort('{{ $c }}')">
                                        <button>
                                            {{$c}}
                                        </button> 
                                        @if($sortColumn == $c)
                                            @if($sortDirection == 'asc')
                                                <button>
                                                    &uarr;
                                                </button>
                                                @else
                                                <button>
                                                    &darr;
                                                </button>
                                            @endif
                                        @endif
                                    </th>
                                    <th scope="col">Fecha De Creación</th>
                                @endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($socios as $row)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->socnombre }}</td>
								<td>{{ $row->created_at }}</td>
							@endforeach
						</tbody>
					</table>						
					{{ $socios->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
