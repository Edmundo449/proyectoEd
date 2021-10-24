<?php
include 'inc/conexion.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_del_proveedor_post = strtoupper($_POST['nombre_del_proveedor']);
    $direccion_del_proveedor_post = strtoupper($_POST['direccion_del_proveedor']);
    $telefono_1_post = strtoupper($_POST['telefono_1']);
    $telefono_2_post = strtoupper($_POST['telefono_2']);
    $correo_proveedor_post = strtoupper($_POST['correo_proveedor']);
    $id_proveedor='';
    $ins=$con->prepare("INSERT INTO proveedor VALUES(?,?,?,?,?,?)");
    $ins->bind_param("isssss",$id,$nombre_del_proveedor_post,$direccion_del_proveedor_post,$telefono_1_post,$telefono_2_post,$correo_proveedor_post);
    if($ins->execute()){
        echo 
		'<style type="text/css">
		  p { 
				padding: 20px;
				width: 100%;
				background-color: #04AA6D;
				color: white;
				margin-bottom: 15px;
				font-size: 28px;
				margin-bottom: 15px;
			}
		</style>
		<div class="alertBien">				
			<center> <p> <strong>¡HECHO!</strong> El proveedor se dió de alta con éxito. </p> </center>
		</div>';
		require("index.php");	
    }
    else{
        echo 
		'<style type="text/css">
		  p { 
				padding: 20px;
				width: 100%;
				background-color: #f44336;
				color: white;
				font-size: 28px;
				margin-bottom: 15px;
			}
		</style>
		<div class="alertBien">				
			<center> <p> <strong>¡ERROR!</strong> El proveedor no se pudo registrar.. </p> </center>
		</div>';
		require("index.php");	
    }
    $ins->close();
    $con->close();
    /*$nombre_del_proveedor_post = strtoupper($_POST['nombre_del_proveedor']);
    $direccion_del_proveedor_post = strtoupper($_POST['direccion_del_proveedor']);
    $telefono_1_post = strtoupper($_POST['telefono_1']);
    $telefono_2_post = strtoupper($_POST['telefono_2']);
    $correo_proveedor_post = strtoupper($_POST['correo_proveedor']);
    
    $ins=$con->query("INSERT INTO proveedor VALUES(NULL,'$nombre_del_proveedor_post','$direccion_del_proveedor_post','$telefono_1_post','$telefono_2_post','$correo_proveedor_post')");
    if($ins){
        echo "Proveedor Registrado";
    }
    else{
        echo "NO SE HA EFECTUADO EL REGISTRO";
    }
    $con->close();*/
}
