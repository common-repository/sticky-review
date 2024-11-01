<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.

$prefix = '_b_sticky_review';

CSF::createOptions( $prefix, array(
	'menu_title'		=> 'Sticky Review',
	'menu_slug'			=> 'sticky-review',
	'framework_title'	=> 'Sticky Review Options',
	'menu_position'		=> 20,
	'menu_icon'			=> 'dashicons-star-filled',
	'theme'				=> 'light',
	'footer_credit'		=> 'If you like <strong>Sticky Review</strong> please leave us a <a href="https://wordpress.org/support/plugin/sticky-reviews/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a> rating. Your Review is very important to us as it helps us to grow more.'
) );


CSF::createSection( $prefix, array(
	'title'		=> 'Sticky Review Settings',
	'icon'		=> 'fas fa-user-cog',
	'fields'	=> array(
		// A Heading
		array(
			'type'		=> 'subheading',
			'content'	=> 'General'
		),
		array(
			'id'		=> 'sr_review_position',
			'type'		=> 'radio',
			'title'		=> __('Sticky Review Positions','sticky-review'),
			'desc'		=> __('Choose position to Show Sticky Review.','sticky-review'),
			'default'	=> 'right',
			'options'	=> array(
				'left'	=> 'Left Bottom',
				'right'	=> 'Right Bottom'
			)
		),
		array(
			'id'		=> 'sr_review_bg',
			'type'		=> 'color',
			'title'		=> __('Background Color','sticky-review'),
			'desc'		=> __('Choose Reviews slider Background color','sticky-review'),
			'default'	=> '#fff'
		),
		array(
			'id'		=> 'sr_text_color',
			'type'		=> 'color',
			'title'		=> __('Font/Text Color', 'sticky-review'),
			'desc'		=> __('Choose Reviews slider Font/Text color', 'sticky-review'),
			'default'	=> '#333'
		),
		array(
			'id'			=> 'sr_review_page',
			'type'			=> 'link',
			'title'			=> __('Reviews Page Link', 'sticky-review'),
			'desc'			=> __('Paste Reviews Page Link Where all Reviews are', 'sticky-review'),
			'placeholder'	=> 'All Reviews Page Link here',
			'default'		=> ''
		),
		array(
			'id'		=> 'sr_btn_link_color',
			'title'		=> __('Page Link Color', 'sticky-review'),
			'desc'		=> __('Choose Link color', 'sticky-review'),
			'type'		=> 'color',
			'default'	=> '#333'
		),
		array(
			'id'		=> 'sr_btn_link_hover',
			'title'		=> __('Page Link Hover Color', 'sticky-review'),
			'desc'		=> __('Choose Link color', 'sticky-review'),
			'type'		=> 'color',
			'default'	=> '#55d4be'
		),

		// Left Options
		array(
			'type'		=> 'subheading',
			'content'	=> 'Left Content'
		),
		array(
			'id'		=> 'sr_img',
			'title'		=> __('Product or Site Logo', 'sticky-review'),
			'subtitle'	=> __('Use your site or product logo/image', 'sticky-review'),
			'desc'		=> __('Upload Image','sticky-review'),
			'type'		=> 'upload',
			'default'	=> ''
		),
		array(
			'id'		=> 'sr_title',
			'title'		=> __('Product Name or Title', 'sticky-review'),
			'desc'		=> __('Input product Name or Title here', 'sticky-review'),
			'type'		=> 'text',
			'default'	=> ''
		),

		// Right Options
		array(
			'type'		=> 'subheading',
			'content'	=> 'Right Content'
		),
		array(
			'id'			=> 'sr_reviews',
			'title'			=> __('Reviews', 'sticky-review'),
			'button_title'	=> __('Add New Review', 'sticky-review'),
			'type'			=> 'group',
			'fields'		=> array(
				array(
					'id'			=> 'sr_name',
					'title'			=> __('Reviewer Name', 'sticky-review'),
					'type'			=> 'text',
					'placeholder'	=> 'Input Reviewer Name here',
					'default'		=> 'Jhone Doe'
				),
				array(
					'id'			=> 'sr_text',
					'type'			=> 'textarea',
					'title'			=> __('Review Text', 'sticky-review'),
					'placeholder'	=> __('Input your Review Text here', 'sticky-review'),
					'default'		=> __('Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, debitis.', 'sticky-review')
				),
				array(
					'id'		=> 'sr_ratings',
					'type'		=> 'button_set',
					'title'		=> __('Ratings', 'sticky-review'),
					'multiple'	=> false,
					'options'	=> array(
						'1'	=> '*',
						'2'	=> '**',
						'3'	=> '***',
						'4'	=> '****',
						'5'	=> '*****',
					),
					'default'	=> array( '5' )
				)
			)
		)
	)
) );