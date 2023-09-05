<?php
/**
 * Gather all bits and pieces together.
 * If you end up having multiple post types, taxonomies,
 * hooks and functions - please split those to their
 * own files under /inc and just require here.
 *
 * @Date: 2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2023-05-18 17:39:55
 *
 * @package checkpoints
 */

namespace Air_Light;

/**
 * The current version of the theme.
 */
define( 'AIR_LIGHT_VERSION', '9.3.3' );

// We need to have some defaults as comments or empties so let's allow this:
// phpcs:disable Squiz.Commenting.InlineComment.SpacingBefore, WordPress.Arrays.ArrayDeclarationSpacing.SpaceInEmptyArray

/**
 * Theme settings
 */
add_action( 'after_setup_theme', function() {
  $theme_settings = [
    /**
     * Theme textdomain
     */
    'textdomain' => 'checkpoints',

    /**
     * Content width
     */
    'content_width' => 800,

    /**
     * Logo and featured image
     */
    'default_featured_image'  => null,
    'logo'                    => '/svg/logo.svg',

    /**
     * Custom setting group settings when using Air setting groups plugin.
     * On multilingual sites using Polylang, translations are handled automatically.
     */
    'custom_settings' => [
      // 'your-custom-setting' => [
      //   'id' => Your custom setting post id,
      //   'title' => 'Your custom setting',
      //   'block-editor' => true,
      //  ],
    ],

    'social_media_accounts'  => [
      // 'twitter' => [
      //   'title' => 'Twitter',
      //   'url'   => 'https://twitter.com/digitoimistodude',
      // ],
    ],

    /**
     * All links are cheked with JS, if those direct to external site and if,
     * indicator of that is included. Exclude domains from that check in this array.
     */
    'external_link_domains_exclude' => [
      'localhost:3000',
      'airdev.test',
      'airwptheme.com',
      'localhost',
    ],

    /**
     * Menu locations
     */
    'menu_locations' => [
      'primary' => __( 'Primary Menu', 'checkpoints' ),
    ],

    /**
     * Taxonomies
     *
     * See the instructions:
     * https://github.com/digitoimistodude/checkpoints#custom-taxonomies
     */
    'taxonomies' => [
      // 'Your_Taxonomy' => [ 'post', 'page' ],
    ],

    /**
     * Post types
     *
     * See the instructions:
     * https://github.com/digitoimistodude/checkpoints#custom-post-types
     */
    'post_types' => [
      // 'Your_Post_Type',
    ],

    /**
     * Gutenberg -related settings
     */
    // Register custom ACF Blocks
    'acf_blocks' => [
        [
        'name'           => 'packages-block',
        'title'          => 'Jämför paket-block',
        'supports'		   => [
          'color'           => [
            'background' => true,
            'gradients' => true,
          ],
          'anchor'          => true,
          'jsx' 			      => true,
        ]
      ],
        [
        'name'           => 'waves-block',
        'title'          => 'Vågövergång',
        'supports'		   => [
          'color'           => [
            'background' => true,
            'gradients' => true,
          ],
          'anchor'          => true,
          'jsx' 			      => true,
        ]
      ],
      [
        'name'           => 'feat-highlight-block',
        'title'          => 'Feature hightlight-block',
        'supports'		   => [
          'color'           => [
            'background' => true,
            'gradients' => true,
          ],
          'anchor'          => true,
          'jsx' 			      => true,
        ]
      ],
    ],

    // Custom ACF block default settings
    'acf_block_defaults' => [
      'category'          => 'checkpoints',
      'mode'              => 'auto',
      'align'             => 'full',
      'post_types'        => [
        'page',
      ],
      'supports'  => [
        'color'           => [
          'background' => true,
          'gradients' => true,

        ],
        'align'           => false,
        'anchor'          => true,
        'customClassName' => false,
      ],
      'render_callback'   => __NAMESPACE__ . '\render_acf_block',
    ],

    // Restrict to only selected blocks
    // Set the value to 'all' to allow all blocks everywhere
   'allowed_blocks' => [
    'default' => [
      'core/gallery',
      'core/buttons',
      'core/list',
      'core/image',
      'core/block',
      'core/paragraph',
      'core/heading',
      'core/video',
      'core/spacer',
      'core/file',
      'core/subhead',
      'core/quote',
      'core/group',
      
    ],
    'post' => [
      'core/archives',
      'core/audio',
      'core/buttons',
      'core/categories',
      'core/code',
      'core/column',
      'core/columns',
      'core/coverImage',
      'core/embed',
      'core/file',
      'core/freeform',
      'core/gallery',
      'core/heading',
      'core/html',
      'core/image',
      'core/latestComments',
      'core/latestPosts',
      'core/list',
      'core/list-item',
      'core/more',
      'core/nextpage',
      'core/paragraph',
      'core/preformatted',
      'core/pullquote',
      'core/quote',
      'core/block',
      'core/separator',
      'core/shortcode',
      'core/spacer',
      'core/subhead',
      'core/table',
      'core/textColumns',
      'core/verse',
      'core/video',
    ],
    ],

    // If you want to use classic editor somewhere, define it here
    'use_classic_editor' => [],

    // Add your own settings and use them wherever you need, for example THEME_SETTINGS['my_custom_setting']
    'my_custom_setting' => true,
  ];

  $theme_settings = apply_filters( 'air_light_theme_settings', $theme_settings );

  define( 'THEME_SETTINGS', $theme_settings );
} ); // end action after_setup_theme

function admin_theme_style()
{
  wp_enqueue_style( 'admin-theme', get_stylesheet_directory_uri() . '/admin/admin.css' );
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\admin_theme_style');
add_action('login_enqueue_scripts', __NAMESPACE__ . '\admin_theme_style');

function theme_custom_gradients()
{
    add_theme_support('editor-gradient-presets', array(
        array(
            'name' => __('pruple-to-dark-blue', 'your-textdomain'),
            'gradient' => 'linear-gradient(0deg, var(--color-amethyst) 0%, #232F69 21%, #1A1A39 78%,  #3C2A92 100%)',
            'slug' => 'pruple-to-dark-blue'
        ),
        array(
            'name' => __('light-blue-to-light-purple', 'your-textdomain'),
            'gradient' => 'linear-gradient(125deg, rgba(0,132,219,1) 0%, rgba(42,64,146,1) 32%, rgba(71,51,156,1) 60%, rgba(93,42,164,1) 83%)',
            'slug' => 'light-blue-to-light-purple'
        ),
        array(
            'name' => __('light-blue-to-dark-blue', 'your-textdomain'),
            'gradient' => 'linear-gradient(0deg, #0380D8 0%, #251D63 100%)',
            'slug' => 'light-blue-to-dark-blue'
        ),
    ));
}
add_action('after_setup_theme', __NAMESPACE__ . '\theme_custom_gradients');

function my_theme_add_new_features() {
  // The new colors we are going to add
  $newColorPalette = [
      [
          'name' => esc_attr__('Checkpoints-blå', 'default'),
          'slug' => 'checkpoints-blue',
          'color' => '#0084DB',
      ],
      [
          'name' => esc_attr__('Blå', 'default'),
          'slug' => 'medium-blue',
          'color' => '#2A4092',
      ],
      [
          'name' => esc_attr__('Mörkblå', 'default'),
          'slug' => 'marine',
          'color' => '#180A6A',
      ],
      [
          'name' => esc_attr__('Lavender', 'default'),
          'slug' => 'lavendar',
          'color' => '#B085B7',
      ],
      [
          'name' => esc_attr__('Violet', 'default'),
          'slug' => 'violet',
          'color' => '#5D2AA4',
      ],
      [
          'name' => esc_attr__('Amethyst', 'default'),
          'slug' => 'amethyst',
          'color' => '#472167',
      ],
      [
          'name' => esc_attr__('Abyss', 'default'),
          'slug' => 'abyss',
          'color' => '#1A1A39',
      ],
      [
          'name' => esc_attr__('White', 'default'),
          'slug' => 'white',
          'color' => '#FFF',
      ],
  ];
  // Apply the color palette containing the original colors and 2 new colors:
  add_theme_support( 'editor-color-palette', $newColorPalette);
}
add_action( 'after_setup_theme',  __NAMESPACE__ . '\my_theme_add_new_features' );

// add image sizes
add_image_size( 'feature-heighlight', 400, 350, true );

/**
 * Required files
 */
require get_theme_file_path( '/inc/hooks.php' );
require get_theme_file_path( '/inc/includes.php' );
require get_theme_file_path( '/inc/template-tags.php' );

// Run theme setup
add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_setup' );
add_action( 'after_setup_theme', __NAMESPACE__ . '\build_theme_support' );
