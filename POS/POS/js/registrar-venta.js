function calculo(cantidad,precio,inputtext){
  /* Parametros:
  cantidad - entero con la cantidad
  precio - entero con el precio
  */
  
  	// Calculo del subtotal
  	subtotal = precio * cantidad;
  	inputtext.value = new Intl.NumberFormat("en-US").format(subtotal);
  	var container = document.querySelector('.factura-content-card').children; // Extraer un array de todos los elementos padres entre los hijos
  	//console.log("Container: ", container);
	var total = 0;
	for(i = 1; i < container.length; i++){
		total += parseInt(container[i].querySelector('.row .col-4 input').value, 10) * 1000; // Recorrer cada elemento del array (container), buscando el elemento donde se encuentran los respectivos subtotales.
	}
	document.getElementById('totalFactura').value = new Intl.NumberFormat("en-US").format(total); // Actualizar total con la función --> onchange(function()) 
}

function addItem(id){ // Añadir item a la factura 

		var row_id = " id='row_"+id+"'>";
		var nombre_id = " id='nombre_"+id+"' readonly style='pointer-events: none'>";
		var cantidad_id = " id='cantidad_"+id+"'";
		var subtotal_id = " id='subtotal_"+id+"' readonly style='pointer-events: none'>";
		var deleteItem = " id='deleteItem_"+id+"' onclick='deleteFunction(this.id)'>";

		var nombre_producto = " value='"+ $('#'+id).attr('data-name') + "'";
		var precio = $('#'+id).attr('data-price');
		var format_precio = new Intl.NumberFormat("en-US").format(precio);
		var precio_venta = " value='" + format_precio + "'";
		var subtotal = "subtotal_"+id;

		var html = "<div class='row mb-3'" +row_id+ "<div class='col-1'><button class='btn btn-danger mr-2'"+deleteItem+"<i class='fas fa-times nav-icon'></i></button></div><div class='col-5'><div class='form-group'><div class='input-group'><input type='text' class='form-control'"+nombre_producto+nombre_id+"</div></div></div><div class='col-2'><input type='text' class='form-control' value='1'"+cantidad_id+" onchange='calculo(this.value, "+precio+", "+subtotal+")'>"+"</div><div class='col-4'><div class='input-group'><div class='input-group-prepend'><span class='input-group-text bg-light'><i class='fas fa-dollar-sign nav-icon'></i></span></div><input type='text' class='form-control'" + precio_venta + subtotal_id + "</div></div></div>"; // Código para la fila a añadir

		if( $("div.row#row_"+id).length > 0 ){
			var valor = eval($('#cantidad_'+id).val()) + 1;
			document.querySelector('#cantidad_'+id).value = valor;
			//$('#cantidad_'+id).val(valor);
			var tmp = valor * precio;
			$('#subtotal_'+id).val(new Intl.NumberFormat("en-US").format(tmp));
			var container = document.querySelector('.factura-content-card').children;
			var total = 0;
			for(i = 1; i < container.length; i++){
				total += parseInt(container[i].querySelector('.row .col-4 input').value, 10) * 1000;
			}
			document.getElementById('totalFactura').value = new Intl.NumberFormat("en-US").format(total);
			
		}else{
			$('.factura-content-card').append(html);  // Like a push --> array
			var container = document.querySelector('.factura-content-card').children;
			var total = 0;
			for(i = 1; i < container.length; i++){
				total += parseInt(container[i].querySelector('.row .col-4 input').value, 10) * 1000;  // Recorrer el array de padres - hijos, con su respectivo parámetro para consultar un dato en específico
			}
			document.getElementById('totalFactura').value = new Intl.NumberFormat("en-US").format(total);
		}
	}

function deleteFunction(id){  // Quitar n elementos de la factura temporal dado un id, actualizando valor total dinámicamente 
	var precio = parseInt($('#subtotal_'+id.substring(11,14)).val(), 10) * 1000;
	var new_id = 'row_' + id.substring(11,14);
	var item = document.getElementById(new_id);
	item.parentNode.removeChild(item);
	var total = parseInt(document.getElementById('totalFactura').value, 10) * 1000;
	document.getElementById('totalFactura').value = new Intl.NumberFormat("en-US").format(total - precio);
}

$(document).ready(function(){  // Inicializar la tabla --> #tableProductos
	$('#tableProductos').DataTable({
	  "scrollY": "320px",
	  "scrollCollapse": true,
	  "processing": true,
	  "lengthMenu": [[5, 10, 25, 50, 100], [5, 10, 25, 50, 100]],
	  "language": {
	    "lengthMenu": "Mostrar _MENU_ registros",
	    "search": "Buscar: ",
	    "paginate": {
	      "first": "Primero",
	      "last": "Último",
	      "next": "Siguiente",
	      "previous": "Anterior"
	    }
	  }
	});
});