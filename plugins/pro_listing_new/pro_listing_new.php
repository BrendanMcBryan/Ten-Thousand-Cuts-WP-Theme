<?php
/**
 * Plugin Name: Custom Property Listing Plugin
 * Description: A custom property listing system with real-time AJAX filtering.
 * Version: 1.0
 * Author: Babar Suleman
 * Text Domain: property-listing
 */

if (!defined('ABSPATH')) {
    exit;
}
// Add admin menu item
add_action('admin_menu', 'add_unit_exclusion_settings_page');
function add_unit_exclusion_settings_page() {
    add_options_page(
        'Unit Exclusion Settings',
        'Exclude Units',
        'manage_options',
        'unit-exclusion-settings',
        'unit_exclusion_settings_page'
    );
}

// Register the setting
add_action('admin_init', 'register_unit_exclusion_settings');
function register_unit_exclusion_settings() {
    register_setting('unit_exclusion_group', 'excluded_unit_names');
}

// Create the settings page
function unit_exclusion_settings_page() {
    ?>
    <div class="wrap">
        <h1>Unit Exclusion Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('unit_exclusion_group');
            do_settings_sections('unit_exclusion_group');
            $excluded_units = get_option('excluded_unit_names', '');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Units to Exclude</th>
                    <td>
                        <textarea name="excluded_unit_names" rows="5" cols="50" class="large-text"><?php echo esc_textarea($excluded_units); ?></textarea>
                        <p class="description">Enter one unit name per line (e.g., "Residence 103")</p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
// Enqueue necessary scripts and styles
function fp_quiz_enqueue_scripts() {
    // Localize the script (makes `ajaxurl` and other PHP variables available in JS)
    wp_localize_script(
        'fp-quiz-script',
        'fpQuizVars',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('fp-quiz-nonce') // Optional: If you need a dynamic nonce
        )
    );
    wp_enqueue_style('fp-quiz-style', plugins_url('style.css', __FILE__));
    wp_enqueue_script('fp-quiz-script', plugins_url('script.js', __FILE__), array('jquery'), '1.0', true);

    
    // Get plugin options
    $options = get_option('fp_quiz_options', array());
    
    // Prepare questions for JavaScript
    $default_questions = array(
        array('text' => 'Do you have any pets?', 'options' => 'Yes,No'),
        array('text' => 'Preferred budget range?', 'options' => '$500 - $1000,$1000 - $2000,$2000+'),
        array('text' => 'Number of bedrooms?', 'options' => '1,2,3+'),
        array('text' => 'Number of bathrooms?', 'options' => '1,2,3+'),
        array('text' => 'Preferred move-in date?', 'options' => 'ASAP,Within a month,Later')
    );
    
    $questions = isset($options['questions']) ? $options['questions'] : $default_questions;
    
    // Localize script with data
    wp_localize_script('fp-quiz-script', 'fpQuizData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('fp-quiz-nonce'),
        'trigger_button' => isset($options['trigger_button']) ? $options['trigger_button'] : 'csacsac',
        'primary_color' => isset($options['primary_color']) ? $options['primary_color'] : '#8B2F2F',
        'secondary_color' => isset($options['secondary_color']) ? $options['secondary_color'] : '#fbdada',
        'button_color' => isset($options['button_color']) ? $options['button_color'] : '#D9534F',
        'questions' => array_map(function($q) {
            return array(
                'text' => $q['text'],
                'options' => explode(',', $q['options'])
            );
        }, $questions)
    ));
}
add_action('wp_enqueue_scripts', 'fp_quiz_enqueue_scripts');


// function rm_get_auth_token() {
//     $transient_key = 'rm_auth_token';
//     $token_data = get_transient($transient_key);

//     // Step 1: Deauthorize old token if exists
//     if (!empty($token_data['token'])) {
//         $old_token = $token_data['token'];
//         $companyCode = 'feldman'; // Replace with your company code
//         $deauth_url = "https://{$companyCode}.api.rentmanager.com/Authentication/Deauthorize?token={$old_token}";

//         $deauth = curl_init($deauth_url);
//         curl_setopt($deauth, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($deauth, CURLOPT_CUSTOMREQUEST, "GET");
//         $deauth_response = curl_exec($deauth);
//         $deauth_http = curl_getinfo($deauth, CURLINFO_HTTP_CODE);
//         curl_close($deauth);

//         error_log("Deauthorize HTTP: $deauth_http");
//         error_log("Deauthorize response: $deauth_response");

//         // Clear the old token just in case
//         delete_transient($transient_key);
//     }

//     // Step 2: Request new token
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://feldman.api.rentmanager.com/Authentication/AuthorizeUser',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_CUSTOMREQUEST => 'POST',
//         CURLOPT_POSTFIELDS => json_encode([
//             'username' => 'jean-luc',
//             'password' => 'Carel123!',
//         ]),
//         CURLOPT_HTTPHEADER => array(
//             'Content-Type: application/json',
//         ),
//     ));

//     $response = curl_exec($curl);
//     $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//     curl_close($curl);

//     $data = json_decode($response, true);

//     error_log("Token Request HTTP: $http_code");
//     error_log("Token Response Raw: $response");

//     if (!empty($data['Token'])) {
//         set_transient($transient_key, ['token' => $data['Token']], 60 * 30); // Cache for 30 min
//         return $data['Token'];
//     }

//     return false;
// }
// $token = rm_get_auth_token();
// if ($token) {
//     echo "Token: $token";
// } else {
//     echo "Failed to get token.";
// }

add_action('admin_menu', 'my_token_settings_menu');
add_action('admin_init', 'my_token_settings_init');

function my_token_settings_menu() {
    add_menu_page(
        'Token Settings',           // Page title
        'Token Settings',           // Menu title
        'manage_options',           // Capability
        'my-token-settings',        // Menu slug
        'my_token_settings_page'    // Callback function
    );
}

function my_token_settings_init() {
    register_setting('my_token_settings_group', 'my_custom_token');

    add_settings_section(
        'my_token_section',
        'Custom Token',
        null,
        'my-token-settings'
    );

    add_settings_field(
        'my_custom_token',
        'Token Value',
        'my_token_field_callback',
        'my-token-settings',
        'my_token_section'
    );
}

function my_token_field_callback() {
    $token = get_option('my_custom_token');
    echo '<input type="text" name="my_custom_token" value="' . esc_attr($token) . '" size="100">';
}

function my_token_settings_page() {
    ?>
    <div class="wrap">
        <h1>Token Settings</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('my_token_settings_group');
            do_settings_sections('my-token-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
// echo "string" . $token;
//global $token; 
//$token = get_option('my_custom_token');
//$token ="LDeiV_ykd1M5Ngxl46XATxcMilCaVp9F_ZDfyUt5vonw1XPpzhWl4uTNrEa5GkaHVs8YHaWPVwXcgVl0ZEprodAsnulZTjGzXEpmqnXD6Tc="; 
// Add to functions.php
function units_shortcode($atts) {
    // $atts = shortcode_atts(array(
    //     'quiz_answers' => '',
    // ), $atts, 'display_units');
    
    // // You might want to decode the query string back to an array
    // parse_str($atts['quiz_answers'], $quiz_answers);
    
    // Now you can use $quiz_answers as an array
    // Example: print_r($quiz_answers);
    // print_r($atts);
    $atts = shortcode_atts( array(
        'quiz_answers' => '',
    ), $atts );

    // Decode base64 before unserializing
    $decoded = base64_decode($atts['quiz_answers']);
    $quiz_answers = maybe_unserialize($decoded);

    // echo "<pre>";
    // print_r($quiz_answers); // DEBUG
    // echo "</pre>";
        // Extract relevant values
    $quiz_defaults = [
        'pets' => isset($quiz_answers[3]) ? $quiz_answers[3] : '',
        'budget' => isset($quiz_answers[0]) ? $quiz_answers[0] : '',
        'bedrooms' => isset($quiz_answers[1]) ? $quiz_answers[1] : '',
        'bathrooms' => isset($quiz_answers[2]) ? $quiz_answers[2] : '',
    ];
    // Pass quiz values to JavaScript
    wp_localize_script('fp-quiz-script', 'RentManagerQuiz', $quiz_defaults);

    if (is_array($quiz_answers)) {
        // $value1 = isset($quiz_answers[0]) ? esc_html($quiz_answers[0]) : '';
        // $value2 = isset($quiz_answers[1]) ? esc_html($quiz_answers[1]) : '';
        // $value3 = isset($quiz_answers[2]) ? esc_html($quiz_answers[2]) : '';
        // $value4 = isset($quiz_answers[3]) ? esc_html($quiz_answers[3]) : '';
        // $value5 = isset($quiz_answers[4]) ? esc_html($quiz_answers[4]) : '';

        // echo "<p>1st Value Pets: $value1</p>";
        // echo "<p>2nd Value budget range: $value2</p>";
        // echo "<p>3rd Value bedrooms: $value3</p>";
        // echo "<p>4th Value bathrooms: $value4</p>";
        // echo "<p>5th Value moveindate: $value5</p>";
        ?>

   <div id="unit-filters" style="margin-bottom: 20px;">
   <div class="filters_inner"><label>Select Property</label>
        <select id="filter-property"><option value="">All Properties</option></select></div>
       <div class="filters_inner"> <label>No. of Bedrooms</label>
        <select id="filter-bedrooms"><option value="">All Bedrooms</option></select></div>
      <div class="filters_inner">  <label>No. of Bathrooms</label>
        <select id="filter-bathrooms"><option value="">All Bathrooms</option></select></div>
        <!-- <select id="filter-price"><option value="">All Prices test</option></select> -->
       <div class="filters_inner"> <label>Max Rent</label>
        <input type="number" id="filter-price" name=""></div>
    </div>

    <table id="unit-table" border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Unit</th>
                <th>Address</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

        <?php
    } else {
        // echo '<p>Unserialization failed. Not an array.</p>';
    
    // wp_enqueue_script('units-filter', plugin_dir_url(__FILE__) . '/js/units-filter.js', array('jquery'), '1.0', true);
    wp_localize_script('units-filter', 'units_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    ob_start();
    ?>
 
    <div class="units-filter-container">
        <div class="filter-controls">
            <input type="text" id="unit-search" placeholder="Search by name..." class="filter-input">
            
            <select id="bedrooms-filter" class="filter-select">
                <option value="">All Bedrooms</option>
                <option value="1">1 Bedroom</option>
                <option value="2">2 Bedrooms</option>
                <option value="3">3 Bedrooms</option>
            </select>
            
            <div class="range-filter">
                <label>Area (Square Foot):</label>
                <input type="number" id="sqft-min" placeholder="Min" class="filter-input small">
                <span>-</span>
                <input type="number" id="sqft-max" placeholder="Max" class="filter-input small">
            </div>

            <div class="price-filter">
                <label>Price Range:</label>
                <input type="number" id="price-min" placeholder="Min" class="filter-input small">
                <span>-</span>
                <input type="number" id="price-max" placeholder="Max" class="filter-input small">
            </div>
            <!-- 
            <div class="checkbox-filter">
                <input type="checkbox" id="affordable-only" class="filter-checkbox">
                <label for="affordable-only">Affordable Only</label>
            </div> -->
        </div>
        
        <div id="units-loading" style="display:none;">Loading...</div>
        <div id="units-container" class="units-grid"></div>
        <div id="units-pagination" class="units-pagination"></div>
    </div>
    <?php
    return ob_get_clean();
    }
}
add_shortcode('display_units', 'units_shortcode');
// Enqueue scripts and localize data
add_action('wp_enqueue_scripts', function () {
    $token = get_rentmanager_token();
    $api_response = wp_remote_get('https://feldman.api.rentmanager.com/Units/OnlineListings?filters=PropertyID,eq,124', [
        'headers' => [
            'Content-Type' => 'application/json',
            'X-RM12Api-ApiToken' => $token,
        ]
    ]);
    deauthorize_rentmanager_token();

    $units = wp_remote_retrieve_body($api_response);
    $decoded_units = json_decode($units, true);

    wp_localize_script('fp-quiz-script', 'RentManagerData', [
        'units' => $decoded_units
    ]);
});
// function get_units_data() {
//     global $token;
//     $curl = curl_init();
//     curl_setopt_array($curl, array(
//         CURLOPT_URL => 'https://feldman.api.rentmanager.com/Units',
//         CURLOPT_RETURNTRANSFER => true,
//         CURLOPT_HTTPHEADER => array(
//             'Content-Type: application/json',
//             // 'X-RM12Api-ApiToken: nbAEpzTQXXqu7UqZKio5YwncBIhCLKt0Vb3rcuPlL5rxKqvd6SJQbqv_p1kb1b86isueLw_3STSJsLASxGlei8yLqXbAqkIrfyXvkK83g9Y='
//             'X-RM12Api-ApiToken: $token'
//         ),
//     ));
    
//     $response = curl_exec($curl);
//     curl_close($curl);
    
//     wp_send_json_success(json_decode($response, true));
// }
// function get_units_data() {
//     global $token;
//     $units = [];
//     $page = 1;

//     do {
//         $curl = curl_init();
//         curl_setopt_array($curl, array(
//             CURLOPT_URL => 'https://feldman.api.rentmanager.com/Units', // Adjust limit
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_HTTPHEADER => array(
//                 'Content-Type: application/json',
//                 'X-RM12Api-ApiToken: ' . $token,
//             ),
//             CURLOPT_TIMEOUT => 15
//         ));

//         $response = curl_exec($curl);
//         $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
//         curl_close($curl);

//         $data = json_decode($response, true);
//         if (!empty($data)) {
//             $units = array_merge($units, $data);
//             $page++;
//         } else {
//             break;
//         }
//     } while (count($data) > 0);

//     wp_send_json_success($units);
// }

// add_action('wp_ajax_get_units', 'get_units_data');
// add_action('wp_ajax_nopriv_get_units', 'get_units_data');



function units_shortcode_styles() {
    echo '
    <style>
  
        .results-count {
            display: flex;
            width: 100% !important;
            font-weight: 700;
        }
        .units-filter-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .filter-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
            align-items: center;
        }
        .filter-input, .filter-select {
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .filter-input.small {
            width: 80px;
        }
        .range-filter, .checkbox-filter {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .units-grid {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }
        .unit-column {
            width: 33.33%;
            padding: 10px;
            box-sizing: border-box;
        }
        .unit-card {
            border: 1px solid #eee;
            padding: 15px;
            height: 100%;
            transition: all 0.3s;
        }
        .unit-card:hover {
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        .affordable-badge {
            background: #4CAF50;
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 12px;
            display: inline-block;
            margin-left: 8px;
        }
        .pagination-links {
            text-align: center;
            margin-top: 20px;
        }
        .pagination-links a, .pagination-links span {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 2px;
            border: 1px solid #ddd;
                color: rgb(136, 202, 0);
        }
        .pagination-links a:hover {
            background: #f5f5f5;
        }
        .pagination-links .current {
            background: linear-gradient(90deg, rgb(148, 169, 255) 0%, rgb(33, 163, 168) 0%, rgb(136, 202, 0) 100%);
            color: white;
            border-color: #0073aa;
        }
        @media (max-width: 768px) {
            .filter-controls {
                flex-direction: column;
                align-items: stretch;
            }
            .unit-column {
                width: 100%;
            }
        }
    </style>
    ';
}
add_action('wp_head', 'units_shortcode_styles');

function fp_quiz_activate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fp_quiz_submissions';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        first_name varchar(100) NOT NULL,
        last_name varchar(100),
        email varchar(100) NOT NULL,
        phone varchar(50) NOT NULL,
        receive_texts tinyint(1) DEFAULT 0,
        quiz_answers text NOT NULL,
        submission_date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'fp_quiz_activate');

// Add admin menu for submissions
function fp_quiz_add_admin_pages() {
    add_submenu_page(
        'fp-quiz-settings',
        'Quiz Submissions',
        'Submissions',
        'manage_options',
        'fp-quiz-submissions',
        'fp_quiz_submissions_page'
    );
}
add_action('admin_menu', 'fp_quiz_add_admin_pages', 20);

// Submissions admin page
function fp_quiz_submissions_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'fp_quiz_submissions';
    $submissions = $wpdb->get_results("SELECT * FROM $table_name ORDER BY submission_date DESC");
    ?>
    <div class="wrap">
        <h1>Quiz Submissions</h1>
        <table class="wp-list-table widefat fixed striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Receives Texts</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($submissions as $sub): ?>
                <tr>
                    <td><?php echo $sub->id; ?></td>
                    <td><?php echo esc_html($sub->first_name . ' ' . $sub->last_name); ?></td>
                    <td><?php echo esc_html($sub->email); ?></td>
                    <td><?php echo esc_html($sub->phone); ?></td>
                    <td><?php echo $sub->receive_texts ? 'Yes' : 'No'; ?></td>
                    <td><?php echo date('M j, Y g:i a', strtotime($sub->submission_date)); ?></td>
                    <td>
                        <a href="#" class="view-submission" data-id="<?php echo $sub->id; ?>">View Details</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <!-- Submission Details Modal -->
        <div id="fp-submission-modal" style="display:none;">
            <div class="modal-content">
                <h2>Submission Details</h2>
                <div id="fp-submission-details"></div>
                <button class="button" onclick="jQuery('#fp-submission-modal').hide()">Close</button>
            </div>
        </div>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        $('.view-submission').click(function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            $.post(ajaxurl, {
                action: 'fp_quiz_get_submission',
                id: id,
                _wpnonce: '<?php echo wp_create_nonce('fp_quiz_view_nonce'); ?>'
            }, function(response) {
                if (response.success) {
                    $('#fp-submission-details').html(response.data);
                    $('#fp-submission-modal').show();
                }
            });
        });
    });
    </script>
    
    <style>
    #fp-submission-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.7);
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    #fp-submission-modal .modal-content {
        background: white;
        padding: 30px;
        border-radius: 5px;
        max-width: 800px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
    }
    </style>
    <?php
}

// AJAX handler for getting submission details
function fp_quiz_get_submission() {
    check_ajax_referer('fp_quiz_view_nonce', '_wpnonce');
    
    global $wpdb;
    $table_name = $wpdb->prefix . 'fp_quiz_submissions';
    $id = intval($_POST['id']);
    $submission = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id));
    
    if (!$submission) {
        wp_send_json_error('Submission not found');
    }
    
    $questions = get_option('fp_quiz_options')['questions'] ?? array();
    $answers = maybe_unserialize($submission->quiz_answers);
    
    $html = '<div class="submission-details">';
    $html .= '<p><strong>Name:</strong> ' . esc_html($submission->first_name . ' ' . $submission->last_name) . '</p>';
    $html .= '<p><strong>Email:</strong> ' . esc_html($submission->email) . '</p>';
    $html .= '<p><strong>Phone:</strong> ' . esc_html($submission->phone) . '</p>';
    $html .= '<p><strong>Receives Texts:</strong> ' . ($submission->receive_texts ? 'Yes' : 'No') . '</p>';
    $html .= '<p><strong>Submitted:</strong> ' . date('M j, Y g:i a', strtotime($submission->submission_date)) . '</p>';
    
    $html .= '<h3>Quiz Answers:</h3>';
    $html .= '<ul>';
    foreach ($answers as $index => $answer) {
        $question = isset($questions[$index]['text']) ? $questions[$index]['text'] : "Question " . ($index + 1);
        $html .= '<li><strong>' . esc_html($question) . ':</strong> ' . esc_html($answer) . '</li>';
    }
    $html .= '</ul>';
    $html .= '</div>';
    
    wp_send_json_success($html);
}
add_action('wp_ajax_fp_quiz_get_submission', 'fp_quiz_get_submission');

// Update the form submission handler to use the database table


// Create admin settings page
function fp_quiz_add_admin_menu() {
    add_menu_page(
        'Floor Plan Quiz Settings',
        'Floor Plan Quiz',
        'manage_options',
        'fp-quiz-settings',
        'fp_quiz_settings_page',
        'dashicons-forms',
        30
    );
}
add_action('admin_menu', 'fp_quiz_add_admin_menu');

// Register plugin settings
function fp_quiz_settings_init() {
    register_setting('fp_quiz_settings', 'fp_quiz_options');
    
    add_settings_section(
        'fp_quiz_section',
        'Quiz Settings',
        'fp_quiz_section_callback',
        'fp_quiz_settings'
    );
    
    add_settings_field(
        'trigger_button',
        'Trigger Button ID',
        'fp_quiz_trigger_button_render',
        'fp_quiz_settings',
        'fp_quiz_section'
    );
    
    add_settings_field(
        'questions',
        'Quiz Questions',
        'fp_quiz_questions_render',
        'fp_quiz_settings',
        'fp_quiz_section'
    );
    
    add_settings_field(
        'appearance',
        'Appearance Settings',
        'fp_quiz_appearance_render',
        'fp_quiz_settings',
        'fp_quiz_section'
    );
}
add_action('admin_init', 'fp_quiz_settings_init');

// Settings section callback
function fp_quiz_section_callback() {
    echo '<p>Configure your floor plan quiz popup settings below.</p>';
}

// Trigger button setting field
function fp_quiz_trigger_button_render() {
    $options = get_option('fp_quiz_options');
    ?>
    <input type="text" name="fp_quiz_options[trigger_button]" 
           value="<?php echo esc_attr($options['trigger_button'] ?? 'csacsac'); ?>" class="regular-text">
    <p class="description">The ID of the button that will trigger the quiz</p>
    <?php
}

// Questions setting field
function fp_quiz_questions_render() {
    $options = get_option('fp_quiz_options');
    $questions = isset($options['questions']) ? $options['questions'] : array(
        array('text' => 'Do you have any pets?', 'options' => 'Yes,No'),
        array('text' => 'Preferred budget range?', 'options' => '$500 - $1000,$1000 - $2000,$2000+'),
        array('text' => 'Number of bedrooms?', 'options' => '1,2,3+'),
        array('text' => 'Number of bathrooms?', 'options' => '1,2,3+'),
        array('text' => 'Preferred move-in date?', 'options' => 'ASAP,Within a month,Later')
    );
    ?>
    <div id="fp-quiz-questions-container">
        <?php foreach ($questions as $index => $question): ?>
        <div class="fp-quiz-question-group">
            <input type="text" name="fp_quiz_options[questions][<?php echo $index; ?>][text]" 
                   value="<?php echo esc_attr($question['text']); ?>" placeholder="Question text" class="widefat">
            <input type="text" name="fp_quiz_options[questions][<?php echo $index; ?>][options]" 
                   value="<?php echo esc_attr($question['options']); ?>" placeholder="Comma-separated options" class="widefat">
            <button type="button" class="button fp-quiz-remove-question">Remove Question</button>
        </div>
        <?php endforeach; ?>
    </div>
    <button type="button" id="fp-quiz-add-question" class="button">Add Question</button>
    <?php
}

// Appearance setting field
function fp_quiz_appearance_render() {
    $options = get_option('fp_quiz_options');
    ?>
    <p>
        <label>Primary Color:</label>
        <input type="color" name="fp_quiz_options[primary_color]" value="<?php echo esc_attr($options['primary_color'] ?? '#8B2F2F'); ?>">
    </p>
    <p>
        <label>Secondary Color:</label>
        <input type="color" name="fp_quiz_options[secondary_color]" value="<?php echo esc_attr($options['secondary_color'] ?? '#fbdada'); ?>">
    </p>
    <p>
        <label>Button Color:</label>
        <input type="color" name="fp_quiz_options[button_color]" value="<?php echo esc_attr($options['button_color'] ?? '#D9534F'); ?>">
    </p>
    <?php
}

// Admin settings page
function fp_quiz_settings_page() {
    ?>
    <div class="wrap">
        <h1>Floor Plan Quiz Settings</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('fp_quiz_settings');
            do_settings_sections('fp_quiz_settings');
            submit_button();
            ?>
        </form>
    </div>
    
    <script>
    jQuery(document).ready(function($) {
        // Add new question
        $('#fp-quiz-add-question').click(function() {
            var index = $('.fp-quiz-question-group').length;
            var html = `
                <div class="fp-quiz-question-group">
                    <input type="text" name="fp_quiz_options[questions][${index}][text]" placeholder="Question text" class="widefat">
                    <input type="text" name="fp_quiz_options[questions][${index}][options]" placeholder="Comma-separated options" class="widefat">
                    <button type="button" class="button fp-quiz-remove-question">Remove Question</button>
                </div>
            `;
            $('#fp-quiz-questions-container').append(html);
        });
        
        // Remove question
        $(document).on('click', '.fp-quiz-remove-question', function() {
            $(this).parent().remove();
        });
    });
    </script>
    <style>
/* Container styling */
#fp-quiz-questions-container {
    margin-top: 20px;
    padding: 10px;
    border: 1px solid #ccd0d4;
    background-color: #f9f9f9;
    border-radius: 4px;
}

/* Each question group block */
.fp-quiz-question-group {
    margin-bottom: 20px;
    padding: 15px;
    background: #fff;
    border: 1px solid #ccd0d4;
    border-left: 4px solid #007cba;
    border-radius: 4px;
}

/* Inputs */
.fp-quiz-question-group input[type="text"] {
    margin-bottom: 10px;
    display: block;
}

/* Remove button */
.fp-quiz-remove-question {
    margin-top: 5px;
    background: #ca4a1f;
    color: #fff;
    border-color: #b32d00;
}

.fp-quiz-remove-question:hover {
    background: #b32d00;
    border-color: #993300;
    color: #fff;
}

/* Add question button */
#fp-quiz-add-question {
    margin-top: 10px;
    background-color: #007cba;
    color: #fff;
    border-color: #007cba;
}

#fp-quiz-add-question:hover {
    background-color: #006ba1;
    border-color: #006ba1;
    color: #fff;
}
</style>

    <?php
}

// Add the quiz HTML to footer
function fp_quiz_add_to_footer() {
    ?>
    <!-- Start Quiz Popup -->
    <div class="fp-quiz-overlay" id="fpQuizStartOverlay">
        <div class="fp-quiz-start-popup">
            <h2>Start the Quiz</h2>
            <button class="fp-quiz-next-btn" id="fpQuizStartButton">Start</button>
        </div>
    </div>

    <!-- Quiz Modal -->
    <div class="fp-quiz-overlay" id="fpQuizContainer">
        <div class="fp-quiz-modal">
            <button class="fp-quiz-close-btn" id="fpQuizCloseButton">×</button>
            <div class="fp-quiz-left" id="fpQuizLeft">
                <div class="fp-quiz-question" id="fpQuizQuestionText"></div>
                <div class="fp-quiz-options" id="fpQuizOptionsContainer"></div>
                <div id="fpQuizButtonArea">
                    <button class="fp-quiz-next-btn" id="fpQuizNextButton">Next</button>
                    <button class="fp-quiz-next-btn" id="fpQuizPrevButton">Previous</button>
                    <button class="fp-quiz-next-btn" id="fpQuizResetButton">Reset</button>
                </div>
            </div>
            <div class="fp-quiz-right">
                <div class="fp-quiz-preferences">
                    <h3>YOUR PREFERENCES</h3>
                    <div id="fpQuizSelectedAnswers"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_action('wp_footer', 'fp_quiz_add_to_footer');

// // Handle form submission
// function fp_quiz_handle_submission() {
//     check_ajax_referer('fp-quiz-nonce', 'nonce');
    
//     $data = array(
//         'first_name' => sanitize_text_field($_POST['first_name']),
//         'last_name' => sanitize_text_field($_POST['last_name']),
//         'email' => sanitize_email($_POST['email']),
//         'phone' => sanitize_text_field($_POST['phone']),
//         'receive_texts' => isset($_POST['receive_texts']) ? 1 : 0,
//         'quiz_answers' => isset($_POST['quiz_answers']) ? $_POST['quiz_answers'] : array(),
//         'date' => current_time('mysql')
//     );
//     // print_r($data);
    
//     // Save to database
//     // $submissions = get_option('fp_quiz_submissions', array());
//     // $submissions[] = $data;
//     // update_option('fp_quiz_submissions', $submissions);
    
//     // // Send email notification
//     // $to = get_option('admin_email');
//     // $subject = 'New Floor Plan Quiz Submission';
//     // $message = "New submission from floor plan quiz:\n\n";
//     // $message .= "Name: {$data['first_name']} {$data['last_name']}\n";
//     // $message .= "Email: {$data['email']}\n";
//     // $message .= "Phone: {$data['phone']}\n";
//     // $message .= "Receives texts: " . ($data['receive_texts'] ? 'Yes' : 'No') . "\n\n";
//     // $message .= "Quiz Answers:\n";
    
//     // $questions = get_option('fp_quiz_options')['questions'] ?? array();
//     // foreach ($data['quiz_answers'] as $index => $answer) {
//     //     $question = isset($questions[$index]['text']) ? $questions[$index]['text'] : "Question $index";
//     //     $message .= "$question: $answer\n";
//     // }
    
//     // wp_mail($to, $subject, $message);
    
//     wp_send_json_success('Submission received!');
//     wp_die();
// }
// add_action('wp_ajax_fp_quiz_submit', 'fp_quiz_handle_submission');
// add_action('wp_ajax_nopriv_fp_quiz_submit', 'fp_quiz_handle_submission');




// Handle form submission
function fp_quiz_handle_submission() {
    // check_ajax_referer('fp-quiz-nonce', 'nonce');
    
    $data = array(
        'first_name' => sanitize_text_field($_POST['first_name']),
        'last_name' => sanitize_text_field($_POST['last_name']),
        'email' => sanitize_email($_POST['email']),
        'phone' => sanitize_text_field($_POST['phone']),
        'receive_texts' => isset($_POST['receive_texts']) ? 1 : 0,
        'quiz_answers' => isset($_POST['quiz_answers']) ? $_POST['quiz_answers'] : array(),
        'date' => current_time('mysql')
    );
    error_log('Data details are: '.$data);
    // Generate a unique submission ID
    $submission_id = 'fp_quiz_submission_' . uniqid();
    set_transient($submission_id, $data, 3600); // Store for 1 hour

    // Get the results page URL (replace 'results-page-slug' with your actual page slug)
    $results_page_url = get_permalink(get_page_by_path('results-page'));
    $redirect_url = add_query_arg('submission_id', $submission_id, $results_page_url);

    wp_send_json_success(array(
        'message' => 'Submission received!',
        'redirect_url' => $redirect_url
    ));
    wp_die();
}
add_action('wp_ajax_fp_quiz_submit', 'fp_quiz_handle_submission');
add_action('wp_ajax_nopriv_fp_quiz_submit', 'fp_quiz_handle_submission');

// Shortcode to display submission data
function fp_quiz_display_submission($atts) {
    // print_r($atts);
    // Get submission ID from URL or shortcode attribute
    $submission_id = isset($_GET['submission_id']) ? sanitize_text_field($_GET['submission_id']) : '';
// echo  $submission_id;
    if (empty($submission_id) && isset($atts['id'])) {
        $submission_id = sanitize_text_field($atts['id']);
    }

    if (empty($submission_id)) {
        return '<p>No submission data found.</p>';
    }

    // Retrieve data from transient
    $data = get_transient($submission_id);

    if (false === $data) {
        return '<p>Submission data has expired or does not exist.</p>';
    }
    // echo "<pre>this is the quiz answers";
    // print_r($data['quiz_answers']);

    // echo "</pre>";

    // $value1 = $data['quiz_answers'][0];
    // $value2 = $data['quiz_answers'][1];
    // $value3 = $data['quiz_answers'][2];
    // $value4 = $data['quiz_answers'][3];
    // Generate HTML output
    $output = '<div class="quiz-submission-results">';
    // $output .= '<h2>Your Quiz Results</h2>';
    // $output .= '<table class="quiz-data-table">';
    
    // foreach ($data as $key => $value) {
    //     $label = ucwords(str_replace('_', ' ', $key));
    //     $output .= '<tr>';
    //     $output .= '<th>' . esc_html($label) . '</th>';
        
    //     if (is_array($value)) {
    //         $value = implode(', ', $value);

    //     }
        
    //     $output .= '<td>' . esc_html($value) . '</td>';
    //     $output .= '</tr>';
    // }
    
    // $output .= '</table>';
    $serialized = maybe_serialize($data['quiz_answers']);
    // $serialized = maybe_serialize($quiz_answers_array);
    $encoded = base64_encode($serialized);
    // $output .= do_shortcode('[display_units]');
    // $output .= do_shortcode('[display_units quiz_answers="' . esc_attr($data['quiz_answers']) . '"]');
    $output .= do_shortcode('[display_units quiz_answers="' . esc_attr($encoded) . '"]');
    $output .= '</div>';

    return $output;
}
add_shortcode('fp_quiz_submission', 'fp_quiz_display_submission');

function filter_units() {
    $token = get_rentmanager_token();
    
    // Get filters from POST
    $search = sanitize_text_field($_POST['search'] ?? '');
    $bedrooms = sanitize_text_field($_POST['bedrooms'] ?? '');
    $price_max = intval($_POST['price'] ?? 99999);
    $movein = isset($_POST['movein']) ? sanitize_text_field($_POST['movein']) : '';
    $affordable_only = isset($_POST['affordable_only']) ? filter_var($_POST['affordable_only'], FILTER_VALIDATE_BOOLEAN) : false;
    $page = intval($_POST['page'] ?? 1);
    $per_page = 9; // Set to desired value

    // API Requests
    $response1 = wp_remote_get('https://feldman.api.rentmanager.com/Units/OnlineListings?filters=PropertyID,eq,124', array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-RM12Api-ApiToken' => $token
        )
    ));

    $response2 = wp_remote_get('https://feldman.api.rentmanager.com/Units?filters=PropertyID,eq,124&embeds=Images.File', array(
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-RM12Api-ApiToken' => $token
        )
    ));

    // Deauthorize after use
    deauthorize_rentmanager_token();

    // Check for errors
    if (is_wp_error($response1) || is_wp_error($response2)) {
        wp_send_json_error('Error fetching units');
    }

    // Decode responses
    $data1 = json_decode(wp_remote_retrieve_body($response1), true);
    $data2 = json_decode(wp_remote_retrieve_body($response2), true);

    // Merge units by UnitID
    $indexed_units = array();

    foreach ($data1 as $unit) {
        $unit_id = $unit['UnitID'];
        $indexed_units[$unit_id] = $unit;
    }

    foreach ($data2 as $unit) {
        $unit_id = $unit['UnitID'];
        if (isset($indexed_units[$unit_id])) {
            $indexed_units[$unit_id] = array_merge($indexed_units[$unit_id], $unit);
        } else {
            $indexed_units[$unit_id] = $unit;
        }
    }

    $merged_units = array_values($indexed_units);

    // Sort (optional)
    usort($merged_units, function($a, $b) {
        return $a['UnitID'] <=> $b['UnitID'];
    });

    // Apply filters
    $filtered_units = array_filter($merged_units, function($unit) use ($search, $bedrooms, $price_max, $affordable_only) {
        if ($search && stripos($unit['UnitName'] ?? '', $search) === false) return false;
        if ($bedrooms && (!isset($unit['Bedrooms']) || $unit['Bedrooms'] != $bedrooms)) return false;
        if ($price_max && (!isset($unit['Price']) || $unit['Price'] > $price_max)) return false;
        if ($affordable_only && (stripos($unit['Comment'] ?? '', 'affordable') === false)) return false;
        return true;
    });

    $total_units = count($filtered_units);
    $total_pages = $per_page > 0 ? ceil($total_units / $per_page) : 1;

    // Paginate results
    if ($per_page > 0) {
        $offset = ($page - 1) * $per_page;
        $filtered_units = array_slice($filtered_units, $offset, $per_page);
    }

    // Start capturing output
    ob_start();
    

    if (empty($filtered_units)) {
        echo '<div class="no-results">No units found matching your filters.</div>';
    } else {
   //echo "<pre>";
   //print_r($filtered_units);
    
    
    
    // Get the excluded unit names from settings
$excluded_unit_names = get_option('excluded_unit_names', '');
$excluded_units_array = array();

if (!empty($excluded_unit_names)) {
    // Split by new lines and trim each line
    $excluded_units_array = array_map('trim', explode("\n", $excluded_unit_names));
    $excluded_units_array = array_filter($excluded_units_array); // Remove empty lines
}

// Filter the units array
if (!empty($excluded_units_array)) {
    $filtered_units_after_exc = array_filter($filtered_units, function($unit) use ($excluded_units_array) {
        return !in_array($unit['UnitName'], $excluded_units_array);
    });
}

//echo "<pre>--------------------------------------------";
  // print_r($filtered_units_after_exc);


        //echo '<div class="results-count">Found ' . $total_units . ' ' . ($total_units === 1 ? 'unit' : 'units') . '</div>';
        ?>
        <div class="residence-main-aection">
        <div class="residence-container">
            <div class="residence-section">
        <?php foreach ($filtered_units_after_exc as $unit) { 
        	  
        ?>
            <div class="residence-card">
                <?php
$default_image = "https://threaddc.com/wp-content/uploads/2025/02/the-shaw-map-1024x637.png";
$image_url = !empty($unit['Images'][0]['File']['DownloadURL']) ? $unit['Images'][0]['File']['DownloadURL'] : $default_image;
$unique_id = 'popup_' . uniqid(); // to avoid duplicate IDs
?>

<a href="javascript:void(0);" onclick="document.getElementById('<?php echo $unique_id; ?>').showModal();">
    <img src="<?php echo esc_url($image_url); ?>" alt="Unit Image" style="max-width:200px;" />
</a>

<dialog id="<?php echo $unique_id; ?>" style="border: none; padding: 0; background: transparent;">
    <div style="position: relative; display: inline-block; background:#fff">
        <img src="<?php echo esc_url($image_url); ?>" alt="Full Image" style="" />
        <button onclick="document.getElementById('<?php echo $unique_id; ?>').close();" style="position: absolute; top: 10px; right: 10px; background: black; color: white; border: none; padding: 5px 10px; cursor: pointer;">Close</button>
    </div>
</dialog>
                <div class="residence-info">
                    <h3><?php echo esc_html($unit['UnitName']); ?></h3>
                    <p>
                        <?php echo esc_html($unit['Bedrooms']); ?> bedroom |
                        <?php echo (int)$unit['Bathrooms']; ?> bath |
                        <?php echo !empty($unit['SquareFootage']) ? esc_html($unit['SquareFootage']) : 'N/A'; ?> SF
                    </p>
                    <p>$<?php echo esc_html($unit['Price']); ?></p>
                    <a href="https://feldman.twa.rentmanager.com/applynow" class="residence-btn">GET YOUR SPACE</a>
                </div>
            </div>
        <?php } ?>
            </div>
        </div>
        </div>
        <?php
    }

    $html = ob_get_clean();

    // Pagination HTML
    ob_start();
    if ($total_pages > 1) {
        echo '<div class="pagination-links">';
        if ($page > 1) {
            echo '<a href="#" class="page-link" data-page="' . ($page - 1) . '">« Previous</a> ';
        }

        $start = max(1, $page - 2);
        $end = min($total_pages, $page + 2);

        for ($i = $start; $i <= $end; $i++) {
            if ($i == $page) {
                echo '<span class="current">' . $i . '</span> ';
            } else {
                echo '<a href="#" class="page-link" data-page="' . $i . '">' . $i . '</a> ';
            }
        }

        if ($page < $total_pages) {
            echo '<a href="#" class="page-link" data-page="' . ($page + 1) . '">Next »</a>';
        }
        echo '</div>';
    }
    $pagination = ob_get_clean();

    // Return AJAX response
    wp_send_json_success(array(
        'html' => $html,
        'pagination' => $pagination,
        'count' => $total_units
    ));
}
add_action('wp_ajax_filter_units', 'filter_units');
add_action('wp_ajax_nopriv_filter_units', 'filter_units');


function fetch_rentmanager_properties($atts) {
    global $token;
    $atts = shortcode_atts(array(
        'bedrooms' => '',
    ), $atts);

    $bedrooms_filter = intval($atts['bedrooms']);

    // Initialize CURL
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://feldman.api.rentmanager.com/Units/OnlineListings?filters=PropertyID,eq,124',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'X-RM12Api-ApiToken: ' . $token // Use the dynamic token here
        ),
    ));

    $response = curl_exec($curl);
    curl_close($curl);

    if (!$response) {
        return '<p>Error fetching data.</p>';
    }

    $properties = json_decode($response, true);

    if (!is_array($properties)) {
        return '<p>Invalid response from API.</p>';
    }

    // Filter properties based on bedrooms
    $filtered = array_filter($properties, function ($property) use ($bedrooms_filter) {
        return isset($property['Bedrooms']) && intval($property['Bedrooms']) === $bedrooms_filter;
    });

    // Limit to 3 properties
    $filtered = array_slice($filtered, 0, 3);

    if (empty($filtered)) {
        return '<p>No properties found.</p>';
    }

    // // Build HTML output
    // $output = '<div class="rentmanager-properties">';
    // foreach ($filtered as $unit) {
    //     $output .= '<div class="property" style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">';
    //     $output .= '<h3>' . esc_html($unit['UnitName']) . '</h3>';
    //     $output .= '<p><strong>Bedrooms:</strong> ' . esc_html($unit['Bedrooms']) . '</p>';
    //     $output .= '<p><strong>Bathrooms:</strong> ' . esc_html($unit['Bathrooms']) . '</p>';
    //     $output .= '<p><strong>Rent:</strong> $' . esc_html($unit['Price']) . '</p>';
    //     if (!empty($unit['MarketingURL'])) {
    //         $output .= '<p><a href="' . esc_url($unit['MarketingURL']) . '" target="_blank">View Details</a></p>';
    //     }
    //     $output .= '</div>';
    // }
    // $output .= '</div>';




    $output = '<div class="residence-main-aection">
        <div class="residence-container">
            <div class="residence-section">';
            foreach ($filtered as $unit) {

                $output .= '<div class="residence-card">';
                    $output .= '<img src="https://threaddc.com/wp-content/uploads/2025/02/the-shaw-map-1024x637.png" alt="Map Image">';
                    $output .= '<div class="residence-info">';
                        $output .= '<h3>' . esc_html($unit['UnitName']) . '</h3>';
                        $output .= '<p>' . esc_html($unit['Bedrooms']) . ' bedroom | ' . esc_html($unit['Bathrooms']) . ' bath </p>';
                        $output .= '<p>Starting at $' . esc_html($unit['Price']) . '</p>';
                        $output .= '<a href="https://feldman.twa.rentmanager.com/applynow" class="residence-btn">GET YOUR SPACE</a>';
                    $output .= '</div>';
                $output .= '</div>';

}
    $output .= '</div> </div> </div>'; 

    return $output;
}
add_shortcode('rentmanager_properties', 'fetch_rentmanager_properties');






function fetch_api_data($url) {
    //global $token;
    $token = get_rentmanager_token();
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'X-RM12Api-ApiToken: ' . $token // Use the dynamic token here
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    
    $data = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log('API Error: Invalid JSON response from ' . $url);
        return [];
    }
    
    if (!is_array($data)) {
        error_log('API Error: Unexpected response format from ' . $url);
        return [];
    }
    
    return $data;
}

function display_combined_units_data_shortcode($atts) {
    // Set default shortcode attributes
    $atts = shortcode_atts([
        'bedrooms' => '', // Default: show all (empty string)
        'limit' => 3      // Default: show 3 properties
    ], $atts, 'display_units_data');

    $listings_data = fetch_api_data('https://feldman.api.rentmanager.com/Units/OnlineListings?filters=PropertyID,eq,124');
    $units_data = fetch_api_data('https://feldman.api.rentmanager.com/Units?filters=PropertyID,eq,124');

    $combined_data = [];

    if (is_array($units_data)) {
        $units_by_id = [];
        foreach ($units_data as $unit) {
            if (is_array($unit) && isset($unit['UnitID'])) {
                $units_by_id[$unit['UnitID']] = $unit;
            }
        }

        if (is_array($listings_data)) {
            foreach ($listings_data as $listing) {
                if (is_array($listing) && isset($listing['UnitID'])) {
                    $unit_id = $listing['UnitID'];
                    if (isset($units_by_id[$unit_id])) {
                        $combined_data[] = array_merge($units_by_id[$unit_id], $listing);
                    } else {
                        $combined_data[] = $listing;
                    }
                }
            }
        }
    }

    // Filter by bedrooms if parameter is set
    if (!empty($atts['bedrooms'])) {
        $combined_data = array_filter($combined_data, function($unit) use ($atts) {
            return isset($unit['Bedrooms']) && $unit['Bedrooms'] == $atts['bedrooms'];
        });
    }

    // Limit the number of results
    $combined_data = array_slice($combined_data, 0, $atts['limit']);

    if (empty($combined_data)) {
        return '<div class="error">No matching units found.</div>';
    }

    ob_start();
    ?>
    <div class="residence-main-aection">
        <div class="residence-container">
            <div class="residence-section">
                <?php foreach ($combined_data as $unit): ?>
                    <?php 
                       $unit_name = $unit['UnitName'];
                        //$parts = explode('-', $unit_name);
                        $parts = preg_split('/-\s*/', $unit_name);
                        $last_part = end($parts);

                        // Construct your image URL
                        $image_path = '/wp-content/uploads/2025/04/' . esc_attr($last_part) . '.png';
                        $image_url = site_url($image_path);

                        // Fallback image URL
                        $fallback_image = 'https://threaddc.com/wp-content/uploads/2025/02/the-shaw-map-1024x637.png';

                        // Use get_headers to check if the image exists
                        $response = @get_headers($image_url);
                        $final_image_url = (is_array($response) && strpos($response[0], '200') !== false) ? $image_url : $fallback_image;
                        
                    ?>
                    <div class="residence-card">
                        <img src="<?php echo esc_url($final_image_url); ?>" alt="Map Image">
                        <div class="residence-info">
                            <h3><?php echo esc_html($unit['UnitName']); ?></h3>
                            <p><?php echo esc_html($unit['Bedrooms']); ?> bedroom | <?php echo (int)$unit['Bathrooms'];?> bath | <?php echo !empty($unit['SquareFootage']) ? esc_html($unit['SquareFootage']) : 'N/A'; ?> SF </p>
                            <p>$<?php echo esc_html($unit['Price']); ?></p>
                            <a href="https://feldman.twa.rentmanager.com/applynow" class="residence-btn">GET YOUR SPACE</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div> 
        </div> 
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('display_units_data', 'display_combined_units_data_shortcode');



// AJAX handler for property filtering
add_action('wp_ajax_filter_properties', 'ajax_filter_properties');
add_action('wp_ajax_nopriv_filter_properties', 'ajax_filter_properties');

function ajax_filter_properties() {
    $filters = isset($_POST['filters']) ? $_POST['filters'] : [];
    
    // Sanitize filters
    $sanitized_filters = [
        'bedrooms' => isset($filters['bedrooms']) ? sanitize_text_field($filters['bedrooms']) : '',
        'max_rent' => isset($filters['max_rent']) ? intval($filters['max_rent']) : '',
        'apartment_number' => isset($filters['apartment_number']) ? sanitize_text_field($filters['apartment_number']) : '',
        'limit' => isset($filters['limit']) ? intval($filters['limit']) : 3
    ];
    
    echo generate_properties_html($sanitized_filters);
    wp_die();
}


function get_rentmanager_token() {
    static $tokenapi = null;

    if ($tokenapi !== null) {
        return $tokenapi;
    }

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://feldman.api.rentmanager.com/Authentication/AuthorizeUser',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
            'username' => 'jean-luc',
            'password' => 'Carel123!',
        ]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    $curl_error = curl_error($curl);
    curl_close($curl);

    if (!$response) {
        error_log('RentManager API Error: ' . $curl_error);
        return false;
    }

    $data = json_decode($response, true);

    if ($data) {
        $tokenapi = $data;
        $GLOBALS['rentmanager_token_data'] = $data; // 🔁 Store globally
        error_log('RentManager Token: ' . $data);
        return $data;
    }

    error_log('RentManager Token Fetch Failed. Response: ' . print_r($data, true));
    return false;
}




function deauthorize_rentmanager_token() {
    // 🔁 Use global token data
    $data = isset($GLOBALS['rentmanager_token_data']) ? $GLOBALS['rentmanager_token_data'] : null;

    if (!$data) {
        error_log('Deauthorization failed: Token not available.');
        return false;
    }

    $token = urlencode($data);
    $url = "https://feldman.api.rentmanager.com/Authentication/Deauthorize?token={$token}";

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode([
            'username' => 'jean-luc',
            'password' => 'Carel123!',
        ]),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    ));

    $response = curl_exec($curl);
    $curl_error = curl_error($curl);
    curl_close($curl);

    if (!$response) {
        error_log('Deauthorization Error: ' . $curl_error);
        return false;
    }

    error_log('Deauthorization Response: ' . $response);
    return $response;
}


add_action('wp_footer', function () {
    if (current_user_can('administrator')) {
        $response = deauthorize_rentmanager_token();
        //echo '<pre>Deauthorization Response: ' . esc_html($response) . '</pre>';
    }
});




function simple_unit_filters() {

    $quiz_defaults = [
        'pets' => isset($quiz_answers[0]) ? 1 : '',
        'budget' => isset($quiz_answers[1]) ? 1 : '',
        'bedrooms' => isset($quiz_answers[2]) ? 1 : '',
        'bathrooms' => isset($quiz_answers[3]) ? 1 : '',
        'moveindate' => isset($quiz_answers[4]) ? 4 : '',
    ];
    // Pass quiz values to JavaScript
    wp_localize_script('fp-quiz-script', 'RentManagerQuiz', $quiz_defaults);

    if (is_array($quiz_answers)) {
        ?>

   <div id="unit-filters" style="margin-bottom: 20px;">
        <select id="filter-property"><option value="">All Properties</option></select>
        <select id="filter-bedrooms"><option value="">All Bedrooms</option></select>
        <select id="filter-bathrooms"><option value="">All Bathrooms</option></select>
        <select id="filter-price"><option value="">All Prices</option></select>
    </div>

    <table id="unit-table" border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Unit</th>
                <th>Address</th>
                <th>Bedrooms</th>
                <th>Bathrooms</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

        <?php
    } else {
        // echo '<p>Unserialization failed. Not an array.</p>';
    
    // wp_enqueue_script('units-filter', plugin_dir_url(__FILE__) . '/js/units-filter.js', array('jquery'), '1.0', true);
    wp_localize_script('units-filter', 'units_vars', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));

    ob_start();
    ?>
 
    <div class="units-filter-container">
        <div class="filter-controls">
            
            
        
            <div id="bedrooms-filter" class="bedroom-buttons">
                <button class="bedroom-filter-btn active" data-bedrooms="">All</button>
                <button class="bedroom-filter-btn" data-bedrooms="1">1 Bed</button>
                <button class="bedroom-filter-btn" data-bedrooms="2">2 Bed</button>
                <button class="bedroom-filter-btn" data-bedrooms="3">3 Bed</button>
            </div>

       
            <div class="filters-main-right"><div class="date-filter">
                <label for="movein-filter">Move-in Date:</label>
                <input type="date" id="movein-filter" class="filter-input">
            </div>

            <div class="price-filter">
                <label>Max Rent</label>
                <input type="number" id="price-max" placeholder="Max" class="filter-input small">
            </div>
            <input type="text" id="unit-search" placeholder="Search by APT#" class="filter-input">
        </div>
        </div>
        
        <div id="units-loading" style="display:none;">Loading...</div>
        <div id="units-container" class="units-grid"></div>
        <div id="units-pagination" class="units-pagination"></div>
    </div>
    <?php
    return ob_get_clean();
    }
}
add_shortcode('simple_unit_filters', 'simple_unit_filters');