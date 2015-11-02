<?php
require_once "lib/db.php";
?>
<style>
.styled-select select {
   background:#445544;
   width: 254px;
   padding: 3px;
   font-size: 10px;
   font-weight: bold;
   font-color: #000000;
   font-family: verdana;
   border: 2px solid #ccc;
   height: 28px;
}
button::-moz-focus-inner,
input[type="reset"]::-moz-focus-inner,
input[type="button"]::-moz-focus-inner,
input[type="submit"]::-moz-focus-inner,
input[type="file"] > input[type="button"]::-moz-focus-inner {
  border: none; }

.button {
  display: inline-block;
  padding: 0.5em 2em 0.55em;
  outline: none;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  -webkit-border-radius: .5em;
  -moz-border-radius: .5em;
  border-radius: .5em;
  border: solid 1px #cccccc;
  -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);
  border: solid 1px #d02020;
  background-color: #dd2222;
  background: -webkit-gradient(linear, left top, left bottom, from(#e65b5b), to(#dd2222));
  background: -moz-linear-gradient(top, #e65b5b, #dd2222);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e65b5b', endColorstr='#dd2222');
  color: #fbe8e8; }
  .button:hover {
    text-decoration: none; }
  .button:active {
    position: relative;
    top: 1px; }
  .button:hover {
    background-color: #c71f1f;
    background: -webkit-gradient(linear, left top, left bottom, from(#e44e4e), to(#c71f1f));
    background: -moz-linear-gradient(top, #e44e4e, #c71f1f);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e44e4e', endColorstr='#c71f1f'); }
  .button:active {
    background-color: #e44e4e;
    background: -webkit-gradient(linear, left top, left bottom, from(#dd2222), to(#e44e4e));
    background: -moz-linear-gradient(top, #dd2222, #e44e4e);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#dd2222', endColorstr='#e44e4e');
    color: #f4bcbc; }
.amit_sel { border: 1px solid #000; font-size: 14px; color: #fff; background: #444; padding: 5px; }
</style>
<script>
function amit()
{
var search = document.getElementById('search').value;
var id = document.getElementById('search_id').value;
var sel = document.getElementById('sel').value;
if((search == "Search:" || sel == 0))
alert('Please enter a search term and select a search type');
else
window.location.href="search_pro.php?search="+search+"&sel="+sel+"&id="+id;
}
</script>
<div id="secondary" class="login-page">
<a href="javascript:;" class="pageslide-close" id="close-button"><img src="image/theme/close.png" width="24" height="24" /></a>
    <h2>Tap-N-Tune Search Page</h2>
    <p>Search according to band name, artist name, song title and video title.</p>
    <form action="search_pro.php" method="POST">
    <fieldset><input name="search" id='search' type="text" value="Search:" onfocus="if(this.value=='Search:')this.value='';" onblur=	"if(this.value=='')this.value='Search:';"/></fieldset>  
	 <input type="hidden" name="search_id" id="search_id" value="tnt_search_<?php echo rand(15662,34555)?>"/>
	 <div class="styled-select">
	<select name="sel" id="sel" class='amit_sel'>
	<option value="0">--- Select Search Type ---</option>
	 <option value="1">Band Name</option>
	 <option value="2">Audio Title</option>
	 <option value="3">Video Title</option>
	 <!--option value="4">Genre</option-->
	 <option value="5">Artist Name</option>
	 <option value="6">Location</option>
	 </select> </div><div></div><br/>
	 <fieldset><input type="submit" value="Search" class="button" onclick="amit();"/> </fieldset>
    </form>
</div>