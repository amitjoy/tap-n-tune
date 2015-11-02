
/* have sortable */
var elem_tdbodyList = $('.haveOrder tbody');
if(elem_tdbodyList.length) {
	var fixHelper = function(e, ui) {
		ui.children().each(function() { $(this).width($(this).width()); });
		return ui;
	}; elem_tdbodyList.sortable({
		helper: fixHelper,
		stop: function(event, ui) {
			// ui.item.index();
		}
	}).disableSelection();
}

/* have datepicker */
$(function() { 
	var elem_datePicker = $('.dp');
	if(elem_datePicker.length) {
		elem_datePicker.datepicker({ dateFormat:'yy-mm-dd' });
	}
	var data = new Date();
	elem_datePicker.change( function() {
		var comps = new Array();
		var vals = $(this).val();
		$(this).val(vals);
		comps = vals.split(' ');
		if( comps[1] == undefined && vals != '' )
			$(this).val($(this).val()+' '+data.getHours()+':'+data.getMinutes()+':00');
	});
});

/* highlight table line */
$('._listing tr').hover(function(){
	$(this).find('td').css({ background:'#fff' });
}, function(){
	$(this).find('td').css({ background:'transparent' });
});

/* delete multiple records */
$('#makeMultipleDeletes').click(function(){
	// 
	var ths = $(this);
	var lnk = ths.attr('href');
	var finalDeleted = '';
	$('.makeDelete').each(function(){
		var ths1 = $(this);
		if(ths1.is(':checked')) {
			finalDeleted += ths1.val()+'|';
		}
	});
	if(finalDeleted == '') {
		alert(DICT_SELECT_RECORDS_TO_DELETE);
		return false;
	}
	if(!confirm(DICT_DELETE_SELECTED_RECORDS)){
		return false;
	}
	finalLink = lnk.replace('MULTIPLE', finalDeleted);
	location.href = finalLink;
	return false;
});
