
// show submeniu
function openmenu(care) { /* $('.submeniu').hide(); */ $('#'+care).toggle('fast'); return false; }
// create filter form


var filterContor = 0;
function addNewFormFilter() {
	// add more than one filter ++ on every click
	filterContor++;
	// show the [submit filters] button
	$('#_submitFilters').show();
	// each field will have a filter - generat the SELECT field
	// on change of this select, we'll get optional values to enter or select (if the field is a 'select' type)
	var stringToForm_field = '<select name="field" id="field'+filterContor+'" onchange="addSearchTo(this.value, '+filterContor+')"><option value="">'+DICT_SEARCH_FILTER_TO+'</option>';
	for(fld in availableFilters) {
		// if the field is not select, we have a string label, else an array
		if(typeof availableFilters[fld] == 'string') {
			stringToForm_field += '<option value="'+fld+'">'+availableFilters[fld]+'</option>';
		} else {
			stringToForm_field += '<option value="'+fld+'">'+availableFilters[fld][0]+'</option>';
		}
	}
	stringToForm_field += '</select>';
	// append to filters list + remove button
	$('#_filterZone').append('<p id="filterNo'+filterContor+'"><a href="#" onclick="$(\'#filterNo'+filterContor+'\').remove();return false;" title="'+DICT_REMOVER_FILTER+'"><img src="images/ico_delete-14x13.png" alt="delete" title="delete" /></a> '+stringToForm_field+' <span id="searchSpan'+filterContor+'">'+DICT_CHOOSE_A_FILTER+'</span></p>');
	return false;
}


// run this after each select change
function addSearchTo(val, c) {
	if(val == '') {
		$('#searchSpan'+c).html('choose a field');
		return false;
	}
	var finalString = '<select name="howToCompare" id="howToCompare'+c+'"><option value="=">=</option><option value=">">&gt;</option><option value="<">&lt;</option><option value="*">LIKE</option></select> ';
	if(typeof availableFilters[val] == 'string') {
		finalString += '<input type="text" name="search" id="search'+c+'" />';
	} else {
		finalString += '<select name="search" id="search'+c+'"><option value="">&nbsp;</option>';
		for(iFld in availableFilters[val][1]) {
			finalString += '<option value="'+iFld+'">'+availableFilters[val][1][iFld]+'</option>';
		}
		finalString += '</select>';
	}
	$('#searchSpan'+c).html(finalString);
}


// send "submit filters" to a POST and get an URL for current filters
var busyRequest = false;
function applyCurrentFilters() {
	// check if busy before anything...
	if(busyRequest) {
		return false;
	}
	// make it busy and show the fake submit
	busyRequest = true;
	$('#_applyFilters').hide();
	$('#_applyFilters_fake').show();
	// create the POST
	var mainObject = { makeFilter: 1 };
	var elem_field = '';
	var elem_search = '';
	// and add every filter (non-empty) to the POST
	for(iObj=1;iObj<=filterContor;iObj++) {
		elem_field = $('#field'+iObj);
		elem_search = $('#search'+iObj);
		elem_comp = $('#howToCompare'+iObj);
		// chek if fields are non-empty
		if( elem_field.length > 0 && elem_search.length > 0 && elem_field.val() != '' && elem_search.val() != '' && elem_comp.length > 0 && elem_comp.val() != '' ) {
			mainObject[elem_field.val()] = elem_comp.val()+'|'+elem_search.val();
		}
	}
	// make the POST
	$.post(currentURL, mainObject, function(data) {
		// if no valid filters, show an alert
		if(data == '') {
			alert(DICT_SET_SOME_VALID_FILTERS);
			busyRequest = false;
			$('#_applyFilters').show();
			$('#_applyFilters_fake').hide();
		// else go and filter
		} else {
			location.href = data;
			return false;
		}
	});
	// return false so the link will not go anywhere
	return false;
}

function makeIframe(id, options) {
	options.width = options.width || 500;
	options.height = options.height || 300;
	options.title = options.title || '';
	$( '#'+id ).dialog({ title:options.title, width: options.width, height: options.height, modal: true, resizable: false });
	return false;
}
