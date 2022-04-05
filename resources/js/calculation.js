function calculation(){
	var cal1 = document.record.morning.value;
	
	var cal2 = document.record.lunch.value;
	
	var cal3 = document.record.dinner.value;

	var total = cal1 + cal2 + cal3;
	
	document.record.result.value = total;

}