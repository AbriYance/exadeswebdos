@section('title', __('Ingresos'))
<div class="container-fluid p-5">
    <div class="card bg-dark">
    <div class="card-header">

    <div class="row">
        <div class="col mt-4 mb-4">
            <h2 class="text-center"><b>Reporte Ganancias Mensuales</b></h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <select wire:model="filtro_mes" name="opcion" id="select" class="form-control" wire:click="restData()">
                <option value="1">Escoja el mes </option>
                @foreach ($meses as $num => $mes)
                    <option value="{{ $num }}"> {{ $mes }} </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <select wire:model="filtro_gen" name="opcion" id="select" class="form-control" wire:click="restData()">
                <option value="1">Escoja un Genero</option>
                @foreach ($generos as $id => $genero)
                    <option value="{{ $id }}"> {{ $genero }} </option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <button wire:click.prevent="getPelIncome({{ $filtro_mes }}, {{ $filtro_gen }})" wire:click="renderData()"
                class="btn btn-info @if (!$filtro_mes || !$filtro_gen) disabled @endif"><i class="fa fa-search"></i></button>
        </div>
        <div class="col">
            <a href="/gananciasgeneros/pdf" class="btn btn-info" style="float: right;">
                <span><b>PDF</b></span>
                <i class="fa fa-file-pdf"></i>
            </a>
        </div>
    </div>
    <div class="row">
        <!-- <div class="col mt-4 mb-4">
            <h3>Balance de Ganancias <i class="ion ion-ios-people pr-3"></i><i class="ion ion-ios-film"></i></h3>
        </div> -->
    </div>

    <div class="row">
        <p></p>
        <p></p>
    </div>

    <div class="row">
        @if ($list_pel)
            <table class="table table-bordered table-sm">
                <thead class="thead-light">
                    <tr class="bg-succes">
                        <th scope="col" class="text-center"># Veces Alquiladas</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Costo</th>
                        <th scope="col" class="text-center">Ingreso Generado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list_pel as $row)
                        <tr>
                            <td class="text-center">{{ $row['num_alq'] }}</td>
                            <td class="text-center">{{ $row['pelnombre'] }}</td>
                            <td class="text-center">{{ number_format($row['pelcosto'], 2, '.', ',') }}$</td>
                            <td class="text-center text-success"><b>{{ number_format($row['total'], 2, '.', ',') }}$</b>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-secondary">
                     <td colspan="4" class="text-center"><b>Total: <span class="text-success ml-1">{{number_format($ing_total,2,'.',',')}}$</span></b>  </td>
                  </tr>
                </tbody>
            </table>
    </div>
            @if($num_busq == 0)
                <div class="col-6">
                    <p style="min-height: 750px; height: 850px; max-height: 850px; max-width: 100%; min-width: 100%;">Cargando...</p>
                </div>
            @else
               <div wire:ignore style="text-align:center;">
                  <canvas id="myChart" style="min-height: 250px; height: 350px; max-height: 350px; max-width: 100%; min-width: 100%;"></canvas>
               </div>
               <script>
                  let porcentajes = [];
                  porcentajes = {{Js::from($porcentajes)}};
                  let porcentajes_lbl = [];
                  porcentajes_lbl = {{Js::from($porcentajes_lbl)}};
                  console.log(porcentajes);
                  var pieChartCanvas = document.getElementById('myChart').getContext('2d');
                  new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: {
                       labels: porcentajes_lbl,
                       datasets: [
                       {
                           data: porcentajes,
                           backgroundColor : ['#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#f56954', '#00a65a'],
                       }
                       ]
                    },
                    options: {
                       maintainAspectRatio : false,
                       responsive : true,
                    }
                  })
               </script>
               @endif   
          </div>

        @elseif($resultFound == false && $num_busq > 0)
            <p class="ml-4 text-danger"><i class="ion ion-android-alert"></i> No se encontraron alquileres en esta
                fecha.</p>
        @endif


        </div>
    </div>
</div>
