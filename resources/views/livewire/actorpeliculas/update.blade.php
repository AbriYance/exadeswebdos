<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Actualizar Actor de pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="act_id"></label>
                <select wire:model="act_id" class="form-control" name="" id="act_id">
                <option value="">Opcion</option>
                @foreach ($actores as $act_id=>$actnombre)
                    <option value="{{$act_id}}">{{$actnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="act_id" type="text" class="form-control" id="actor" placeholder="Act Id">@error('act_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="pel_id"></label>
                <select wire:model="pel_id" class="form-control" name="" id="pel_id">
                <option value="">Opcion</option>
                @foreach ($peliculas as $pel_id=>$pelnombre)
                    <option value="{{$pel_id}}">{{$pelnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="pel_id" type="text" class="form-control" id="pelicula" placeholder="Pelicula">@error('pel_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="aplpapel"></label>
                <input wire:model="aplpapel" type="text" class="form-control" id="papel" placeholder="papel">@error('aplpapel') <span class="error text-danger">{{ $message }}</span> @enderror
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
