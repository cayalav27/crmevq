$('.date-end').bootstrapMaterialDatePicker({ 
	minDate : new Date(),
	weekStart : 0,
	clearButton: true,
	format: 'DD/MM/YYYY HH:mm' 
});
$('.date-start').bootstrapMaterialDatePicker({ 
	weekStart : 0,
	clearButton: true,
	format: 'DD/MM/YYYY HH:mm' 
}).on('change', function(e, date)
{
$('.date-end').bootstrapMaterialDatePicker('setMinDate', date);
});

$('.date-fin').bootstrapMaterialDatePicker({ 
	minDate : new Date(),
	weekStart : 0,
	time: false,
	clearButton: true,
	format: 'DD/MM/YYYY' 
});
$('.date-inicio').bootstrapMaterialDatePicker({ 
	weekStart : 0,
	time: false,
	clearButton: true,
	format: 'DD/MM/YYYY' 
}).on('change', function(e, date)
{
$('.date-fin').bootstrapMaterialDatePicker('setMinDate', date);
});
