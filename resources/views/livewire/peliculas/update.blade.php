<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="gen_id"></label>
                <select wire:model="gen_id" class="form-control" name="" id="gen_id">
                <option value="">Opcion</option>
                @foreach ($generos as $gen_id=>$gennombre)
                    <option value="{{$gen_id}}">{{$gennombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="gen_id" type="text" class="form-control" id="gen_id" placeholder="Gen Id">@error('gen_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="dir_id"></label>
                <select wire:model="dir_id" class="form-control" name="" id="dir_id">
                <option value="">Opcion</option>
                @foreach ($directors as $dir_id=>$dirnombre)
                    <option value="{{$dir_id}}">{{$dirnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="dir_id" type="text" class="form-control" id="dir_id" placeholder="Dir Id">@error('dir_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="for_id"></label>
                <select wire:model="for_id" class="form-control" name="" id="for_id">
                <option value="">Opcion</option>
                @foreach ($formatos as $for_id=>$fornombre)
                    <option value="{{$for_id}}">{{$fornombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="for_id" type="text" class="form-control" id="for_id" placeholder="For Id">@error('for_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
            </div>
            <div class="form-group">
                <label for="pelnombre"></label>
                <input wire:model="pelnombre" type="text" class="form-control" id="pelnombre" placeholder="nombre">@error('pelnombre') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pelcosto"></label>
                <input wire:model="pelcosto" type="text" class="form-control" id="pelcosto" placeholder="costo">@error('pelcosto') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="pelfechaestreno"></label>
                <input wire:model="pelfechaestreno" type="date" class="form-control" id="pelfechaestreno" placeholder="fechaestreno">@error('pelfechaestreno') <span class="error text-danger">{{ $message }}</span> @enderror
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
