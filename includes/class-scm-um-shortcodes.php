<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class SCM_UM_Shortcodes {
    public function login_form() {
        if ( is_user_logged_in() ) {
            return '<p>You are already logged in.</p>';
        }
        ob_start();
        wp_login_form([
            'redirect' => home_url('/account/'),
        ]);
        return ob_get_clean();
    }

    public function registration_form() {
        if ( is_user_logged_in() ) {
            return '<p>You are already registered and logged in.</p>';
        }
        ob_start();
        ?>
        <form action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
            <p><label for="scm_username">Username</label><br/>
            <input type="text" name="scm_username" required></p>
            <p><label for="scm_email">Email</label><br/>
            <input type="email" name="scm_email" required></p>
            <p><label for="scm_password">Password</label><br/>
            <input type="password" name="scm_password" required></p>
            <p><input type="submit" name="scm_register_submit" value="Register"/></p>
        </form>
        <?php
        return ob_get_clean();
    }

    public function account_page() {
        if ( ! is_user_logged_in() ) {
            wp_redirect(home_url('/account/login/'));
            exit;
        }
        return '<h2>Account Details</h2><p>Welcome, ' . wp_get_current_user()->display_name . '</p>';
    }

    public function settings_page() {
        if ( ! is_user_logged_in() ) {
            wp_redirect(home_url('/account/login/'));
            exit;
        }
        return '<h2>Account Settings</h2><p>Settings page content goes here.</p>';
    }

    public function protected_content($atts, $content = null) {
        if ( is_user_logged_in() ) {
            return do_shortcode($content);
        } else {
            wp_redirect(home_url('/account/login/'));
            exit;
        }
    }
}
