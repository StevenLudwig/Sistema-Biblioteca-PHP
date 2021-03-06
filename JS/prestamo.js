//Steve Ludwig de Jesus Beltran Florentino------------------------------------

var ordenar = '';
$(document).ready(function(){
	
	// Llamando a la funcion de busqueda al cargar la pagina
	filtrar()

	
	// filtrar al darle click al boton
	$("#btnfiltrar").click(function(){ filtrar() });
	
	// boton cancelar
	$("#btncancel").click(function(){ 
		$("select").find("option[value='']").attr("selected",true)
		filtrar() 
	});
	
	// ordenar por
	$("#data th span").click(function(){
		var orden = '';
		if($(this).hasClass("desc"))
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("asc");
			ordenar = "&orderby="+$(this).attr("title")+" asc"		
		}else
		{
			$("#data th span").removeClass("desc").removeClass("asc")
			$(this).addClass("desc");
			ordenar = "&orderby="+$(this).attr("title")+" desc"
		}
		filtrar()
	});
});

function filtrar()
{	
	$.ajax({
		data: $("#frm_filtro").serialize()+ordenar,
		type: "POST",
		dataType: "json",
		url: "ajax.php?action=prestamos",
			success: function(data){
				var html = '';
				if(data.length > 0){
					$.each(data, function(i,item){
						html += '<tr>'
							html += '<td>'+item.clavesocio+'</td>'
							html += '<td>'+item.claveejemplar+'</td>'
							html += '<td>'+item.numeroorden+'</td>'
							html += '<td>'+item.fecha_prestamo+'</td>'
							html += '<td>'+item.fecha_devolucion+'</td>'
							html += '<td>'+item.notas+'</td>'
						html += '</tr>';
															
					});					
				}
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
			}
	  });
}