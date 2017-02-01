function confirmSoftDelete()
{
	if (confirm('Weet je zeker dat je dit op inactive wil zetten?')) {
    
	} else {
    // Do nothing!
	}
}

$(document).on('submit', 'form[data-confirm]', function(e){
    if(!confirm($(this).data('confirm'))){
    	e.stopImmediatePropagation();
      	e.preventDefault();
		}
});