function deleteData(url,object,text){
		swal({
		    title: "Are you Sure?",
		    text: text,
		    icon: "info",
		    showCancelButton: true,
		    buttons: {
                cancel: {
                    text: "No, Cancel",
                    value: null,
                    visible: true,
                    className: "btn-danger",
                    closeModal: false,
                },
                confirm: {
                    text: "Yes, Delete",
                    value: true,
                    visible: true,
                    className: "btn-success",
                    closeModal: false
                }
		    }
		}).then(isConfirm => {
		    if (isConfirm) {
		    	$.get(url,object,function(r){
		    		if(r.status==='success'){
		    			swal("Success!", "Item Deleted Successfully", "success");
		    			setTimeout(function(){window.location.reload(false)},1000);
		    		}
		    		else{
		    			swal("Error",'Item Not Deleted', "error");
		    			
		    		}
		    	}).fail(function(){
		    		swal("Error", "OOps an Error Occured. Try Again", "error");
		    	
		    	});
		    } else {
		        swal("Alert", "Item Not Deleted", "error");
		      
		    }
		});

}