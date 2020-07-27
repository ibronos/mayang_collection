<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 4.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<div class="row" id="customer_login">

	<div class="col-md-6 pb-1">
		<div class="card">
		  <div class="card-header">
		    <?php esc_html_e( 'Login', 'woocommerce' ); ?>
		  </div>
		  <div class="card-body">
  				<form class="woocommerce-form woocommerce-form-login login" method="post">
					<?php do_action( 'woocommerce_login_form_start' ); ?>
					<div class="form-group">
						<label for="username">
							<?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>
							&nbsp;<span class="required">*</span>
						</label>
						<input type="text" class="form-control" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
						<?php // @codingStandardsIgnoreLine ?>
					</div>
					<div class="form-group">
						<label for="password">
							<?php esc_html_e( 'Password', 'woocommerce' ); ?>
							&nbsp;<span class="required">*</span>
						</label>
						<input class="form-control woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
					</div>

					<?php do_action( 'woocommerce_login_form' ); ?>

					  <div class="form-check">
					    <input type="checkbox" class="form-check-input" id="login-form" name="rememberme" value="forever">
					    <label class="form-check-label" for="login-form">
					    	<?php esc_html_e( 'Remember me', 'woocommerce' ); ?>
					    </label>
					  </div>
  					<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>

						<button type="submit" class="btn btn-primary woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>">
							<?php esc_html_e( 'Log in', 'woocommerce' ); ?>	
						</button>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>
		  </div>
		  <div class="card-footer">
				<p class="woocommerce-LostPassword lost_password">
					<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
				</p>
		  </div>
		</div>
	</div>


<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>
	<div class="col-md-6 pb-2">
		<div class="card">
		  <div class="card-header">
		    <?php esc_html_e( 'Register', 'woocommerce' ); ?>
		  </div>
		  <div class="card-body">
  				<form method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

					<?php do_action( 'woocommerce_register_form_start' ); ?>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

						<div class="form-group">
							<label for="reg_username">
								<?php esc_html_e( 'Username', 'woocommerce' ); ?>
								&nbsp;<span class="required">*</span>
							</label>
							<input type="text" class="form-control" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" />
						</div>

					<?php endif; ?>

					<div class="form-group">
						<label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>
							&nbsp;
							<span class="required">*</span>
						</label>
						<input type="email" class="form-control" name="email" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" />
						<?php // @codingStandardsIgnoreLine ?>
					</div>

					<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

						<div class="form-group">
							<label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span class="required">*</span></label>
							<input type="password" class="form-control" name="password" id="reg_password" autocomplete="new-password" />
						</div>

					<?php else : ?>

						<p class="text-muted"><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

					<?php endif; ?>

					<?php do_action( 'woocommerce_register_form' ); ?>

					<p class="woocommerce-form-row form-row">
						<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
						<button type="submit" class="btn btn-primary" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>">
							<?php esc_html_e( 'Register', 'woocommerce' ); ?>		
						</button>
					</p>

					<?php do_action( 'woocommerce_register_form_end' ); ?>

				</form>
		  </div>
		</div>
	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>