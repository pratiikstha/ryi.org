<?php
  //$Id: likes_display.tpl.php,v 1.5.4.3.2.1 2010/06/23 07:55:43 prajwala Exp $
?>
  <div class="user_likes">
<?php

 if($user_likes){
?>
   <span class="youlike">
   <span class="youlikestring">You like this </span>
   <?php  	if( variable_get('stream_post_likes', 0)) { ?>   
     <a href="#" name = 'Unlike' post_id="<?php echo $post_id; ?>" >Unlike</a>
	 <?php } ?>
   </span>
<?php
 }
 else {
?>
   <span class="youlike">
   <span class="youlikestring"></span>
   <?php  	if( variable_get('stream_post_likes', 0)) { ?>
   <a href="#" name = 'Like it' post_id="<?php echo $post_id; ?>" >Like it</a>
   <?php } ?>
   </span>
<?php
 }
?>
  </div>
  <ul class = "post_liked_friends">
<?php
  foreach ($friends as $friend) {
    $user_info = call_facebook_api('users.getInfo', array('uids' => $friend, 'fields' => 'name, pic_square, profile_url'));
    $user_info = $user_info[0];
?>
    <li>
      <span class = "square"><img src = "<?php echo $user_info['pic_square'];?>" /></span>
      <strong><a href = "<?php echo $user_info['profile_url']; ?>"><?php echo $user_info['name']; ?></a></strong>
    </li>
<?php
  }
?>
</ul>
