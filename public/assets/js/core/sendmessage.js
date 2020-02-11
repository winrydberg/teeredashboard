$('.sendmessagebtn').on('click',function(e){
   e.preventDefault();
   var receipientname = $(this).attr('name');
   var receipientphone = $(this).attr('phone');
   $('#receipientname').val(receipientname);
   $('#receipientphone').val(receipientphone);
    $('#receipientphonehidden').val(receipientphone);
  $('#sendmessagemodal').modal('show'); 

});
 
$('#sendsinglemessagebtn').on('click',function(){
      $('#loading').show();
      $.post($('#sendsinglemessageform').attr('action'),$('#sendsinglemessageform').serialize(),function(res){
      		if(res.status=='success'){
      			swal('Success','Message Sent Successfully','success');
      			$('#loading').hide();
      			$('#sendmessagemodal').modal('hide'); 
      		}else{
      			swal('OOps','Message Not Sent.. Try Again','error');
      			$('#loading').hide();
      			$('#sendmessagemodal').modal('hide'); 
      		}
      }).fail(function(){
      	swal('OOps','Message Not Sent.. Try Again','error');
      	$('#loading').hide();
      	$('#sendmessagemodal').modal('hide'); 
      })
});