<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

/**
 * Mobile master view. Displays a simplified HTML template with a header and footer.
 *
 * @package esoTalk
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='<?php echo T("charset", "utf-8"); ?>'>
<title><?php echo $data["pageTitle"]; ?></title>
<?php echo $data["head"]; ?>
<script>
// Turn off JS effects and fixed positions, and disable tooltips.
jQuery.fx.off = true;
ET.disableFixedPositions = true;
$.fn.tooltip = function() { return this; };
// Make the user menu into a popup, and take notifications out of the user menu.
$(function() {
	$("#forumTitle").before($("#userMenu").popup({alignment: "right"}));
	$("#forumTitle").before($("#notifications").parent());
});
</script>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?7ddc0971db7dd4fc3a765588766200ce";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
</head>

<body class='<?php echo $data["bodyClass"]; ?>'>
<?php $this->trigger("pageStart"); ?>

<div id='messages'>
<?php foreach ($data["messages"] as $message): ?>
<div class='messageWrapper'>
<div class='message <?php echo $message["className"]; ?>' data-id='<?php echo @$message["id"]; ?>'><?php echo $message["message"]; ?></div>
</div>
<?php endforeach; ?>
</div>

<div id='wrapper'>

<!-- HEADER -->
<div id='hdr'>
<div id='hdr-content'>

<?php if ($data["backButton"]): ?>
<a href='<?php echo $data["backButton"]["url"]; ?>' class='button' id='backButton'>&laquo; 返回</a>
<?php endif; ?>

<ul id='userMenu' class='menu'>
<?php echo $data["userMenuItems"]; ?>
<li><a href='<?php echo URL("conversation/start"); ?>' class='link-newConversation'>发布话题</a></li>
</ul>

<h1 id='forumTitle'><a href='<?php echo URL(""); ?>'><?php echo C("esoTalk.forumTitle"); ?></a></h1>

</div>
</div>

<!-- BODY -->
<div id='body'>
<div id='body-content'>
<?php echo $data["content"]; ?>
</div>
</div>

<!-- FOOTER -->
<div id='ftr'>
<div id='ftr-content'>
<ul class='menu'>
<?php echo $data["metaMenuItems"]; ?>
</ul>
</div>
</div>
<?php $this->trigger("pageEnd"); ?>

</div>

</body>
</html>