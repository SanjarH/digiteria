// 1. Register Project CPT
function digiteria_register_cpt_project() {
  $labels = [
    'name'               => __( 'Projects', 'digiteria' ),
    'singular_name'      => __( 'Project',  'digiteria' ),
    'add_new_item'       => __( 'Add New Project', 'digiteria' ),
    'edit_item'          => __( 'Edit Project',    'digiteria' ),
    'new_item'           => __( 'New Project',     'digiteria' ),
    'view_item'          => __( 'View Project',    'digiteria' ),
    'search_items'       => __( 'Search Projects', 'digiteria' ),
    'not_found'          => __( 'No Projects found', 'digiteria' ),
    'all_items'          => __( 'All Projects', 'digiteria' ),
  ];
  $args = [
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'rewrite'            => [ 'slug' => 'projects' ],
    'show_in_rest'       => true,
    'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail' ],
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-portfolio',
  ];
  register_post_type( 'project', $args );
}
add_action( 'init', 'digiteria_register_cpt_project' );

// 2. Register Service Taxonomy
function digiteria_register_taxonomy_service() {
  $labels = [
    'name'              => __( 'Services', 'digiteria' ),
    'singular_name'     => __( 'Service',  'digiteria' ),
    'search_items'      => __( 'Search Services',     'digiteria' ),
    'all_items'         => __( 'All Services',       'digiteria' ),
    'edit_item'         => __( 'Edit Service',       'digiteria' ),
    'add_new_item'      => __( 'Add New Service',    'digiteria' ),
    'new_item_name'     => __( 'New Service Name',   'digiteria' ),
  ];
  $args = [
    'labels'            => $labels,
    'hierarchical'      => true,
    'show_in_rest'      => true,
    'rewrite'           => [ 'slug' => 'service' ],
  ];
  register_taxonomy( 'service', [ 'project' ], $args );
}
add_action( 'init', 'digiteria_register_taxonomy_service' );

// 3. Add Project URL Meta Field (simple)
function digiteria_project_meta_boxes() {
  add_meta_box(
    'project_url',
    __( 'Project URL', 'digiteria' ),
    function( $post ) {
      $url = get_post_meta( $post->ID, '_project_url', true );
      echo '<input type="url" style="width:100%" name="project_url" value="' . esc_attr( $url ) . '">';
    },
    'project', 'side', 'default'
  );
}
add_action( 'add_meta_boxes', 'digiteria_project_meta_boxes' );

function digiteria_save_project_meta( $post_id ) {
  if ( isset( $_POST['project_url'] ) ) {
    update_post_meta( $post_id, '_project_url', esc_url_raw( $_POST['project_url'] ) );
  }
}
add_action( 'save_post_project', 'digiteria_save_project_meta' );
