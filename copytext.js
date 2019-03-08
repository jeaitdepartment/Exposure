$(document).ready(function() {
  $(".checkbox1").on("change", function() {
    var $this = $(this).parent().parent();
    if (this.checked) {

      $this.find('.pdcc').val($this.find('.si2').val())

    } else {
      $this.find('.pdcc').val('');
      $this.find('.pdcc').attr("placeholder", "0");

    }

  });

});