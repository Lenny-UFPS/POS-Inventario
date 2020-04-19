<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
       <!-- jQuery library -->
       <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
       <script type="text/javascript" src ="script.js"></script>
 
</head>
<body>
Nombre: <input type="text" id="nombre"> <br>
Mensaje: <input type="text" id="mensaje"> <br>
<input type="button" name="enviar" value="Enviar" href="javascript:;" onclick="Hola($('#nombre').val(),$('#mensaje').val());">
<div id="resultado"></div>

<script>
	function Hola(nombre,mensaje) {
     var parametros = {"Nombre":nombre,"Mensaje":mensaje};
$.ajax({
    data:parametros,
    url:'procesoAjax.php',
    type: 'post',
    beforeSend: function () {
        $("#resultado").html("Procesando, espere por favor");
    },
    success: function (response) {   
        $("#resultado").html(response);
    }
});
}
</script>
</body>
</html>


var valor = eval($('#cantidad_'+id).val()) + 1;
			$('#cantidad_'+id).val(valor);
			var tmp = valor * precio;
			$('#subtotal_'+id).val(new Intl.NumberFormat("en-US").format(tmp));