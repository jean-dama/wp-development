<?php
//carregando scripts e folhas de estilo
function load_scripts()
{
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0', 'all');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js', array(), '5.3.3', true);
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3', 'all');
}
add_action('wp_enqueue_scripts', 'load_scripts');
//config do tema
function wp_paper_config()
{
    //registro de menu
    register_nav_menus(
        array(
            'menu' => 'Menu',
            'menu_footer' => 'Menu footer'
        )
    );
    //imagem
    $args = array(
        'flex-width' => true,
        'flex-height' => true,
    );
    //imagem cabecalho
    add_theme_support('custom-header', $args);
    //imagem post
    add_theme_support('post-thumbnails');
    //post formato
    add_theme_support('post-formats', array('video', 'image'));
    //add title
    add_theme_support('title-tag');

}
add_action('after_setup_theme', 'wp_paper_config');
/**/
function paper_sidebars()
{   //widgets 
    register_sidebar(
        array(
            'name' => 'Home Sidebar',
            'id' => 'home-sidebar',
            'description' => 'Sidebar home',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Blog Sidebar',
            'id' => 'blog-sidebar',
            'description' => 'Sidebar Blog',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Option one',
            'id' => 'option-one',
            'description' => 'Option one',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Option two',
            'id' => 'option-two',
            'description' => 'Option two',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Option three',
            'id' => 'option-three',
            'description' => 'Option three',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Option four',
            'id' => 'option-four',
            'description' => 'Option four',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Image one',
            'id' => 'image-one',
            'description' => 'Image one',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Image two',
            'id' => 'image-two',
            'description' => 'Image two',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
        )
    );
    register_sidebar(
        array(
            'name' => 'Custom content',
            'id' => 'custom-content',
            'description' => 'Custom content',
            'before_widget' => '<div class="widget-wrapper">',
            'after_widget' => '</div>',
        )
    );
}
add_action('widgets_init', 'paper_sidebars');
/**/
function api_credentials_fields()
{
    //credenciais 
    register_post_meta(
        'post',
        'api_key',
        array(
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
        )
    );
    register_post_meta(
        'post',
        'api_secret',
        array(
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
        )
    );
}
add_action('init', 'api_credentials_fields');
/**/
function add_api_credentials_meta_box()
{
    add_meta_box(
        'api-credentials-meta-box',
        'API Credentials',
        'render_api_credentials_meta_box',
        'post', // Post
        'normal', // Contexto
        'high' // Prioridade
    );
}
add_action('add_meta_boxes', 'add_api_credentials_meta_box');
/**/
function render_api_credentials_meta_box($post)
{   //dados credenciais
    $api_key = get_post_meta($post->ID, 'api_key', true);
    $api_secret = get_post_meta($post->ID, 'api_secret', true);
    ?>
    <label for="api-key">API Key:</label>
    <input type="text" id="api-key" name="api_key" value="<?php echo esc_attr($api_key); ?>" /><br />

    <label for="api-secret">API Secret:</label>
    <input type="text" id="api-secret" name="api_secret" value="<?php echo esc_attr($api_secret); ?>" />
    <?php
}
function save_api_credentials_meta_box($post_id)
{
    if (isset ($_POST['api_key'])) {
        update_post_meta($post_id, 'api_key', sanitize_text_field($_POST['api_key']));
    }
    if (isset ($_POST['api_secret'])) {
        update_post_meta($post_id, 'api_secret', sanitize_text_field($_POST['api_secret']));
    }
}
add_action('save_post', 'save_api_credentials_meta_box');
/*CPT*/
function new_cpt_project()
{   //campos
    $labels = array(
        'name' => 'Projetos',
        'singular_name' => 'Projeto',
        'add_new' => 'Adicionar Novo',
        'add_new_item' => 'Adicionar Novo Item',
        'edit_item' => 'Editar',
        'new_item' => 'Novo',
        'view_item' => 'Ver',
        'search_items' => 'Buscar',
        'not_found' => 'Não encontrado',
        'not_found_in_trash' => 'Não encontrado',
        'parent_item_colon' => '',
        'menu_name' => 'Projetos'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'projetos'),
        'supports' => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('projetos', $args);
}
add_action('init', 'new_cpt_project');
// as Meta Boxes
function add_meta_box_url_project()
{
    add_meta_box(
        'meta_box_url_project',
        'URL do Projeto',
        'callback_meta_box_url_project',
        'projetos',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_meta_box_url_project');
//url
function callback_meta_box_url_project($post)
{
    $url_projeto = get_post_meta($post->ID, '_url_project', true);
    ?>
    <label for="url_project">URL:</label>
    <input type="text" id="url_project" name="url_project" value="<?php echo esc_attr($url_projeto); ?>" />
    <?php
}

function save_meta_box_url_projeto($post_id)
{
    if (array_key_exists('url_project', $_POST)) {
        update_post_meta(
            $post_id,
            '_url_project',
            sanitize_text_field($_POST['url_project'])
        );
    }
}
add_action('save_post', 'save_meta_box_url_projeto');
//taxomia
function criar_taxonomia_tipo_projeto()
{
    $labels = array(
        'name' => 'Tipos de Projeto',
        'singular_name' => 'Tipo de Projeto',
        'search_items' => 'Buscar',
        'all_items' => 'Todos',
        'edit_item' => 'Editar',
        'update_item' => 'Atualizar',
        'add_new_item' => 'Adicionar',
        'new_item_name' => 'Novo Nome',
        'menu_name' => 'Tipos de Projeto'
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'tipo-projeto'),
    );
    register_taxonomy('tipo-projeto', array('projetos'), $args);
}
add_action('init', 'criar_taxonomia_tipo_projeto');
function new_taxonomia_hab_tec()
{
    $labels = array(
        'name' => 'Habilidades',
        'singular_name' => 'Habilidade',
        'search_items' => 'Buscar Habilidades',
        'all_items' => 'Todas as Habilidades',
        'edit_item' => 'Editar Habilidade',
        'update_item' => 'Atualizar Habilidade',
        'add_new_item' => 'Adicionar Nova Habilidade',
        'new_item_name' => 'Novo Nome da Habilidade',
        'menu_name' => 'Habilidades'
    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'hab-tec'),
    );
    register_taxonomy('hab-tec', array('projetos'), $args);
}
add_action('init', 'new_taxonomia_hab_tec');
