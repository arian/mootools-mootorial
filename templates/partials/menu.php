<ul>
<?php foreach($mootorial->menuitems as $menuitem): ?>
	<li>
		<a href="<?php echo $HTML->url($menuitem->url); ?>"><?php echo $menuitem->name; ?></a>
		<ul>
		<?php foreach($menuitem->children as $childitem): if (strpos($childitem, '00.') === false):
			$name = trim(str_replace(".md", "", substr($childitem, 3)));
			$anchor = strtolower(str_replace(" ", "-", $name));
			?>
			<li><a href="<?php echo $HTML->url($menuitem->url); ?>#<?php echo $anchor; ?>"><?php echo $name; ?></a></li>
		<?php endif; endforeach; ?>
		</ul>
	</li>
<?php endforeach; ?>
</ul>
