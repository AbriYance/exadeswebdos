<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Crear Nuevo Actor pelicula</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="act_id"></label>
                <select wire:model="act_id" class="form-control" name="" id="act_id">
                <option value="">Opcion</option>
                @foreach ($actores as $act_id=>$actnombre)
                    <option value="{{$act_id}}">{{$actnombre}}</option>
                @endforeach
                </select>
                <!-- <input wire:model="act_id" type="text" class="form-control" id="act_id" placeholder="Act Id">@error('act_id') <span class="error text-danger">{{ $message }}</span> @enderror -->
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
                <label for="aplpapel"></label>
                <input wire:model="aplpapel" type="text" class="form-control" id="aplpapel" placeholder="papel">@error('aplpapel') <span class="error text-danger">{{ $message }}</span> @enderror
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
