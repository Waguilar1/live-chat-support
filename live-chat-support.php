<?php 
function add_intercom() {
  if ( is_user_logged_in() )  {
	  global $current_user;
    get_currentuserinfo();
		
?>
    <script id="IntercomSettingsScriptTag">
    window.intercomSettings = {
      user_hash: "<?php echo hash_hmac("sha256", $current_user->user_login, "your_shared_secret_key_here"); ?>",
      email: "<?php echo $current_user->user_email; ?>",
    	user_id: "<?php echo $current_user->user_login; ?>",
      created_at: <?php echo strtotime($current_user->user_registered); ?>,
      app_id: "your_app_id_in_here"
    };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}};})()</script>
<?php
    }
}
add_action('wp_footer', 'add_intercom');
?>
