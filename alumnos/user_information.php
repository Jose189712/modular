<div class="position-fixed p-4">
  <button type="button" class="btn btn-light position-fixed rounded-circle" data-bs-toggle="modal" data-bs-target="#principalModal" data-bs-whatever="@mdo"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
      <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
    </svg>
    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
      ?
      <span class="visually-hidden">unread messages</span>
    </span>
  </button>
</div>

<div class="modal fade" id="principalModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <div class="rounded-circle bg-light p-2 position-relative text-warning">
          <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
          </svg>
          <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle">
            <span class="visually-hidden">New alerts</span>
          </span>
        </div>
        <h5 class="modal-title m-3" id="principalModal">Datos personales</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 border border-primary border-2 rounded p-2">Nombre: <strong><?php echo $_SESSION['nombreAlumno']; ?></strong></div>
          </div>
          <div class="row">
            <div class="col-md-12 ms-auto border border-success border-2 rounded p-2">Apellido Paterno: <strong><?php echo $_SESSION['apellidoPA']; ?></strong></div>
          </div>
          <div class="row">
            <div class="col-md-12 ms-auto border border-danger border-2 rounded p-2">Apellido Materno: <strong><?php echo $_SESSION['apellidoMA']; ?></strong></div>
          </div>
          <div class="row">
            <div class="col-md-12 border border-warning border-2 rounded p-2">Genero: <strong><?php echo $_SESSION['genero']; ?></strong></div>
          </div>
          <div class="row"></div>
          <br>
          <div class="row">
            <div class="col-md-6 ms-auto">
              <h5 class="text-center text-muted">Nivel recorrido</h5>
            </div>
            <div class="col-md-6 border rounded border-primary border-2 bg-info">
              <h5 class="text-center"><?php echo $_SESSION['nickName']; ?></h5>
            </div>
          </div>
          <br>
          <div class="row"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="progress">
                <div  id="progreso" class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button id="cerrarSession" type="button" class="btn btn-danger">Cerrar partida</button>
        <a type="button" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#secondaryModal" data-bs-dismiss="modal">Actualizar informacion</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="secondaryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title m-3" id="secondaryModal">Actualiza tu Información</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="modifyData" class="row g-3">
          <div class="col-md-12">
            <label for="nombreAlumno" class="form-label">Nombre alumno</label>
            <input name="userName" type="text" class="form-control" id="nombreAlumno" value="<?php echo $_SESSION['nombreAlumno']; ?>">
          </div>
          <div class="col-md-6">
            <label for="apellidoPA" class="form-label">Apellido Paterno</label>
            <input name="apellidoP" type="text" class="form-control" id="apellidoPA" value="<?php echo $_SESSION['apellidoPA']; ?>">
          </div>
          <div class="col-md-6">
            <label for="apellidoMA" class="form-label">Apellido Materno</label>
            <input name="apellidoM" type="text" class="form-control" id="apellidoMA" value="<?php echo $_SESSION['apellidoMA']; ?>">
          </div>   
          <?php 
            if ($_SESSION['genero'] == 'nino') {
              echo '<div class="col-md-6">
              <input name="genero" type="radio" class="form-check-input" id="nino" value="nino" checked>
              <label class="form-check-label" for="nino">Niño</label>
              </div>
              <div class="col-md-6">
              <input name="genero" type="radio" class="form-check-input" id="nina" value="nina">
              <label class="form-check-label" for="nino">Niña</label>
              </div>';
            }
            else {
              echo '<div class="col-md-6">
              <input name="genero" type="radio" class="form-check-input" id="nino" value="nino">
              <label class="form-check-label" for="nino">Niño</label>
              </div>
              <div class="col-md-6">
              <input name="genero" type="radio" class="form-check-input" id="nina" value="nina" checked>
              <label class="form-check-label" for="nino">Niña</label>
              </div>';
            }
          ?>                 
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        <a id="formModify" type="button" class="btn btn-success" role="button" data-bs-toggle="modal" data-bs-target="#secondaryModal" data-bs-dismiss="modal">Modificar</a>
      </div>
    </div>
  </div>
</div>

