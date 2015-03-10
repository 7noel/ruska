$(document).ready(function(){
	$('#datepicker').change(function(){
		$('#address').focus();
	});
	//calcular monto
	$('#model_id').change(function(){
		seleccionarSeguro();
		//$('#use_type_id').focus();
	});
	$('#use_type_id').change(function(){
		//alert("ppppp");
		cargaCategoriasSeguro();
	});
	$('#insurance_category_id').change(function(){
		calcularTasa();
	});
	$('#year').change(function(){
		calcularTasa();
		//$('#currency').focus();
	});
	$('#rate').change(function(){
		calcularPrima();
	});
	$('#value').change(function(){
		calcularPrima();
	});
	$('.btn-validate').click(function(){
		var id = $(this).data('id');
		var form = $('#form-validate');
		var action = form.attr('action').replace('QUOTE_ID',id);
		$.post(action, form.serialize(), function(data){
			alert(data);
			location.reload(true);
		});
	});
});

/*cargar categorias de seguro*/
function cargaCategoriasSeguro(){
	var idtipo = $('#use_type_id option:selected').val();
	var page = "/listarCategoriasSeguro/" + idtipo;
	if(idtipo !=''){
		$.get(page, function(data){
			$('#insurance_category_id').empty();
			if (data.length > 1) {
				$('#insurance_category_id').append("<option value=''>SELECCIONAR</option>");
			} else{
				$('#year').focus();			
			};
			$.each(data, function (index, SegObj) {
				$('#insurance_category_id').append("<option value='"+SegObj.id+"'>"+SegObj.alias+"</option>");
			});
			if (data.length > 1) {seleccionarSeguro();};
		});
	}
}

/*Seleccionar categoria de seguro segun modelo(modelo_id) y uso(use_type_id)*/
function seleccionarSeguro(){
	var modelo = $('#model_id option:selected').val();
	var uso = $('#use_type_id option:selected').val();
	var page = "/seleccionarSeguro/" + modelo + "/" + uso;
	if(modelo !='' && uso==1){
		$.get(page, function(data){
			$("#insurance_category_id option[value="+ data +"]").attr("selected",true);
			$("#insurance_category_id option:not(:selected)").remove();
			$("#year").focus();
		});
	} else{
		$("#insurance_category_id option[value="+ '' +"]").attr("selected",true);
		if (uso>0) {$("#insurance_category_id").focus();};
		
	};
}
/*Calcula tasa teniendo como parametros el modelo(modelo_id) y año(year)*/
function calcularTasa(){
	var seguro = $('#insurance_category_id option:selected').val();
	var year = $('#year option:selected').val();
	var page = "/getRate/" + seguro + "/" + year;
	if(seguro != '' && year != ''){
		$.get(page, function(data){
			$('#rate').val(data);
		});
	}
}
/*Calcula prima neta y prima total teniendo como parametros la tasa(rate) y valor comercial(value)*/
function calcularPrima(){
	var seguro = $('#insurance_category_id option:selected').val();
	var year = $('#year option:selected').val();
	var page = "/getPmin/" + seguro + "/" + year;
	var valor = $('#value').val();
	var rate = $('#rate').val();
	var factor = $('#factor').val();
	var prima = valor*rate/100;
	prima = parseFloat(prima.toFixed(2));
	if(valor > 0  && rate > 0){
		//obtiene la prima minima
		$.get(page, function(data){
			var min = parseFloat(data);
			if (prima < min) {prima = parseFloat(min.toFixed(2));};
			var primatotal = prima*factor;
			primatotal = parseFloat(primatotal.toFixed(2));
			$('#primaneta').val(prima.toFixed(2));
			$('#primatotal').val(primatotal.toFixed(2));
		});
	}
}