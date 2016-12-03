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
		url: "ajax.php?action=listar",
			success: function(data){
				var html = '';
				if(data.length > 0){
					$.each(data, function(i,item){
						html += '<tr>'
							html += '<td>'+item.claveejemplar+'</td>'
							html += '<td>'+item.titulo+'</td>'
							html += '<td>'+item.idioma+'</td>'
							html += '<td>'+item.formato+'</td>'
							html += '<td>'+item.nombre+'</td>'
							html += '<td>'+item.autor+'</td>'
							html += '<td>'+item.estado+'</td>'
							html += '<td>'+item.hasta+'</td>'
						html += '</tr>';
															
					});					
				}
				if(html == '') html = '<tr><td colspan="4" align="center">No se encontraron registros..</td></tr>'
				$("#data tbody").html(html);
			}
	  });
}