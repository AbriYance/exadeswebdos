<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Alquiler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="soc_id"></label>
                <select wire:model="soc_id" class="form-control" name="" id="soc_id">
                <option value="">Opcion</option>
                @foreach ($socios as $soc_id=>$socnombre)
                    <option value="{{$soc_id}}">{{$socnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="soc_id" type="text" class="form-control" id="soc_id" placeholder="Socio">@error('soc_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <select wire:model="pel_id" class="form-control" name="" id="pel_id">
                <option value="">Opcion</option>
                @foreach ($peliculas as $pel_id=>$pelnombre)
                    <option value="{{$pel_id}}">{{$pelnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="pel_id" type="text" class="form-control" id="pel_id" placeholder="Peliculas">@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="alqfechadesde"></label>
                <input wire:model="alqfechadesde" type="date" class="form-control" id="alqfechadesde" placeholder="fechadesde">@error('alqfechadesde') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alqfechahasta"></label>
                <input wire:model="alqfechahasta" type="date" class="form-control" id="alqfechahasta" placeholder="fechahasta">@error('alqfechahasta') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alqcosto"></label>
                <input wire:model="alqcosto" type="text" class="form-control" id="alqcosto" placeholder="costo">@error('alqcosto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="alqfechaentrega"></label>
                <input wire:model="alqfechaentrega" type="date" class="form-control" id="alqfechaentrega" placeholder="fechaentrega">@error('alqfechaentrega') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
