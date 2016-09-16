$('#file').bind('change', function() {
    if (this.files[0].size > 5120) {
      alert(' Error: Maximum of 5KB is allowed. \n This file size is: ' + this.files[0].size/1024 + "KB");
      $('input[type="submit"]').prop('disabled', true);
      $('input[type="submit"]').attr('class', 'btn form-button-disabled');
    }
    else {
      $('input[type="submit"]').prop('disabled', false);
      $('input[type="submit"]').attr('class', 'btn form-button');
    }
});