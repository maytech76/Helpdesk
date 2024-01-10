<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {
?>


<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php"); ?>
<title>MAYTech | Perfil</title>
</head>


<?php require_once("../MainHeader/header.php"); ?>

<div class="mobile-menu-left-overlay"></div>

<?php require_once("../MainNav/nav.php"); ?>

<link rel="stylesheet" href="../../public/css/lib/ion-range-slider/ion.rangeSlider.css">
<link rel="stylesheet" href="../../public/css/lib/ion-range-slider/ion.rangeSlider.skinHTML5.css">
<link rel="stylesheet" href="../../public/css/separate/elements/player.min.css">
<link rel="stylesheet" href="../..public/css/lib/font-awesome/font-awesome.min.css">

<link rel="stylesheet" href="../../public/css/separate/pages/profile-2.min.css">

<!---------------->

<div class="page-content">

    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-12">
                   
            </div>

            <div class="col-xl-9 col-lg-8">
                <section class="tabs-section">
                    <section class="box-typical profile-side-user">
                        <button type="button" class="avatar-preview avatar-preview-128">
                            <img src="../../public/img/avatar-1-256.png" alt="" />
                            <span class="update">
                                <i class="font-icon font-icon-picture-double"></i>
                                Update photo
                            </span>
                            <input type="file" />
                        </button>
                        <button type="button" class="btn btn-rounded">Nombre</button>
                       
                        <div class="bottom-txt">Codigo del Usuario</div>
                    </section>


                    <div class="tabs-section-nav tabs-section-nav-left">
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                    <span class="nav-link-in">Descripción</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                    <span class="nav-link-in">Tickes Cerrados</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                    <span class="nav-link-in">Tickes Abiertos</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                    <span class="nav-link-in">Configuración</span>
                                </a>
                            </li>
                        </ul>
                    </div><!--.tabs-section-nav-->


                    <div class="tab-content no-styled profile-tabs">
                        <div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1">
                            <form class="box-typical">
                                <input type="text" class="write-something" />
                               
                            </form><!--.box-typical-->

                          
                        </div><!--.tab-pane-->
                        <div role="tabpanel" class="tab-pane" id="tabs-2-tab-2">
                            <section class="box-typical box-typical-padding">
                                Tickes Cerrados
                            </section>
                        </div><!--.tab-pane-->
                        <div role="tabpanel" class="tab-pane" id="tabs-2-tab-3">
                            <section class="box-typical box-typical-padding">
                               Tickes Abiertos
                            </section> 
                        </div><!--.tab-pane-->

                        <div role="tabpanel" class="tab-pane" id="tabs-2-tab-4">
                            <section class="box-typical profile-settings">
                                <section class="box-typical-section">

                                    
                                    <div class="form-group row">
                                        <div class="col-xl-1">
                                            <label class="form-label">Nombre</label>
                                        </div>
                                        <div class="col-xl-5">
                                            <input class="form-control" type="text" />
                                        </div>

                                        <div class="col-xl-1">
                                            <label class="form-label mx-0">Apellidos</label>
                                        </div>
                                        <div class="col-xl-5">
                                            <input class="form-control" type="text" />
                                        </div>

                                    </div>
                                    

                                    <div class="form-group row">
                                        <div class="col-xl-2">
                                            <label class="form-label">Rol de Usuario</label>
                                        </div>
                                        <div class="col-xl-3">
                                            <input class="form-control" type="text" />
                                        </div>

                                        
                                        <div class="col-xl-1">
                                            <label class="form-label">Correo</label>
                                        </div>
                                        <div class="col-xl-6">
                                            <input class="form-control" type="text" />
                                        </div>
                                    
                                        
                                    </div>


                                    <hr>

                                 
                                    <div class="container">
                                        
                                           
                                                <section class="mx-auto">
                                                    <div class="form-group row">
                                                        <div class="col-xl-4">
                                                            <label class="form-label">Contraseña</label>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <input id="txtpass" name="txtpass" class="form-control" type="password"/>
                                                        </div>
                                                    </div>
                                                </section>
                                        
    
                                        <div class="form-group row">
                                            <div class="col-xl-4">
                                                <label class="form-label">Confirma Contraseña</label>
                                            </div>
                                            <div class="col-xl-6">
                                                <input id="txtpassnew" name="txtpassnew" class="form-control" type="password"/>
                                            </div>
                                        </div>
                                    </div>


                                </section>

                                <section class="box-typical-section profile-settings-btns">
                                    
                                    <button type="button" id="updatepass" class="btn btn-rounded btn-danger">Actualizar</button>
                                    
                                </section>
                            </section>
                        </div><!--.tab-pane-->
                    </div><!--.tab-content-->
                </section><!--.tabs-section-->
            </div>
        </div><!--.row-->
    </div><!--.container-fluid-->
 
</div><!--.page-content-->




<!--------------------->

<?php require_once("../MainJs/js.php"); ?>
<script type="text/javascript" src="Mdperfil_user.js"></script>


<script src="../../public/js/lib/salvattore/salvattore.min.js"></script>
<script src="../../public/js/lib/ion-range-slider/ion.rangeSlider.js"></script>

<script>
    $(document).ready(function () {
        $(".fancybox").fancybox({
            padding: 0,
            openEffect: 'none',
            closeEffect: 'none'
        });

        $("#range-slider-1").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-2").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-3").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

        $("#range-slider-4").ionRangeSlider({
            min: 0,
            max: 100,
            from: 30,
            hide_min_max: true,
            hide_from_to: true
        });

    });
</script>

<script src="../../public/js/app.js"></script>
</body>

</html>


<?php
} else {
    header("location:" . Conectar::ruta() . "index.php");
}
?>