<? ob_start(); ?>

<script type="text/javascript">
/**
 * This is the example
 * JQuery script who want to
 * refresh the captcha image with
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

<? view_var('head', ob_get_clean()); ?>

<tbody>
<tr>
<td><?php echo form_label('Security Image'); ?></td>
<td>
    <div style="float:left;padding-right: 10px;" id="captcha_image"><?php echo $cap['image'];?></div>
    <div style="font-size:10px;"><a href="javascript:void(0);" onclick="refresh_captcha();">Refresh Image</a></div>
</td>
</tr>

<tr>
<td></td>
<td><font size="1">Please enter above the numbers to below the field.</font></td>
</tr>

<tr>
<td></td>
<td>
    <? echo form_error('captcha_answer', '<div class="input-error">', '</div>'); ?>
    <? echo form_input('captcha_answer', '', ' maxlength="5" id="captcha_answer"  '); ?>
</td>
</tr>
</tbody>