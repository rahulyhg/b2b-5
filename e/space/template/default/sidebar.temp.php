<div id="sidebar">            
<dl class="navi">
<dt>Hot Product</dt>
<dd>
	<ul>
		<script src="<?=$public_r['newsurl']?>/d/js/js/hotplnews.js"></script>
	</ul>
</dd>
</dl>

<dl class="com_card" id="card_body">
<dt><a href="javascript:toggle_card()">Company Card</a></dt>
<dd class="mbody" style="display:block;">
<ul>
<li class="name"><?=$addur['company']?></li>
<li class="user"><?=$addur['truename']?></li>
<li class="address"><?=$addur['address']?></li>
<li class="tel"><?=$addur['phone']?></li>
<li class="mobile"><?=$addur['fax']?></li>
</ul>
</dd>
</dl>
<dl class="other_products" id="other_products">
<dd class="mbtm"></dd>
</dl>
</div>