<style>
    .position {
        position: absolute;
        top: 14px;
        /* right: 2rem; */
    }

    .image {
        /* margin: 500px; */
        overflow: hidden;
        width: 100%;
        height: 100%;
        background-size: cover;
        border-radius: 5px;
    }
</style>
  <div wire:ignore.self class="modal fade" id="saveModal" tabindex="-1" aria-labelledby="saveModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="saveModalLabel">Registrar Incidencia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('incidencias.store') }}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Titulo de Incidencia</label>
                <input type="text" class="form-control" name="titulo_incidencia">
                @error('titulo_incidencia') <span class="error">{{ $message }}</span> @enderror
              </div>
              <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea class="form-control" rows="3" name="descripcion"></textarea>
                @error('descripcion') <span class="error">{{ $message }}</span> @enderror
              </div>

              <div class="mb-6 position-relative mr-4 text-center">
                <figure>
                    <img  alt="" id="output" class="image">
                </figure>
                <div class="position">
                    <label class="d-flex items-center px-6 py-2 border border-warning shadow-sm p-3 mb-5 bg-white rounded">
                        <i class="fas fa-camera mr-2 mx-2 mt-1"></i>
                        Seleccionar imagen
                        <input name="foto_incidencia" type="file" class="d-none" accept="image/*"
                            onchange="loadFile(event)">
                    </label>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output = document.getElementById("output").width = "300"
    };

</script>