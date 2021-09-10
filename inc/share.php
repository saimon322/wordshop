<?php
function share_tmpl() { ?>
  	<!-- <a href="http://connect.mail.ru/share?url=URL&title=TITLE&description=DESC&imageurl=IMG_PATH" target="_blank" onclick="return Share.me(this);">{шарь меня правильно}</a> -->
	<div class="share__list">
		<a href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=TITLE&p%5Bsummary%5D=DESC&p%5Burl%5D=URL&p%5Bimages%5D%5B0%5D=IMG_PATH" class="share__link" target="_blank" onclick="return Share.me(this);"><div class="share__icon share__icon--f"></div></a>

		<a href="http://vk.com/share.php?url=URL&title=TITLE&description=DESC&image=IMG_PATH&noparse=true" class="share__link" target="_blank" onclick="return Share.me(this);"><div class="share__icon share__icon--vk"></div></a>

		<a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st.comments=DESC&st._surl=URL" class="share__link" target="_blank" onclick="return Share.me(this);"><div class="share__icon share__icon--ok"></div></a>

  		<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text=TITLE&url=URL" class="share__link" target="_blank" onclick="return Share.me(this)"><div class="share__icon share__icon--tw"></div></a>
	</div>
<?php } ?>