<script type="text/javascript">
/**
 * This is the example
 * JQuery script who want to
 * refresh the captcha image using
 * an ajax request.
 */
function refresh_captcha()
{
    $.get("<?=site_url('/captcha/create.json')?>", function(data){

      if(data.image != '')
      {
          $('#captcha_image').html(data.image);
      }

    }, 'json');

}
</script>