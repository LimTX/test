 function getBaseURL() {
    var url = location.href;  // entire url including querystring - also: window.location.href;
    var baseURL = url.substring(0, url.indexOf('/', 14));


    if (baseURL.indexOf('http://localhost') != -1) {
        // Base Url for localhost
        var url = location.href;  // window.location.href;
        var pathname = location.pathname;  // window.location.pathname;
        var index1 = url.indexOf(pathname);
        var index2 = url.indexOf("/", index1 + 1);
        var baseLocalUrl = url.substr(0, index2);

        return baseLocalUrl + "/";
    }
    else {
        // Root Url for domain name
        return baseURL + "/";
    }

}

 $(document).ready(
	function() {
  		$('#CustomerSchoolId').live('change',
		function() {
    		if($(this).val().length != 0) {
				
				$.get(getBaseURL()+"admin/customers/get_classes_ajax",
					{ school_id: $(this).val() },
					function(data) {
						//alert(data);
						populateSchoolList(data);			
					});
      		}
    	});
	});
 
	function populateSchoolList(classrooms) {
  		var options = '';
		var cat = $.parseJSON(classrooms);
				
		if(classrooms.length > 2) {
  			$.each(cat, function(index, classes) {
    			options += '<option value="' + index + '">' + classes + '</option>';
  			});
		
			
		}
		else {
			options = '<option value="">-- No Classes --</option>	';
		}
		
		$('#CustomerClassroomId').html(options);
	}