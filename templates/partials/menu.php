<ul>
<?php foreach($pages as $slug => $page): ?>
	<li>
		<a href="<?php echo $HTML->url($slug); ?>"><?php echo $page['name']; ?></a>
		<ul>
		<?php if (!empty($page['children'])): foreach($page['children'] as $child_slug => $child): ?>
			<li><a href="<?php echo $HTML->url($slug . '/' . $child_slug); ?>"><?php echo $child['name']; ?></a></li>
		<?php endforeach; endif; ?>
		</ul>
	</li>
<?php endforeach; ?>
</ul>
