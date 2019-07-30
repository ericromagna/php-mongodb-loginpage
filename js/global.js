$(document).ready(
    function () {
        init();
    }
);

function init() {
    $("#submitSignUp").on("click", signup_validation);
    $("#submitForgetPassword").on("click", newpassword_validation);
    $('#submitUpdate').on("click", update_validation);
    
    jQuery.fn.preventDoubleSubmission = function() {
        $(this).on('submit',function(e){
          var $form = $(this);
      
          if ($form.data('submitted') === true) {
            // Previously submitted - don't submit again
            e.preventDefault();
          } else {
            // Mark it so that the next submit can be ignored
            $form.data('submitted', true);
          }
        });
        // Keep chainability
        return this;
      };

}
