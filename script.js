function showToast(message,status) {
    // Create a toast element and append it to the body
    var toast = $('<div class="toast">' + message + '</div>');
    if(status=='success'){
      toast.addClass('success');
    }else{
      toast.addClass('error');
    }
 
    $('body').append(toast);
    toast.fadeIn(400).delay(2000).fadeOut(400, function() {
        // After fading out, remove the toast from the DOM
        $(this).remove();
    });
    
    return; 
 }