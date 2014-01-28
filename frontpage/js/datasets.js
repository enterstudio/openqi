$(document).ready(function(){

	$('.typeahead').typeahead([
		{
	 		 name: 'hospital',
	  	local: ['Queen Alexandra Hospital', 'Brighton Hospital']
		},
		{
			name: 'speciality',
			local: ['Orthopaedics', 'Cardiology', 'Critical Care']
		}

	]);

});

