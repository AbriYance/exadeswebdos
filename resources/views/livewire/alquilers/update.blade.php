<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Alquiler</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="soc_id"></label>
                <select wire:model="soc_id" class="form-control" name="" id="soc_id">
                <option value="">Opcion</option>
                @foreach ($socios as $soc_id=>$socnombre)
                    <option value="{{$soc_id}}">{{$socnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="soc_id" type="text" class="form-control" id="soc_id" placeholder="Soc Id">@error('soc_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <select wire:model="pel_id" class="form-control" name="" id="pel_id">
                <option value="">Opcion</option>
                @foreach ($peliculas as $pel_id=>$pelnombre)
                    <option value="{{$pel_id}}">{{$pelnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="pel_id" type="text" class="form-control" id="pel_id" placeholder="Pel Id">@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
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
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Guardar</button>
            </div>
       </div>
    </div>
</div>
