      $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'php/email.php',
            data: $('form').serialize(),
            success: function () {
              alert('Your email address has been added. Thank you!');
              $(':input').val('');
            }
          });

        });

      });