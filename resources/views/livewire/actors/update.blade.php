<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Actor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="sex_id"></label>
                <select wire:model="sex_id" class="form-control" name="" id="sex_id">
                <option value="">Opcion</option>
                @foreach ($sexos as $sex_id=>$sexnombre)
                    <option value="{{$sex_id}}">{{$sexnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="sex_id" type="text" class="form-control" id="sex_id" placeholder="Sexo">@error('sex_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="actnombre"></label>
                <input wire:model="actnombre" type="text" class="form-control" id="nombre" placeholder="nombre">@error('actnombre') <span class="error text-danger">{{ $message }}</span> @enderror
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
