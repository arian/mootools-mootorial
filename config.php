<?php

return array(

	// Usually this would be in the database

	'pages' => array(
		// slug => array()
		'introduction' => array(
			'name' => 'Introduction',
			'filename' => '00-introduction/00-introduction.md',

			'children' => array(
				'learning-javascript' => array(
					'name' => 'Learning JavaScript',
					'filename' => '00-introduction/01-learning-javascript.md'
				),
				'downloading-mootools' => array(
					'name' => 'Downloading MooTools',
					'filename' => '00-introduction/02-downloading-mootools.md'
				),
				'adding-mootools-to-your-page' => array(
					'name' => 'Adding MooTools to your page',
					'filename' => '00-introduction/03-adding-mootools-to-your-pages.md'
				),
				'writing-your-code' => array(
					'name' => 'Writing your code!',
					'filename' => '00-introduction/04-write-your-code.md'
				),
			)
		),

		'core' => array(
			'name' => 'Core',
			'filename' => '01-core/00-core.md'
		),

		'class' => array(
			'name' => 'Class',
			'filename' => '02-class/00-class.md'
		),

		'fx' => array(
			'name' => 'Fx',
			'filename' => '06-fx/00-fx.md',

			'children' => array(
				'fx.tween' => array(
					'name' => 'Fx.Tween',
					'filename' => '06-fx/01-fx.tween.md'
				)
			)
		)
		
	)

);

