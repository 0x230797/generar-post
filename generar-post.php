<?php
/*
 * Plugin Name: Generar post
 * Plugin URI: https://github.com/0x230797/generar-post
 * Description: Este plugin te ayudará a generar de forma correcta las url para publicarlas.
 * Version: 1.0
 * Author: C A N I B A L
 * Author URI: https://github.com/0x230797
 * Text Domain: generar-post
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    exit;
}

// Función para el shortcode
function my_custom_shortcode() {
    ob_start();
        // Ruta al archivo HTML externo
        $html_file_path = plugin_dir_path(__FILE__) . 'assets/generar.html';

        // Verificar si el archivo existe
        if (file_exists($html_file_path)) {
            // Leer y mostrar el contenido del archivo HTML
            include $html_file_path;
        } else {
            echo 'Error: El archivo HTML no pudo ser encontrado.';
        }
    return ob_get_clean();
}
add_shortcode('mi_shortcode', 'my_custom_shortcode');

// Función para agregar la página en el admin
function agregar_generar_post() {
    add_menu_page(
        'Generar post',
        'Generar post',
        'manage_options',
        'generar_post',
        'mostrar_generar_post',
        '',
        4
    );
}
add_action('admin_menu', 'agregar_generar_post');

// Función para mostrar la página en el admin
function mostrar_generar_post() {
    ?>
    <div class="wrap">
        <h2>Generar post</h2>
        <br>
        <?php echo do_shortcode('[mi_shortcode]'); ?>
    </div>
    <?php
}
?>