jQuery(document).ready(function($) {
      $('#rvsp-confirm, #rvsp-regret').on('click',function(e) {
          e.preventDefault(); // stop the normal submit
          

          $form = "#hs-rvsp-form"
          var _data = $($form).serialize()+'&attendance=' + $(this).val();
         
          $.ajax({
              type: 'POST',
              url: admin_url.ajax_url,
              data: _data,
              success: function(response) {
           		console.log(response)

              	if (response.error == false){
              		$($form)[0].reset();
              	}
              }
          });
          return false;
      });
  });