$(document).ready(function() {
	
});

function cerrarSession() {
	Swal.fire({
	  text: "Realmente quiere cerrar la sesión?",
	  icon: 'question',
	  showCancelButton: true,
	  confirmButtonColor: '#3085d6',
	  cancelButtonColor: '#d33',
	  confirmButtonText: 'Si, salir!',
	  cancelButtonText: 'No'
	}).then((result) => {
	  if (result.isConfirmed) {
	    $.ajax({
	    	url: url+'login/salir',
	    	type: 'POST',
	    	dataType: 'json',
	    	success: function(d){
	    		if(d.success){
	    			Swal.fire({
						  position: 'center',
						  title: d.mensaje,
						  showConfirmButton: false,
						  timer: 1500
						}).then((result) => {
						  if (result.dismiss === Swal.DismissReason.timer) {
						    location.reload();
						  }
						})
	    		}else{
	    			Swal.fire({
						  text: d.mensaje,
						  showClass: {
						    popup: 'animate__animated animate__fadeInDown'
						  },
						  hideClass: {
						    popup: 'animate__animated animate__fadeOutUp'
						  }
						})
	    		}
	    	}
	    });
	    
	  }
	})
}