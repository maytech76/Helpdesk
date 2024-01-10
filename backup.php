<!DOCTYPE html>
<html>
<head>
    <title>Backup</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Respaldo de Base de Datos</title>
</head>
<body>

 <div class="container p-md-5">

    <div class="card text-center">
        <div class="card-header">
          Resplado de Base de datos
        </div>
        <div class="card-body">
          <h5 class="card-title">Proceso inreversible</h5>
          <p class="card-text">En este modulo podras realizar respaldo de la base de datos del sistema</p>
          <div class="row">
            <div class="col-md-6">
            
                <div class="import">
                    <button  class="btn btn-primary" id="import_backup">Importar Backup</button>
                </div>

            </div>
        
             <br>

         <div class="col-md-6">

            <div class="export">
                
                <button  class="btn btn-success" id="backup">Exportar Respaldo</button>
             </div>

         </div>

    </div>
        </div>
        <div class="card-footer text-body-secondary">
         Administrador
        </div>
      </div>


            
    </div>

    <script src="backup.js"></script>
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>
