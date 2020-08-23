<?php
    session_start();
    if (!isset($_SESSION["token"]))  //Si no existe la variable de sesión.
        header("Location: 401.html");
         
    if (!isset($_COOKIE["token"]))  //Si no existe la cookie.
        header("Location: 401.html");
        
    if ($_SESSION["token"] != $_COOKIE["token"])  //Si $_SESSION es distinta de $_COOKIE
        header("Location: 401.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleos | LinkedIn</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css">
    <script src="https://kit.fontawesome.com/a27c9b8e9e.js" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container" style="margin-top: 5rem;">
        <div class="row" id="empleos">
            <div class="col-lg-12" style="width: 1108px !important;">
                <div class="card mb-3 mt-3 shadow-sm px-0 py-0" style="border-color: #C1C1C1;">
                    <div class="px-3" style="height: 56px; padding-top: 6.7px;">
                        <button class="btn post-nuevo btn-sm" style="width: 175px; text-align: center; font-weight: 640; font-size: 1rem"><i class="far fa-bookmark"></i>  Empleos guardados</button>
                        <button class="btn post-nuevo btn-sm" style="width: 185px; text-align: center; font-weight: 640; font-size: 1rem"><i class="far fa-check-circle"></i>  Empleos solicitados</button>
                        <button class="btn post-nuevo btn-sm" style="width: 145px; text-align: center; font-weight: 640; font-size: 1rem"><i class="far fa-bell"></i>  Alerta de empleo</button>
                        <button class="btn post-nuevo btn-sm" style="width: 115px; text-align: center; font-weight: 640; font-size: 1rem"><i class="far fa-money-bill-alt"></i>  Sueldo</button>
                        <button class="btn btn-outline-primary" style="margin-left: 60px;"><i class="fas fa-edit"></i>  Anuncia un empleo</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-3 shadow-sm px-0 py-0" style="border-color: #C1C1C1; background-color: #f3f6f8; background-image: url(img/posts/20.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center; background-attachment: fixed;">
                    <div class="px-3 py-3" style="height: 127px;">
                        <h2 style="font-size: 1.5rem; font-weight: 400; color: black; text-align: center; margin-bottom: 20px;">Encuentra tu siguiente empleo</h2>
                        <form style="margin-left: 37px;">
                            <div class="form-row">
                                <div class="col-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="border-right: 0; border-color: black; background-color: #FFFFFF;"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Buscar por cargo, aptitud o empresa" style="border-color: black; border-left: 0;">
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="border-right: 0; border-color: black; background-color: #FFFFFF; border-left: 0;"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Ciudad, provincia o código postal" style="border-color: black; border-left: 0;">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary" style="background-color: #0077B5;">Búsqueda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card mb-3 shadow-sm px-0 py-0" style="border-color: #C1C1C1;">
                    <div class="px-3 py-3" style="margin-right: auto; margin-left: auto; text-align: center; width: 400px; height: 430px; padding-top: 0 !important;">
                        <img src="img/svg/empleos.svg" style="height: 200px;">
                        <h1 style="font-size: 1.5rem; color: #191919;">¿Quieres descubrir empleos relevantes?</h1>
                        <p style="color: #666666;">Encuentra más de 20 millones de empleos en LinkedIn.</p>
                        <button type="button" class="btn btn-outline-primary" style="border-radius:0 !important;">Buscar empleos</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="#Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" style="margin-right: 0 !important; margin-top: 54px; float: right !important;">
            <div class="modal-content" style="background-color: #f0f0f0; width: 400px !important; margin-right: 0 !important;">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 30px; margin-top: 10px; font-size: xx-large;"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body pt-1 pl-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="card shadow-sm px-0 py-0 mb-2" style="border-color: #C1C1C1; width: 340px; height: 210px;">
                                    <div class="card-header" style="height: 45px;">
                                        <h6 style="text-align: center;">Ir a otros Productos de LinkedIn</h6>
                                    </div>
                                    <div class="card-body px-0 py-0">
                                        <div class="px-3 py-3">
                                            <button class="btn post-nuevo btn-sm producto"><i class="fab fa-youtube" style="color: #0073bf; width: 100px !important;"></i><br>Learning</button>
                                            <button class="btn post-nuevo btn-sm producto"><i class="fas fa-signal" style="color: #0073bf; width: 100px !important;"></i><br>Insights</button>
                                            <button class="btn post-nuevo btn-sm producto"><i class="fas fa-briefcase" style="color: #0073bf; width: 100px !important;"></i><br>Anuncia un empleo</button>
                                            <button class="btn post-nuevo btn-sm producto"><i class="fas fa-bullseye" style="color: #0073bf; width: 100px !important;"></i><br>Publicitar</button>
                                            <button class="btn post-nuevo btn-sm producto" style="margin-top: 9px !important;"><i class="fas fa-map-marker-alt" style= "color: #0073bf; width: 100px !important;"></i><br>Encontrar posibles clientes</button>
                                            <button class="btn post-nuevo btn-sm producto" style="margin-top: 9px !important;"> <i class="fas fa-users" style= "color: #0073bf; width: 100px !important;"></i><br>Grupos</button>
                                            <button class="btn post-nuevo btn-sm producto" style="margin-top: 9px !important;"><i class="fas fa-user-check" style= "color: #0073bf; width: 100px !important;"></i><br>ProFinder</button>
                                            <button class="btn post-nuevo btn-sm producto" style="margin-top: 9px !important;"><i class="far fa-money-bill-alt" style= "color: #0073bf; width: 100px !important;"></i><br>Salary</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-sm px-0 py-0" style="border-color: #C1C1C1; width: 340px;">
                                    <div class="card-header" style="height: 45px;">
                                        <h6 style="text-align: center;">Servicios Empresariales de LinkedIn</h6>
                                    </div>
                                    <div class="card-body px-0 py-0">
                                        <div class="px-3 pt-1">
                                            <button class="btn post-nuevo" style="margin-bottom: 10px !important;"><b style="font-weight: 650; font-size: .9rem;">Talent Solutions</b><br><p style="font-weight: 400; font-size: .8rem;">Encuentra, capta y contrata a candidatos cualificados.</p></button>
                                            <button class="btn post-nuevo" style="margin-bottom: 10px !important;"><b style="font-weight: 650; font-size: .9rem;">Sales Solutions</b><br><p style="font-weight: 400; font-size: .8rem;">Encuentra oportunidades de ventas.</p></button>
                                            <button class="btn post-nuevo" style="margin-bottom: 10px !important;"><b style="font-weight: 650; font-size: .9rem;">Anuncia un empleo</b><br><p style="font-weight: 400; font-size: .8rem;">Haz que tu empleo llegue a candidatos cualificados.</p></button>
                                            <button class="btn post-nuevo" style="margin-bottom: 10px !important;"><b style="font-weight: 650; font-size: .9rem;">Marketing Solutions</b><br><p style="font-weight: 400; font-size: .8rem;">Consigue más clientes y amplía tu negocio.</p></button>
                                            <button class="btn post-nuevo" style="margin-bottom: 10px !important;"><b style="font-weight: 650; font-size: .9rem;">Learning Solutions</b><br><p style="font-weight: 400; font-size: .8rem;">Promueve la adquisición de aptitudes en tu empresa.</p></button>
                                        </div>
                                    </div>
                                    <div class="card-footer px-3 py-0" style="height: 45px !important;">
                                        <button class="btn post-nuevo"><b style="font-weight: 650; font-size: .9rem;">Páginas de empresa     </b><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav id="barra">  
        <div id="barra-conjunto">
            <div id ="imagen-div">
                <img src="img/favicon.ico">
            </div>  
            <div>
                <nav id="barra-navegar">       
                    <ul id="ul-barra-navegar">
                        <!-- INICIO -->
                        <li>
                            <div class="div-iconos">                        
                                <a class="nav-a" href="linkedin.php">   
                                    <span style="margin-left:3px;"><svg version="1.1" id="icono-inicio" class="iconos" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 486.988 486.988" style="enable-background:new 0 0 486.988 486.988;display: inline" xml:space="preserve"><g><g><path d="M16.822,284.968h39.667v158.667c0,9.35,7.65,17,17,17h116.167c9.35,0,17-7.65,17-17V327.468h70.833v116.167c0,9.35,7.65,17,17,17h110.5c9.35,0,17-7.65,17-17V284.968h48.167c6.8,0,13.033-4.25,15.583-10.483c2.55-6.233,1.133-13.6-3.683-30.417L260.489,31.385c-6.517-6.517-17.283-6.8-23.8-0.283L5.206,255.785c-5.1,4.817-6.517,12.183-3.967,18.7C3.789,281.001,10.022,284.968,16.822,284.968z M248.022,67.368l181.333,183.6h-24.367c-9.35,0-17,7.65-17,17v158.667h-76.5V310.468c0-9.35-7.65-17-17-17H189.656c-9.35,0-17,7.65-17,17v116.167H90.489V267.968c0-9.35-7.65-17-17-17H58.756L248.022,67.368z"/></g></g></svg></span>                            
                                    <span class="nav-letras">Inicio</span>
                                </a>
                            </div>
                        </li>
                        <!-- MI RED -->
                        <li>
                            <div class="div-iconos" >                        
                                <a class="nav-a" href="mi-red.php">
                                    <span style="margin-left: 6px"><svg version="1.1" class="iconos" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve"><path d="M55.014,45.389l-9.553-4.776C44.56,40.162,44,39.256,44,38.248v-3.381c0.229-0.28,0.47-0.599,0.719-0.951c1.239-1.75,2.232-3.698,2.954-5.799C49.084,27.47,50,26.075,50,24.5v-4c0-0.963-0.36-1.896-1-2.625v-5.319c0.056-0.55,0.276-3.824-2.092-6.525C44.854,3.688,41.521,2.5,37,2.5s-7.854,1.188-9.908,3.53c-1.435,1.637-1.918,3.481-2.064,4.805C23.314,9.949,21.294,9.5,19,9.5c-10.389,0-10.994,8.855-11,9v4.579c-0.648,0.706-1,1.521-1,2.33v3.454c0,1.079,0.483,2.085,1.311,2.765c0.825,3.11,2.854,5.46,3.644,6.285v2.743c0,0.787-0.428,1.509-1.171,1.915l-6.653,4.173C1.583,48.134,0,50.801,0,53.703V57.5h14h2h44v-4.043C60,50.019,58.089,46.927,55.014,45.389z M14,53.262V55.5H2v-1.797c0-2.17,1.184-4.164,3.141-5.233l6.652-4.173c1.333-0.727,2.161-2.121,2.161-3.641v-3.591l-0.318-0.297c-0.026-0.024-2.683-2.534-3.468-5.955l-0.091-0.396l-0.342-0.22C9.275,29.899,9,29.4,9,28.863v-3.454c0-0.36,0.245-0.788,0.671-1.174L10,23.938l-0.002-5.38C10.016,18.271,10.537,11.5,19,11.5c2.393,0,4.408,0.553,6,1.644v4.731c-0.64,0.729-1,1.662-1,2.625v4c0,0.304,0.035,0.603,0.101,0.893c0.027,0.116,0.081,0.222,0.118,0.334c0.055,0.168,0.099,0.341,0.176,0.5c0.001,0.002,0.002,0.003,0.003,0.005c0.256,0.528,0.629,1,1.099,1.377c0.005,0.019,0.011,0.036,0.016,0.054c0.06,0.229,0.123,0.457,0.191,0.68l0.081,0.261c0.014,0.046,0.031,0.093,0.046,0.139c0.035,0.108,0.069,0.215,0.105,0.321c0.06,0.175,0.123,0.356,0.196,0.553c0.031,0.082,0.065,0.156,0.097,0.237c0.082,0.209,0.164,0.411,0.25,0.611c0.021,0.048,0.039,0.1,0.06,0.147l0.056,0.126c0.026,0.058,0.053,0.11,0.079,0.167c0.098,0.214,0.194,0.421,0.294,0.621c0.016,0.032,0.031,0.067,0.047,0.099c0.063,0.125,0.126,0.243,0.189,0.363c0.108,0.206,0.214,0.4,0.32,0.588c0.052,0.092,0.103,0.182,0.154,0.269c0.144,0.246,0.281,0.472,0.414,0.682c0.029,0.045,0.057,0.092,0.085,0.135c0.242,0.375,0.452,0.679,0.626,0.916c0.046,0.063,0.086,0.117,0.125,0.17c0.022,0.029,0.052,0.071,0.071,0.097v3.309c0,0.968-0.528,1.856-1.377,2.32l-2.646,1.443l-0.461-0.041l-0.188,0.395l-5.626,3.069C15.801,46.924,14,49.958,14,53.262z M58,55.5H16v-2.238c0-2.571,1.402-4.934,3.659-6.164l8.921-4.866C30.073,41.417,31,39.854,31,38.155v-4.018v-0.001l-0.194-0.232l-0.038-0.045c-0.002-0.003-0.064-0.078-0.165-0.21c-0.006-0.008-0.012-0.016-0.019-0.024c-0.053-0.069-0.115-0.152-0.186-0.251c-0.001-0.002-0.002-0.003-0.003-0.005c-0.149-0.207-0.336-0.476-0.544-0.8c-0.005-0.007-0.009-0.015-0.014-0.022c-0.098-0.153-0.202-0.32-0.308-0.497c-0.008-0.013-0.016-0.026-0.024-0.04c-0.226-0.379-0.466-0.808-0.705-1.283c0,0-0.001-0.001-0.001-0.002c-0.127-0.255-0.254-0.523-0.378-0.802l0,0c-0.017-0.039-0.035-0.077-0.052-0.116h0c-0.055-0.125-0.11-0.256-0.166-0.391c-0.02-0.049-0.04-0.1-0.06-0.15c-0.052-0.131-0.105-0.263-0.161-0.414c-0.102-0.272-0.198-0.556-0.29-0.849l-0.055-0.178c-0.006-0.02-0.013-0.04-0.019-0.061c-0.094-0.316-0.184-0.639-0.26-0.971l-0.091-0.396l-0.341-0.22C26.346,25.803,26,25.176,26,24.5v-4c0-0.561,0.238-1.084,0.67-1.475L27,18.728V12.5v-0.354l-0.027-0.021c-0.034-0.722,0.009-2.935,1.623-4.776C30.253,5.458,33.081,4.5,37,4.5c3.905,0,6.727,0.951,8.386,2.828c1.947,2.201,1.625,5.017,1.623,5.041L47,18.728l0.33,0.298C47.762,19.416,48,19.939,48,20.5v4c0,0.873-0.572,1.637-1.422,1.899c0,1.77,0.983,3.361,2.566,4.153l9.553,4.776C56.513,48.374,58,50.78,58,53.457V55.5z"/></svg></span>  
                                    <span class="nav-letras">Mi red</span>        
                                </a>
                            </div>
                        </li>
                        <!-- EMPlEOS -->
                        <li>
                            <div class="div-iconos">
                                <a class="nav-a" href="#">   
                                    <span style="margin-left:12px;"><svg class="iconos" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129"><g><path d="m10.5,113.2h107.9c2.3,0 4.1-1.8 4.1-4.1v-72.8c0-2.3-1.8-4.1-4.1-4.1h-31.3v-12.3c0-2.3-1.8-4.1-4.1-4.1h-37c-2.3,0-4.1,1.8-4.1,4.1v12.4h-31.4c-2.3,0-4.1,1.8-4.1,4.1v72.8c0.1,2.2 1.9,4 4.1,4zm39.6-89.2h28.8v8.3h-28.8v-8.3zm-35.5,16.4h30.4c0.3,0.1 0.6,0.1 0.9,0.1 0.3,0 0.6,0 0.9-0.1h35.2c0.3,0.1 0.6,0.1 0.9,0.1 0.3,0 0.6,0 0.9-0.1h30.4v28.2h-27.1v-4.9c0-2.3-1.8-4.1-4.1-4.1-2.3,0-4.1,1.8-4.1,4.1v4.9h-28.8v-4.9c0-2.3-1.8-4.1-4.1-4.1s-4.1,1.8-4.1,4.1v4.9h-27.3v-28.2zm-0,36.4h27.3v4.6c0,2.3 1.8,4.1 4.1,4.1s4.1-1.8 4.1-4.1v-4.6h28.8v4.6c0,2.3 1.8,4.1 4.1,4.1 2.3,0 4.1-1.8 4.1-4.1v-4.6h27.3v28.2h-99.8v-28.2z"/></g></svg></span>
                                    <span class="nav-letras">Empleos</span>
                                </a>
                            </div>
                        </li>
                        <!-- MENSAJES -->
                        <li>
                            <div class="div-iconos">                            
                                <a class="nav-a" href="#">   
                                    <span style="margin-left:16px;"><svg version="1.1" class="iconos"id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve"><g><path d="M10,25.465h13c0.553,0,1-0.448,1-1s-0.447-1-1-1H10c-0.553,0-1,0.448-1,1S9.447,25.465,10,25.465z"/><path d="M36,29.465H10c-0.553,0-1,0.448-1,1s0.447,1,1,1h26c0.553,0,1-0.448,1-1S36.553,29.465,36,29.465z"/><path d="M36,35.465H10c-0.553,0-1,0.448-1,1s0.447,1,1,1h26c0.553,0,1-0.448,1-1S36.553,35.465,36,35.465z"/><path d="M54.072,2.535L19.93,2.465c-3.27,0-5.93,2.66-5.93,5.93v5.124l-8.07,0.017c-3.27,0-5.93,2.66-5.93,5.93v21.141c0,3.27,2.66,5.929,5.93,5.929H12v10c0,0.413,0.254,0.784,0.64,0.933c0.117,0.045,0.239,0.067,0.36,0.067c0.193,0.212,0.464,0.327,0.74,0.327c0.121,0,0.243-0.022,0.36-0.067c0.386-0.149,0.64-0.52,0.64-0.933v-10h1.07c3.27,0,5.93-2.66,5.93-5.929V8.465C60,5.196,57.341,2.536,54.072,2.535z M44,40.536c0,2.167-1.763,3.929-3.934,3.929l-17.07,0.07c-0.28,0.001-0.548,0.12-0.736,0.327L14,53.949v-8.414c0-0.552-0.447-1-1-1H5.93c-2.167,0-3.93-1.763-3.93-3.929V19.465c0-2.167,1.763-3.93,3.932-3.93l9.068-0.019c0,0,0,0,0,0c0.001,0,0.001,0,0.002,0l25.068-0.052c2.167,0,3.93,1.763,3.93,3.93v18.441V40.536z M58,29.606c0,2.167-1.763,3.929-3.93,3.929H52c-0.553,0-1,0.448-1,1v8.414l-5-5.5V19.395c0-3.27-2.66-5.93-5.932-5.93L16,13.514v-5.12c0-2.167,1.763-3.93,3.928-3.93l34.141,0.07c0.001,0,0.001,0,0.002,0c2.167,0,3.93,1.763,3.93,3.93V29.606z"/></g></svg></span>  
                                    <span class="nav-letras">Mensajes</span>
                                </a>
                            </div>
                        </li>
                        <!-- NOTIFICACIONES -->
                        <li>
                            <div class="div-iconos" style="height:48 ;width:100px ">                                
                                <a class="nav-a" href="#">   
                                    <span style="margin-left:30px;"><svg version="1.1" class="iconos"id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"    y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M467.819,431.851l-36.651-61.056c-16.896-28.181-25.835-60.437-25.835-93.312V224c0-82.325-67.008-149.333-149.333-149.333S106.667,141.675,106.667,224v53.483c0,32.875-8.939,65.131-25.835,93.312l-36.651,61.056c-1.984,3.285-2.027,7.403-0.149,10.731c1.899,3.349,5.461,5.419,9.301,5.419h405.333c3.84,0,7.403-2.069,9.301-5.419C469.845,439.253,469.803,435.136,467.819,431.851z M72.171,426.667l26.944-44.907C118.016,350.272,128,314.219,128,277.483V224c0-70.592,57.408-128,128-128s128,57.408,128,128v53.483c0,36.736,9.984,72.789,28.864,104.277l26.965,44.907H72.171z"/></g></g><g><g><path d="M256,0c-23.531,0-42.667,19.136-42.667,42.667v42.667C213.333,91.221,218.112,96,224,96s10.667-4.779,10.667-10.667V42.667c0-11.776,9.557-21.333,21.333-21.333s21.333,9.557,21.333,21.333v42.667C277.333,91.221,282.112,96,288,96s10.667-4.779,10.667-10.667V42.667C298.667,19.136,279.531,0,256,0z"/></g></g><g><g><path d="M302.165,431.936c-3.008-5.077-9.515-6.741-14.613-3.819c-5.099,2.987-6.805,9.536-3.819,14.613c2.773,4.715,4.288,10.368,4.288,15.936c0,17.643-14.357,32-32,32c-17.643,0-32-14.357-32-32c0-5.568,1.515-11.221,4.288-15.936c2.965-5.099,1.259-11.627-3.819-14.613c-5.141-2.923-11.627-1.259-14.613,3.819c-4.715,8.064-7.211,17.301-7.211,26.731C202.667,488.085,226.581,512,256,512s53.333-23.915,53.376-53.333C309.376,449.237,306.88,440,302.165,431.936z"/></g></g></svg></span>        
                                    <span class="nav-letras">Notificaciones</span>
                                </a>
                            </div>
                        </li>
                        <!-- YO -->
                        <li>
                            <div class="div-iconos" style="border-right-width: 1px; border-right-style: solid; border-right-color: #c7d1d8;">           
                                <div class="dropdown">
                                    <a class="nav-a" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #c7d1d8 !important; cursor: pointer;">   
                                        <span style="margin-left:10px;"><svg version="1.1" class="iconos" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 53 53" style="enable-background:new 0 0 53 53;" xml:space="preserve"><path style="fill:#E7ECED;" d="M18.613,41.552l-7.907,4.313c-0.464,0.253-0.881,0.564-1.269,0.903C14.047,50.655,19.998,53,26.5,53c6.454,0,12.367-2.31,16.964-6.144c-0.424-0.358-0.884-0.68-1.394-0.934l-8.467-4.233c-1.094-0.547-1.785-1.665-1.785-2.888v-3.322c0.238-0.271,0.51-0.619,0.801-1.03c1.154-1.63,2.027-3.423,2.632-5.304c1.086-0.335,1.886-1.338,1.886-2.53v-3.546c0-0.78-0.347-1.477-0.886-1.965v-5.126c0,0,1.053-7.977-9.75-7.977s-9.75,7.977-9.75,7.977v5.126c-0.54,0.488-0.886,1.185-0.886,1.965v3.546c0,0.934,0.491,1.756,1.226,2.231c0.886,3.857,3.206,6.633,3.206,6.633v3.24C20.296,39.899,19.65,40.986,18.613,41.552z"/><g><path style="fill:#556080;" d="M26.953,0.004C12.32-0.246,0.254,11.414,0.004,26.047C-0.138,34.344,3.56,41.801,9.448,46.76c0.385-0.336,0.798-0.644,1.257-0.894l7.907-4.313c1.037-0.566,1.683-1.653,1.683-2.835v-3.24c0,0-2.321-2.776-3.206-6.633c-0.734-0.475-1.226-1.296-1.226-2.231v-3.546c0-0.78,0.347-1.477,0.886-1.965v-5.126c0,0-1.053-7.977,9.75-7.977s9.75,7.977,9.75,7.977v5.126c0.54,0.488,0.886,1.185,0.886,1.965v3.546c0,1.192-0.8,2.195-1.886,2.53c-0.605,1.881-1.478,3.674-2.632,5.304c-0.291,0.411-0.563,0.759-0.801,1.03V38.8c0,1.223,0.691,2.342,1.785,2.888l8.467,4.233c0.508,0.254,0.967,0.575,1.39,0.932c5.71-4.762,9.399-11.882,9.536-19.9C53.246,12.32,41.587,0.254,26.953,0.004z"/></g></svg></span>        
                                        <span class="nav-letras" style="margin-left: 11px;">Yo <i class="fas fa-caret-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu mt-4 pb-0" aria-labelledby="dropdownMenuButton">
                                        <img class="img-fluid img-thumbnail rounded-circle ml-2" id="img-perfil-usuario" style="max-width: 25px;" src=<?php echo $_COOKIE["imagen"]?>>
                                        <b><?php echo $_COOKIE["nombre"]." ".$_COOKIE["apellido"]?></b>
                                        <a href="perfil-usuario.php"><button type="button" class="btn btn-outline-primary" style="width: 257px; border-radius: 0; height: 25px; margin: 10px; padding-top: 1px;" href="perfil-usuario.php">Ver Perfil</button></a>
                                        <button class="dropdown-item card" style="background-color: #E1E9EE; font-weight: 649; border-radius: 0;">CUENTA</button>
                                        <button class="dropdown-item" style="font-size: .9rem;">Ajustes y Privacidad</button>
                                        <button class="dropdown-item" style="font-size: .9rem;">Ayuda</button>
                                        <button class="dropdown-item" style="font-size: .9rem;">Idioma</button>
                                        <button class="dropdown-item card" style="background-color: #E1E9EE; font-weight: 649; border-radius: 0;">GESTIONAR</button>
                                        <button class="dropdown-item" style="font-size: .9rem;">Publicaciones y Actividad</button>
                                        <button class="dropdown-item" style="font-size: .9rem;">Cuenta de anuncios de empleo</button>
                                        <a class="dropdown-item card" href="logout.php" style="border-radius: 0; background-color: #F5F5F5; color: #c01111; font-weight: 650; text-decoration: underline;"><span>Cerrar sesión  <i class="fas fa-sign-out-alt" style="color: #c01111;"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!-- PRODUCTOS -->
                        <li> 
                            <div class="div-iconos">                                        
                                <a class="nav-a" data-target="#modalProductos" data-toggle="modal" style="color: #c7d1d8 !important; cursor: pointer;">   
                                    <span style="margin-left:19px;"><svg version="1.1" class="iconos"id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="511.626px" height="511.627px" viewBox="0 0 511.626 511.627" style="enable-background:new 0 0 511.626 511.627;" xml:space="preserve"><g><g><path d="M301.492,347.177h-91.361c-7.614,0-14.084,2.662-19.414,7.994c-5.33,5.331-7.992,11.8-7.992,19.41v54.823c0,7.611,2.662,14.089,7.992,19.417c5.327,5.328,11.8,7.987,19.414,7.987h91.361c7.618,0,14.086-2.662,19.418-7.987c5.325-5.331,7.994-11.806,7.994-19.417v-54.823c0-7.61-2.662-14.085-7.994-19.41S309.11,347.177,301.492,347.177z"/><path d="M118.771,347.177H27.406c-7.611,0-14.084,2.662-19.414,7.994C2.663,360.502,0,366.974,0,374.585v54.826c0,7.61,2.663,14.086,7.992,19.41c5.33,5.332,11.803,7.991,19.414,7.991h91.365c7.611,0,14.084-2.663,19.414-7.991c5.33-5.324,7.992-11.8,7.992-19.41v-54.826c0-7.611-2.662-14.083-7.992-19.411S126.382,347.177,118.771,347.177z"/><path d="M118.771,54.814H27.406c-7.611,0-14.084,2.663-19.414,7.993C2.663,68.137,0,74.61,0,82.221v54.821c0,7.616,2.663,14.091,7.992,19.417c5.33,5.327,11.803,7.994,19.414,7.994h91.365c7.611,0,14.084-2.667,19.414-7.994s7.992-11.798,7.992-19.414V82.225c0-7.611-2.662-14.084-7.992-19.417C132.855,57.48,126.382,54.814,118.771,54.814z"/><path d="M301.492,200.999h-91.361c-7.614,0-14.084,2.664-19.414,7.994s-7.992,11.798-7.992,19.414v54.823c0,7.61,2.662,14.078,7.992,19.406c5.327,5.329,11.8,7.994,19.414,7.994h91.361c7.618,0,14.086-2.665,19.418-7.994c5.325-5.328,7.994-11.796,7.994-19.406v-54.823c0-7.616-2.662-14.087-7.994-19.414S309.11,200.999,301.492,200.999z"/><path d="M118.771,200.999H27.406c-7.611,0-14.084,2.664-19.414,7.994C2.663,214.32,0,220.791,0,228.407v54.823c0,7.61,2.663,14.078,7.992,19.406c5.33,5.329,11.803,7.994,19.414,7.994h91.365c7.611,0,14.084-2.665,19.414-7.994c5.33-5.328,7.992-11.796,7.992-19.406v-54.823c0-7.616-2.662-14.087-7.992-19.414S126.382,200.999,118.771,200.999z"/><path d="M503.632,62.811c-5.332-5.327-11.8-7.993-19.41-7.993h-91.365c-7.61,0-14.086,2.663-19.417,7.993c-5.325,5.33-7.987,11.803-7.987,19.414v54.821c0,7.616,2.662,14.083,7.987,19.414c5.331,5.327,11.807,7.994,19.417,7.994h91.365c7.61,0,14.078-2.667,19.41-7.994s7.994-11.798,7.994-19.414V82.225C511.626,74.613,508.964,68.141,503.632,62.811z"/><path d="M301.492,54.818h-91.361c-7.614,0-14.084,2.663-19.414,7.993s-7.992,11.803-7.992,19.414v54.821c0,7.616,2.662,14.083,7.992,19.414c5.327,5.327,11.8,7.994,19.414,7.994h91.361c7.618,0,14.086-2.664,19.418-7.994c5.325-5.327,7.994-11.798,7.994-19.414V82.225c0-7.611-2.662-14.084-7.994-19.414C315.578,57.484,309.11,54.818,301.492,54.818z"/><path d="M484.222,200.999h-91.365c-7.61,0-14.086,2.664-19.417,7.994c-5.325,5.33-7.987,11.798-7.987,19.414v54.823c0,7.61,2.662,14.078,7.987,19.406c5.331,5.329,11.807,7.994,19.417,7.994h91.365c7.61,0,14.085-2.665,19.41-7.994c5.332-5.328,7.994-11.796,7.994-19.406v-54.823c0-7.616-2.662-14.087-7.994-19.414C498.3,203.663,491.833,200.999,484.222,200.999z"/><path d="M484.222,347.177h-91.365c-7.61,0-14.086,2.662-19.417,7.994c-5.325,5.331-7.987,11.8-7.987,19.41v54.823c0,7.611,2.662,14.089,7.987,19.417c5.331,5.328,11.807,7.987,19.417,7.987h91.365c7.61,0,14.085-2.662,19.41-7.987c5.332-5.331,7.994-11.806,7.994-19.417v-54.823c0-7.61-2.662-14.085-7.994-19.41S491.833,347.177,484.222,347.177z"/></g></g></svg></span>               
                                    <span class="nav-letras">Productos <i class="fas fa-caret-down"></i></span>
                                </a>
                            </div>
                        </li>            
                    </ul>
                </nav>
            </div>
        </div>
    </nav>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>