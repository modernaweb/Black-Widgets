<?php
namespace Elementor;
namespace BLACK_WIDGETS_Modernaweb\Includes\Widgets;
namespace Black_Widgets;

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    exit;
}

use Elementor\Plugin;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Color;
use Elementor\Core\Schemes\Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Color;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;

/**
 * Elementor title Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BLACK_WIDGETS_Typography extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve button widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'b_typography';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve button widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Black Typography', 'blackwidgets' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve button widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-editor-bold';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the button widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'black_widgets' ];
	}

	/**
	 * Register button widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		// Start
		// Content section
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Select type of the typography you want
		$this->add_control(
			'widget_type',
			[
				'label' => __( 'Select Type', 'blackwidgets' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'bw-t-1',
				'options' => [
					'bw-t-1' 	=> __( 'Simple', 'blackwidgets' ),
					'bw-t-2' 	=> __( 'With Shapes', 'blackwidgets' ),
					'bw-t-3' 	=> __( 'Repetitive', 'blackwidgets' ),
				],
			]
		);

		// Type title
		$this->add_control(
			'widget_title',
			[
				'label' => __( 'Title', 'blackwidgets' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Black Widget Title', 'blackwidgets' ),
				'placeholder' => __( 'Type your title here', 'blackwidgets' ),
				'description' => __( 'You can use all other HTML tags into the title field e.g. code, mark, abbr, blockquote and  ...', 'blackwidgets' ),
			]
		);

        // With Shape 
		// Select type of the typography you want
		$this->add_control(
			'widget_type_2',
			[
				'label' => __( 'Select Type', 'blackwidgets' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-x-1',
				'options' => [
					'style-x-1' 	=> __( 'Style 1', 'blackwidgets' ),
					'style-x-2' 	=> __( 'Style 2', 'blackwidgets' ),
					'style-x-3' 	=> __( 'Style 3', 'blackwidgets' ),
					'style-x-4' 	=> __( 'Style 4', 'blackwidgets' ),
					'style-x-5' 	=> __( 'Style 5', 'blackwidgets' ),
					'style-x-6' 	=> __( 'Style 6', 'blackwidgets' ),
					'custom-style' 	=> __( 'Custom Style', 'blackwidgets' ),
				],
				'condition'  => [
					'widget_type' => [
						'bw-t-2',
					],
				],
			]
		);

        // Style Subtitle Tabs
        $this->start_controls_tabs('tabx');
        $this->start_controls_tab(
            'tab_style_1',
            [
                'label' => __( 'Left or Top', 'blackwidgets' ),
				'condition'  => [
					'widget_type_2' => [
						'custom-style',
					],
				],
            ]
        );

            $this->add_control(
                'tab_style_1_type',
                [
                    'label' => __( 'How exactly does it work?', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'enable_icon',
                    'options' => [
                        'enable_icon'       => __( 'With ICON', 'blackwidgets' ),
                        'enable_image'      => __( 'With IMAGE or SVG', 'blackwidgets' ),
                        'enable_code'       => __( 'With SVG Code', 'blackwidgets' ),
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'widget_1_alignment',
                [
                    'label'     => __( 'Text Alignment', 'blackwidgets' ),
                    'type'      => \Elementor\Controls_Manager::CHOOSE,
                    'options'   => [
                        'left-right'   => [
                            'title' => __( 'Left', 'blackwidgets' ),
                            'icon'  => 'eicon-arrow-left',
                        ],
                        'top-bottom' => [
                            'title' => __( 'Top', 'blackwidgets' ),
                            'icon'  => 'eicon-arrow-up',
                        ],
                    ],
                    'default'   => 'left-right',
                    'toggle'    => true,
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_1_code',
                [
                    'label' => __( 'CODE', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'SVG CODE HERE', 'blackwidgets' ),
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_1_type' => [
                            'enable_code',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_1_icon',
                [
                    'label' => __( 'Choose Icon', 'blackwidgets' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon eicon-nerd',
                        'library' => 'elementor',
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_1_type' => [
                            'enable_icon',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_1_image',
                [
                    'label' => __( 'Choose Image', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_1_type' => [
                            'enable_image',
                        ],
                    ],
                ]
            );

        $this->end_controls_tab();
        $this->start_controls_tab(
            'tab_style_2',
            [
                'label' => __( 'Right or Bottom', 'bw' ),
				'condition'  => [
                    'widget_type_2' => [
                        'custom-style',
                    ],
				],
            ]
        );

            $this->add_control(
                'tab_style_2_type',
                [
                    'label' => __( 'How exactly does it work?', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'enable_icon',
                    'options' => [
                        'enable_icon'       => __( 'With ICON', 'blackwidgets' ),
                        'enable_image'      => __( 'With IMAGE or SVG', 'blackwidgets' ),
                        'enable_code'       => __( 'With SVG Code', 'blackwidgets' ),
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                    ],
                ]
            );

            $this->add_responsive_control(
                'widget_2_alignment',
                [
                    'label'     => __( 'Text Alignment', 'blackwidgets' ),
                    'type'      => \Elementor\Controls_Manager::CHOOSE,
                    'options'   => [
                        'left-right'   => [
                            'title' => __( 'Right', 'blackwidgets' ),
                            'icon'  => 'eicon-arrow-right',
                        ],
                        'top-bottom' => [
                            'title' => __( 'Bottom', 'blackwidgets' ),
                            'icon'  => 'eicon-arrow-down',
                        ],
                    ],
                    'default'   => 'left-right',
                    'toggle'    => true,
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_2_code',
                [
                    'label' => __( 'CODE', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'SVG CODE HERE', 'blackwidgets' ),
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_2_type' => [
                            'enable_code',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_2_icon',
                [
                    'label' => __( 'Choose Icon', 'blackwidgets' ),
                    'type' => Controls_Manager::ICONS,
                    'default' => [
                        'value' => 'eicon eicon-nerd',
                        'library' => 'elementor',
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_2_type' => [
                            'enable_icon',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'tab_style_2_image',
                [
                    'label' => __( 'Choose Image', 'blackwidgets' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                    'condition'  => [
                        'widget_type_2' => [
                            'custom-style',
                        ],
                        'tab_style_2_type' => [
                            'enable_image',
                        ],
                    ],
                ]
            );

        $this->end_controls_tab();
        $this->end_controls_tabs(); // End Tabs

        $this->add_control(
            'repetitive_repeat',
            [
                'label' => __( 'How many repeat you need?', 'blackwidgets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '7',
                'options' => [
                    '1'     => __( '1', 'blackwidgets' ),
                    '2'     => __( '2', 'blackwidgets' ),
                    '3'     => __( '3', 'blackwidgets' ),
                    '4'     => __( '4', 'blackwidgets' ),
                    '5'     => __( '5', 'blackwidgets' ),
                    '6'     => __( '6', 'blackwidgets' ),
                    '7'     => __( '7', 'blackwidgets' ),
                    '8'     => __( '8', 'blackwidgets' ),
                    '9'     => __( '9', 'blackwidgets' ),
                    '10'    => __( '10', 'blackwidgets' ),
                    '11'    => __( '11', 'blackwidgets' ),
                    '12'    => __( '12', 'blackwidgets' ),
                    '13'    => __( '13', 'blackwidgets' ),
                    '14'    => __( '14', 'blackwidgets' ),
                    '15'    => __( '15', 'blackwidgets' ),
                    '16'    => __( '16', 'blackwidgets' ),
                ],
				'condition'  => [
					'widget_type' => [
						'bw-t-3',
					],
				],
            ]
        );

        $this->add_control(
            'repetitive_repeat_other_style',
            [
                'label' => __( 'Set Other Style for which repeat?', 'blackwidgets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '4',
                'options' => [
                    '1'     => __( '1', 'blackwidgets' ),
                    '2'     => __( '2', 'blackwidgets' ),
                    '3'     => __( '3', 'blackwidgets' ),
                    '4'     => __( '4', 'blackwidgets' ),
                    '5'     => __( '5', 'blackwidgets' ),
                    '6'     => __( '6', 'blackwidgets' ),
                    '7'     => __( '7', 'blackwidgets' ),
                    '8'     => __( '8', 'blackwidgets' ),
                    '9'     => __( '9', 'blackwidgets' ),
                    '10'    => __( '10', 'blackwidgets' ),
                    '11'    => __( '11', 'blackwidgets' ),
                    '12'    => __( '12', 'blackwidgets' ),
                    '13'    => __( '13', 'blackwidgets' ),
                    '14'    => __( '14', 'blackwidgets' ),
                    '15'    => __( '15', 'blackwidgets' ),
                    '16'    => __( '16', 'blackwidgets' ),
                ],
				'condition'  => [
					'widget_type' => [
						'bw-t-3',
					],
				],
            ]
        );

		$this->add_responsive_control(
			'widget_alignment',
			[
				'label'     => __( 'Text Alignment', 'blackwidgets' ),
				'type'      => \Elementor\Controls_Manager::CHOOSE,
				'options'   => [
					'left'   => [
						'title' => __( 'Left', 'blackwidgets' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'blackwidgets' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => __( 'Right', 'blackwidgets' ),
						'icon'  => 'fa fa-align-right',
					],
				],
				'default'   => 'center',
				'toggle'    => true,
				'condition'  => [
                    'widget_type_2!' => [
                        'custom-style',
                    ],
				],
			]
		);

		// Vertical Title
		$this->add_responsive_control(
			'vertical_title_option',
			[
				'label' 		=> __( 'Vertical Title', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'blackwidgets' ),
				'label_off' 	=> __( 'Disable', 'blackwidgets' ),
				'return_value' 	=> 'vertical_mode',
				'default' 		=> 'off',
			]
		);

        $this->add_control(
            'vertical_title_display',
            [
                'label' => __( 'Reset Wrapper:', 'blackwidgets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'block',
                'options' => [
                    'block'     => __( 'Block', 'blackwidgets' ),
                    'unset'     => __( 'unset', 'blackwidgets' ),
                ],
				'condition'  => [
					'vertical_title_option' => [
						'vertical_mode',
					],
				],
            ]
        );

        $this->add_control(
            'vertical_rotation',
            [
                'label' => __( 'Reset Wrapper:', 'blackwidgets' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'bw-rotation-1',
                'options' => [
                    'bw-rotation-1'     => __( '-180deg', 'blackwidgets' ),
                    'bw-rotation-2'     => __( '-90deg', 'blackwidgets' ),
                    'bw-rotation-3'     => __( '-45deg', 'blackwidgets' ),
                    'bw-rotation-4'     => __( '0', 'blackwidgets' ),
                    'bw-rotation-5'     => __( '45deg', 'blackwidgets' ),
                    'bw-rotation-6'     => __( '90deg', 'blackwidgets' ),
                    'bw-rotation-7'     => __( '180deg', 'blackwidgets' ),
                ],
				'condition'  => [
					'vertical_title_option' => [
						'vertical_mode',
					],
				],
            ]
        );

		$this->end_controls_section();
		// End

		// Start
		// Content section
		$this->start_controls_section(
			'overlay_section',
			[
				'label' => __( 'Overlay', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Enable Title Section
		$this->add_responsive_control(
			'overlay_section_enable',
			[
				'label' 		=> __( 'Do you need overlay?', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'blackwidgets' ),
				'label_off' 	=> __( 'No !', 'blackwidgets' ),
				'return_value' 	=> 'overlay_enable',
				// 'default' 		=> 'false',
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widget_overlay_background',
				'label' => __( 'Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bw-typograpgy .bw-overlay',
				'fields_options' => [
					'size' => ['default' => 'cover'],
					'position' => ['default' => 'center center'],
					'repeat' => ['default' => 'no-repeat'],
				],
				'condition'  => [
					'overlay_section_enable' => [
						'overlay_enable',
					],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'widget_overlay_background_css_filter',
				'selector' => 
					'{{WRAPPER}} .bw-typograpgy .bw-overlay'
			]
		);

		$this->add_responsive_control(
			'widget_icon_opacity',
			[
				'label' => __( 'Opacity', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy .bw-overlay' => 'opacity: {{SIZE}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'widget_icon_backdrop_filter',
			[
				'label' => __( 'Backdrop Filter Blur', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 2,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy .bw-overlay' => 'backdrop-filter: blur( {{SIZE}}{{UNIT}} ) !important;',
				],
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'widget_overlay_typography_title_border',
				'label' => __( 'Title Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy .bw-overlay',
			]
		);

		// Border Radius
		$this->add_responsive_control(
			'widget_overlay_typography_title_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy .bw-overlay' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End

		// Start
		// Style section
		$this->start_controls_section(
			'style_section',
			[
				'label' => __( 'Box Style', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Style Subtitle Tabs
		$this->start_controls_tabs('black_widget_1_tab');
		$this->start_controls_tab(
			'tab_1_normal',
			[
				'label' => __( 'Normal', 'blackwidgets' ),
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widget_box_background',
				'label' => __( 'Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bw-typograpgy',
			]
		);

		$this->add_control(
			'hr1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'widget_box_margin',
			[
				'label' => __( 'Margin', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'widget_box_padding',
			[
				'label' => __( 'Padding', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'widget_box_border',
				'label' => __( 'Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy',
			]
		);

		// Box shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'widget_box_box_shadow',
				'label' => __( 'Box Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy',
			]
		);

		$this->add_responsive_control(
			'widget_box_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->start_controls_tab(
			'tab_1_hover',
			[
				'label' => __( 'Hover', 'blackwidgets' ),
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widget_hover_box_background',
				'label' => __( 'Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient', ],
				'selector' => '{{WRAPPER}} .bw-typograpgy:hover',
			]
		);

		$this->add_control(
			'hr3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'widget_hover_box_margin',
			[
				'label' => __( 'Margin', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy:hover' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'widget_hover_box_padding',
			[
				'label' => __( 'Padding', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'widget_hover_box_border',
				'label' => __( 'Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy:hover',
			]
		);

		// Box shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'widget_hover_box_box_shadow',
				'label' => __( 'Box Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy:hover',
			]
		);

		$this->add_responsive_control(
			'widget_hover_box_border_radius',
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();
		$this->end_controls_tabs(); // End Tabs

		$this->end_controls_section();
        // End

		// Start
		// Style section
		$this->start_controls_section(
			'typography1_section',
			[
				'label' => __( 'Title Typography', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'widget_title_solid_color',
			[
				'label' => __( 'Title Color', 'blackwidgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography1',
				'label' => __( 'Typography', 'blackwidgets' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow1',
				'label' => __( 'Text Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive',
			]
		);

		$this->add_control(
			'hr5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widget_typography_title_background',
				'label' => __( 'Title Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive',
			]
		);

		$this->add_control(
			'hr6',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'widget_typography_title_margin',
			[
				'label' => __( 'Title Margin', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'widget_typography_title_padding',
			[
				'label' => __( 'Title Padding', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr7',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'widget_typography_title_border',
				'label' => __( 'Title Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive',
			]
		);

		// Border Radius
		$this->add_responsive_control(
			'widget_typography_title_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		// Box shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'widget_typography_title_box_shadow',
				'label' => __( 'Title Box Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive',
			]
		);

		$this->add_control(
			'z_index_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'z_index',
			[
				'label' => __( 'Z-Index', 'blackwidgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -99999,
				'max' => 999999,
				'step' => 9,
				'description' => __( 'If you using the 2D / 3D style, so z-index will be disabled.', 'blackwidgets' ),
			]
		);

		$this->add_control(
			'stroke1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Enable Title Section
		$this->add_control(
			'widget_stroke_title_enable',
			[
				'label' 		=> __( 'Text Stroke', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'blackwidgets' ),
				'label_off' 	=> __( 'No !', 'blackwidgets' ),
				'return_value' 	=> 'stroke_enable',
				// 'default' 		=> 'false',
			]
		);

		$this->add_control(
			'widget_stroke_stroke_color',
			[
				'label' => __( 'Text Stroke Color', 'blackwidgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => '-webkit-text-stroke-color: {{VALUE}}',
				],
				'condition'  => [
					'widget_stroke_title_enable' => [
						'stroke_enable',
					],
				],
			]
		);

		$this->add_responsive_control(
			'widget_stroke_stroke_width',
			[
				'label' => __( 'Text Stroke Size', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-bw-t-2-text, {{WRAPPER}} .bw-typograpgy-main-title, {{WRAPPER}}  .bw-typograpgy-repetitive' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}} !important;',
				],
				'condition'  => [
					'widget_stroke_title_enable' => [
						'stroke_enable',
					],
				],
			]
		);

		$this->end_controls_section();
		// End

		// Start
		// Style section
		$this->start_controls_section(
			'unique_typography1_section',
			[
				'label' => __( 'Unique Title Typography', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition'  => [
					'widget_type' => [
						'bw-t-3',
					],
				],
			]
		);

		// Color
		$this->add_control(
			'unique_widget_title_solid_color',
			[
				'label' => __( 'Title Color', 'blackwidgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}',
				],
			]
		);

		// Typography
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'unique_content_typography1',
				'label' => __( 'Typography', 'blackwidgets' ),
				'scheme' => Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique',
			]
		);

		// Text shadow
		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'unique_text_shadow1',
				'label' => __( 'Text Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique',
			]
		);

		$this->add_control(
			'hr8',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'unique_widget_typography_title_background',
				'label' => __( 'Title Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique',
			]
		);

		$this->add_control(
			'hr9',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Margin
		$this->add_responsive_control(
			'unique_widget_typography_title_margin',
			[
				'label' => __( 'Title Margin', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Padding
		$this->add_responsive_control(
			'unique_widget_typography_title_padding',
			[
				'label' => __( 'Title Padding', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hr10',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'unique_widget_typography_title_border',
				'label' => __( 'Title Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique',
			]
		);

		// Border Radius
		$this->add_responsive_control(
			'unique_widget_typography_title_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);	

		// Box shadow
		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'unique_widget_typography_title_box_shadow',
				'label' => __( 'Title Box Shadow', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique',
			]
		);

		$this->add_control(
			'unique_z_index_hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'unique_z_index',
			[
				'label' => __( 'Z-Index', 'blackwidgets' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -99999,
				'max' => 999999,
				'step' => 9,
				'description' => __( 'If you using the 2D / 3D style, so z-index will be disabled.', 'blackwidgets' ),
			]
		);

		$this->add_control(
			'unique_stroke1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		// Enable Title Section
		$this->add_control(
			'unique_widget_stroke_title_enable',
			[
				'label' 		=> __( 'Text Stroke', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Yes', 'blackwidgets' ),
				'label_off' 	=> __( 'No !', 'blackwidgets' ),
				'return_value' 	=> 'stroke_enable',
				// 'default' 		=> 'false',
			]
		);

		// $this->add_control(
		// 	'unique_widget_stroke_fill_color',
		// 	[
		// 		'label' => __( 'Text Stroke Color', 'blackwidgets' ),
		// 		'type' => Controls_Manager::COLOR,
		// 		'scheme' => [
		// 			'type' => Color::get_type(),
		// 			'value' => Color::COLOR_1,
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => '-webkit-text-fill-color: {{VALUE}}',
		// 		],
		// 		'condition'  => [
		// 			'unique_widget_stroke_title_enable' => [
		// 				'stroke_enable',
		// 			],
		// 		],
		// 	]
		// );

		$this->add_control(
			'unique_widget_stroke_stroke_color',
			[
				'label' => __( 'Text Stroke Color', 'blackwidgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => '-webkit-text-stroke-color: {{VALUE}}',
				],
				'condition'  => [
					'unique_widget_stroke_title_enable' => [
						'stroke_enable',
					],
				],
			]
		);

		$this->add_responsive_control(
			'unique_widget_stroke_stroke_width',
			[
				'label' => __( 'Text Stroke Size', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy-repetitive.bw-unique' => '-webkit-text-stroke-width: {{SIZE}}{{UNIT}} !important;',
				],
				'condition'  => [
					'unique_widget_stroke_title_enable' => [
						'stroke_enable',
					],
				],
			]
		);

		$this->end_controls_section();
		// End

		// Start
		// Style section
		$this->start_controls_section(
			'transform_section',
			[
				'label' => __( '2D & 3D Normal Transfrom Style', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Enable Image Movement Animate
		$this->add_control(
			'transform_normal_option',
			[
				'label' 		=> __( 'Transfrom Style', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::SWITCHER,
				'label_on' 		=> __( 'Enable', 'blackwidgets' ),
				'label_off' 	=> __( 'Disable', 'blackwidgets' ),
				'return_value' 	=> 'normal_transform',
				'default' 		=> 'off',
			]
		);

		// Style Subtitle Tabs
		$this->start_controls_tabs('transform_tabs', [
			'condition' 	=> [
				'transform_normal_option' 	=> [
					'normal_transform',
				],
			],
		]);
		$this->start_controls_tab(
			'transform_tab_move',
			[
				'label' => __( 'Move', 'blackwidgets' ),
			]
		);

		// Start normal tab content

		$this->add_responsive_control(
			'move_normal_x',
			[
				'label' => __( 'Move on → X', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 2,
					],
				],
				'default'  => [
					'unit' => 'px',
					'size' => 0,
				],
				'description' => __( 'movement on the diagram X - do not leave empty!', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'move_normal_y',
			[
				'label' => __( 'Move on ↑ Y', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 2,
					],
				],
				'default'  => [
					'unit' => 'px',
					'size' => 0,
				],
				'description' => __( 'movement on the diagram Y - do not leave empty!', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'move_normal_z',
			[
				'label' => __( 'Move on ↙ Z', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 2,
					],
				],
				'default'  => [
					'unit' => 'px',
					'size' => 0,
				],
				'description' => __( 'movement on the diagram Z - do not leave empty!', 'blackwidgets' ),
			]
		);

		// end normal tab content

		$this->end_controls_tab();
		$this->start_controls_tab(
			'transform_tab_scale',
			[
				'label' => __( 'Scale', 'blackwidgets' ),
			]
		);

		// Start hover tab content

		$this->add_responsive_control(
			'scale_normal_x',
			[
				'label' => __( 'Scale on → X', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 1,
				],
				'description' => __( 'set 1.1 to scale on left and right - do not set 0', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'scale_normal_y',
			[
				'label' => __( 'Scale on ↑ Y', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 1,
				],
				'description' => __( 'set 1.1 to scale on top and bottom - do not set 0', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'scale_normal_z',
			[
				'label' => __( 'Scale on ↙ Z', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 1,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 1,
				],
				'description' => __( 'If you want to use scale Z or 3D Scale, you should set perspective size', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'perspective',
			[
				'label' => __( 'Self Perspective ◊', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'ps' ],
				'range' => [
					'px' => [
						'min' => -3000,
						'max' => 3000,
						'step' => 50,
					],
				],
				'default'  => [
					'unit' => 'px',
					'size' => 0,
				],
				'description' => __( 'If you want to use scale Z or 3D Scale, you should set perspective size', 'blackwidgets' ),
			]
		);

		$this->add_responsive_control(
			'perspective_child',
			[
				'label' => __( 'Children Perspective ◊', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'ps' ],
				'range' => [
					'px' => [
						'min' => -3000,
						'max' => 3000,
						'step' => 50,
					],
				],
				'default'  => [
					'unit' => 'px',
					'size' => 0,
				],
				'description' => __( 'If you want to use scale Z or 3D Scale, you should set perspective size', 'blackwidgets' ),
			]
		);

		// end hover tab content

		$this->end_controls_tab();
		$this->start_controls_tab(
			'transform_tab_rotate',
			[
				'label' => __( 'Rotate', 'blackwidgets' ),
			]
		);

		// Start hover tab content

		$this->add_responsive_control(
			'rotate_normal_x',
			[
				'label' => __( 'Rotate on → X', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 5,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 0,
				]
			]
		);

		$this->add_responsive_control(
			'rotate_normal_y',
			[
				'label' => __( 'Rotate on ↑ Y', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 5,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 0,
				]
			]
		);

		$this->add_responsive_control(
			'rotate_normal_z',
			[
				'label' => __( 'Rotate on ↙ Z', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 5,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 0,
				]
			]
		);

		// end hover tab content

		$this->end_controls_tab();
		$this->start_controls_tab(
			'transform_tab_skew',
			[
				'label' => __( 'Skew', 'blackwidgets' ),
			]
		);

		// Start hover tab content

		$this->add_responsive_control(
			'skew_normal_x',
			[
				'label' => __( 'Skew on → X ▱', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 5,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 0,
				]
			]
		);

		$this->add_responsive_control(
			'skew_normal_y',
			[
				'label' => __( 'Skew on ↑ Y ▱', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'px' => [
						'min' => -100,
						'max' => 100,
						'step' => 5,
					],
				],
				'default'  => [
					'unit' => 'deg',
					'size' => 0,
				]
			]
		);

		// end hover tab content

		$this->end_controls_tab();
		$this->end_controls_tabs(); // End Tabs

		$this->end_controls_section();
		// End

		// Start
		// Style section
		$this->start_controls_section(
			'line_section',
			[
				'label' => __( 'Line Styles', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition'  => [
					'widget_type' => [
						'bw-t-2',
					],
					'widget_type_2!' => [
						'custom-style',
					],
				],
			]
		);

		$this->add_responsive_control(
			'widget_line_width',
			[
				'label' => __( 'Line Width', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2' => 'width: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'widget_line_height',
			[
				'label' => __( 'Line Height', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		// Background
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'widget_line_background',
				'label' => __( 'Background', 'blackwidgets' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2',
			]
		);

		$this->add_responsive_control(
			'widget_line_box_margin',
			[
				'label' => __( 'Margin', 'blackwidgets' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'allowed_dimensions' => ['top', 'bottom'],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2' => 'margin: {{TOP}}{{UNIT}} auto {{BOTTOM}}{{UNIT}} auto;',
				],
			]
		);

		// Border
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'widget_line_box_border',
				'label' => __( 'Title Border', 'blackwidgets' ),
				'selector' => '{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2',
			]
		);

		// Border Radius
		$this->add_responsive_control(
			'widget_line_box_border_radius', 
			[
				'label' 		=> __( 'Border Radius', 'blackwidgets' ),
				'type' 			=> \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy.bw-t-2 .line-1, {{WRAPPER}} .bw-typograpgy.bw-t-2 .line-2' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End

		// Start
		// Style section
		$this->start_controls_section(
			'icon_section',
			[
				'label' => __( 'Icon Styles', 'blackwidgets' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition'  => [
					'widget_type' => [
						'bw-t-2',
					],
					'widget_type_2' => [
						'custom-style',
					],
				],
			]
		);

		$this->add_responsive_control(
			'widget_icon_width',
			[
				'label' => __( 'Icon Size', 'blackwidgets' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 20,
						'step' => 1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy .custom-style i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_responsive_control(
			'widget_icon_color',
			[
				'label' => __( 'Icon Color', 'blackwidgets' ),
				'type' => Controls_Manager::COLOR,
				'scheme' => [
					'type' => Color::get_type(),
					'value' => Color::COLOR_1,
				],
				'selectors' => [
					'{{WRAPPER}} .bw-typograpgy .custom-style i' => 'color: {{VALUE}}; -webkit-text-fill-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// End

	}

	/**
	 * Render title widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings   	= $this->get_settings_for_display();

		// Variables
        $type 	                = isset($settings['widget_type'])                        ? $settings['widget_type']						: '';
        $title 			        = isset($settings['widget_title'])                       ? $settings['widget_title']					: '';
        $alignment 		        = isset($settings['widget_alignment'])                   ? $settings['widget_alignment']				: '';
        $vertical				= isset($settings['vertical_title_display'])			 ? $settings['vertical_title_display']			: '';
        $vertical_rotation		= isset($settings['vertical_rotation'])					 ? $settings['vertical_rotation']				: '';
        $type2 		            = isset($settings['widget_type_2'])                      ? $settings['widget_type_2']					: '';
        $custom_style_x         = ($type2 == 'custom-style')                             ? 'custom-style'								: '';
        $repeat                 = isset($settings['repetitive_repeat'])                  ? $settings['repetitive_repeat']				: '';
        $other_style            = isset($settings['repetitive_repeat_other_style'])      ? $settings['repetitive_repeat_other_style']	: '';
		// Overlay 
		$overlay				= isset($settings['overlay_section_enable'])			? $settings['overlay_section_enable']			: '';
        // Custom Style for shape
        $style_1_type           = isset($settings['tab_style_1_type'])                  ? $settings['tab_style_1_type']					: '';
        $image_id_1		        = isset($settings['tab_style_1_image']['url']) 		    ?  $settings['tab_style_1_image']['url']        : ''; // Image 1
		$iconset_1				= isset($settings['tab_style_1_icon'])                  ? $settings['tab_style_1_icon']                 : ''; // Icon 1
		$svgcode_1				= isset($settings['tab_style_1_code'])                  ? $settings['tab_style_1_code']                 : ''; // Code 1
        $alignment_1            = isset($settings['widget_1_alignment'])                ? $settings['widget_1_alignment']               : '';
        $style_2_type           = isset($settings['tab_style_2_type'])                  ? $settings['tab_style_2_type']                 : '';
        $image_id_2		        = isset($settings['tab_style_2_image']['url']) 		    ?  $settings['tab_style_2_image']['url']        : ''; // Image 2
		$iconset_2				= isset($settings['tab_style_2_icon'])                  ? $settings['tab_style_2_icon']                 : ''; // Icon 2
		$svgcode_2				= isset($settings['tab_style_2_code'])                  ? $settings['tab_style_2_code']                 : ''; // Code 2
        $alignment_2            = isset($settings['widget_2_alignment'])                ? $settings['widget_2_alignment']               : '';
		// Transform Option
		$normal_transform		= isset($settings['transform_normal_option'])			? $settings['transform_normal_option']			: '';
		//Transform Styles
		$move_normal_x			= isset($settings['move_normal_x'])						? $settings['move_normal_x']					: '0px';
		$move_normal_y			= isset($settings['move_normal_y'])						? $settings['move_normal_y']					: '0px';
		$move_normal_z			= isset($settings['move_normal_z'])						? $settings['move_normal_z']					: '0px';
		$scale_normal_x			= isset($settings['scale_normal_x'])					? $settings['scale_normal_x']					: '1';
		$scale_normal_y			= isset($settings['scale_normal_y'])					? $settings['scale_normal_y']					: '1';
		$scale_normal_z			= isset($settings['scale_normal_z'])					? $settings['scale_normal_z']					: '1';
		$rotate_normal_x		= isset($settings['rotate_normal_x'])					? $settings['rotate_normal_x']					: '0deg';
		$rotate_normal_y		= isset($settings['rotate_normal_y'])					? $settings['rotate_normal_y']					: '0deg';
		$rotate_normal_z		= isset($settings['rotate_normal_z'])					? $settings['rotate_normal_z']					: '0deg';
		$skew_normal_x			= isset($settings['skew_normal_x'])						? $settings['skew_normal_x']					: '0deg';
		$skew_normal_y			= isset($settings['skew_normal_y'])						? $settings['skew_normal_y']					: '0deg';
		$perspective			= isset($settings['perspective'])						? $settings['perspective']						: '0px';
		$perspective_child		= isset($settings['perspective_child'])					? $settings['perspective_child']				: '0px';
		//ID Settings
		$data_id				= 'bw_' . uniqid();
		$script_id				= '#' . $data_id;
		$image_movement			= ''; //$settings['image_movement']
		//Transform Normal Styles 
		// Normal Move 
		$translatex 			= isset( $move_normal_x["size"] ) 						? $move_normal_x["size"] . $move_normal_x["unit"] : '';
		$translatey 			= isset( $move_normal_y["size"] ) 						? $move_normal_y["size"] . $move_normal_y["unit"] : '';
		$translatez 			= isset( $move_normal_z["size"] ) 						? $move_normal_z["size"] . $move_normal_z["unit"] : '';
		$translate3d 			= 'translate3d(' . $translatex . ', ' . $translatey . ', ' . $translatez . ')';
		// Normal Scale 
		$scalex 				= isset( $scale_normal_x["size"] ) 						? $scale_normal_x["size"] : '';
		$scaley 				= isset( $scale_normal_y["size"] ) 						? $scale_normal_y["size"] : '';
		$scalez 				= isset( $scale_normal_z["size"] ) 						? $scale_normal_z["size"] : '';
		$scale3dx 				= isset( $scale_normal_z["size"] ) 						? '-webkit-transform-style: preserve-3d; transform-style: preserve-3d;' : '';
		$scale3d 				= 'scale3d(' . $scalex . ', ' . $scaley . ', ' . $scalez . ')';
		// Normal Rotate
		$rotatex 				= isset( $rotate_normal_x["size"] ) 					? 'rotateX(' . $rotate_normal_x["size"] . $rotate_normal_x["unit"] . ')' : '';
		$rotatey 				= isset( $rotate_normal_y["size"] ) 					? 'rotateY(' . $rotate_normal_y["size"] . $rotate_normal_y["unit"] . ')' : '';
		$rotatez 				= isset( $rotate_normal_z["size"] ) 					? 'rotateZ(' . $rotate_normal_z["size"] . $rotate_normal_z["unit"] . ')' : '';
		// Normal Skew
		$skewx 					= isset( $skew_normal_x["size"] ) 						? $skew_normal_x["size"] . $skew_normal_x["unit"] : '';
		$skewy 					= isset( $skew_normal_y["size"] ) 						? $skew_normal_y["size"] . $skew_normal_y["unit"] : '';
		$skew 					= 'skew(' . $skewx . ', ' . $skewy . ')';
		// Normal Self perspective
		$perspective 			= isset( $perspective["size"] ) 						? 'perspective:' . $perspective["size"] . $perspective["unit"] . '; -webkit-perspective:' . $perspective["size"] . $perspective["unit"] . ';': '';
		// Normal Child perspective
		$perspective_child 		= isset( $perspective_child["size"] ) 					? 'perspective(' . $perspective_child["size"] . $perspective_child["unit"] . ')': '';
        // Typography Z Index
		$z_index            	= isset($settings['z_index'])                			? '#'.$data_id.' .bw-typograpgy-with-title, #'.$data_id.' .bw-typography-this-title {z-index:'.$settings['z_index'].'; position: relative;}'          			 	: '';
		$unique_z_index			= isset($settings['unique_z_index'])					? '#'.$data_id.' .bw-unique {z-index:'.$settings['unique_z_index'].'; position: relative;}'          			 	: '';
		// Create a Custom CSS for Normal and Hover Styles
		$normal_transform_style = ($normal_transform == 'normal_transform')				? "#$data_id { $perspective transform: $perspective_child $skew $rotatex $rotatey $rotatez $scale3d $translate3d; -webkit-transform: $perspective_child $skew $rotatex $rotatey $rotatez $scale3d $translate3d; $scale3dx }" : '';

		echo '<style>'.$normal_transform_style.' '.$z_index.' '.$unique_z_index.'</style>';

		// Render
        echo '<div class="bw-typograpgy '.$type.' '.$alignment.' '.$custom_style_x.'">';
			echo '<div class="bw-typograpgy-wrap" id="'. $data_id .'">';
			switch ($type) {
				case 'bw-t-1': // Type 1
					echo '<div class="bw-typograpgy-main-title bw-'.$vertical.' '.$vertical_rotation.' bw-typography-this-title">'.$title.'</div>';
					break;
				case 'bw-t-2':// Type 2
					echo '<div class="bw-typograpgy-with-title bw-'.$vertical.' '.$type2.' '.$vertical_rotation.'">';
					switch ($type2) {
						case 'style-x-1':
							echo '<span class="line-1"></span>';
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							break;
						case 'style-x-2':
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							echo '<span class="line-2"></span>';
							break;
						case 'style-x-3':
							echo '<span class="line-1"></span>';
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							echo '<span class="line-2"></span>';
							break;
						case 'style-x-4':
							echo '<span class="line-1"></span>';
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							break;
						case 'style-x-5':
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							echo '<span class="line-2"></span>';
							break;
						case 'style-x-6':
							echo '<span class="line-1"></span>';
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							echo '<span class="line-2"></span>';
							break;
						case 'custom-style':
							echo '<span class="bw-left-top '.$alignment_1.'">';
								if ( $style_1_type == 'enable_icon' ): echo '<div class="bw-iconbox-icon">'; \Elementor\Icons_Manager::render_icon( $iconset_1, [ 'aria-hidden' => 'true' ] ); echo '</div>';
								elseif ( $style_1_type == 'enable_code' ): echo '<div class="bw-iconbox-img xcv--mw">'.$svgcode_1.'</div>';
								else: echo '<div class="bw-iconbox-img"><img src="'.$image_id_1.'" class="bw-iconbox-image"></div>';
								endif;
							echo '</span>';
							echo '<span class="bw-bw-t-2-text '.$alignment.' bw-typography-this-title">'.$title.'</span>';
							echo '<span class="bw-right-bottom '.$alignment_2.'">';
								if ( $style_2_type == 'enable_icon' ): echo '<div class="bw-iconbox-icon">'; \Elementor\Icons_Manager::render_icon( $iconset_2, [ 'aria-hidden' => 'true' ] ); echo '</div>';
								elseif ( $style_2_type == 'enable_code' ): echo '<div class="bw-iconbox-img xcv--mw">'.$svgcode_2.'</div>';
								else: echo '<div class="bw-iconbox-img"><img src="'.$image_id_2.'" class="bw-iconbox-image"></div>';
								endif;
							echo '</span>';
							break;
						default:
							echo '<span class="line-1"></span>';
							echo '<span class="bw-bw-t-2-text bw-typography-this-title">'.$title.'</span>';
							break;
					}
					echo '</div>';
					break;
				case 'bw-t-3': // Type 3
						if ( !empty($vertical) ) echo '<div class="bw-wrapper-'.$vertical.' '.$vertical_rotation.'">';
						$count = 1;
						while( $count <= $repeat ) {
							if ($count == $other_style) {
								echo '<div class="bw-typograpgy-repetitive bw-unique bw-typography-this-title">'.$title.'</div>';
							} else {
								echo '<div class="bw-typograpgy-repetitive bw-typography-this-title">'.$title.'</div>';
							}
							$count++;
						}
						if ( !empty($vertical) ) echo '</div>';
					break;
				default: // simple
					echo '<div class="bw-typograpgy-main-title bw-'.$vertical.' '.$vertical_rotation.' bw-typography-this-title">'.$title.'</div>';
					break;
			}
			echo '</div>';
			if ( $overlay == 'overlay_enable' ) echo '<div class="bw-overlay"></div>';
        echo '</div>';

	}

}
