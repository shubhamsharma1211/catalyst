<?php
/**
 * Helper class for settings.
 *
 * @link    https://wpmudev.com
 * @since   1.7.0
 *
 * @author  Joel James <joel@incsub.com>
 * @package WPMUDEV_Videos\Core\Helpers
 */

namespace WPMUDEV_Videos\Core\Helpers;

// If this file is called directly, abort.
defined( 'WPINC' ) || die;

/**
 * Class Settings
 *
 * @package WPMUDEV_Videos\Core\Helpers
 */
class Settings {

	/**
	 * Settings key name.
	 *
	 * @since 1.8.0
	 */
	const KEY = 'wpmudev_vids_settings';

	/**
	 * Settings page sections and fields.
	 *
	 * @var array $sections
	 *
	 * @since 1.8.0
	 */
	private static $fields = array(
		'show_menu'              => true,
		'menu_title'             => '',
		'menu_location'          => 'dashboard',
		'contextual_help'        => false,
		'roles'                  => array(),
		'hide'                   => array(),
		'default_contents'       => false,
		'dismiss_dash_notice'    => false,
		'dismiss_welcome_notice' => true,
		'keep_settings'          => true,
		'keep_data'              => true,
		'dismiss_bf_notice'      => false,
	);

	/**
	 * Get a single setting value from db.
	 *
	 * Easy way to get to our settings array without undefined indexes.
	 *
	 * @param string|bool $key     Setting key.
	 * @param mixed       $default Default value.
	 *
	 * @since 1.5
	 * @since 1.8 Added capability get the whole settings.
	 *
	 * @return mixed|void
	 */
	public static function get( $key = false, $default = false ) {
		// Get settings.
		$settings = get_site_option( self::KEY, array() );

		if ( empty( $key ) ) {
			$value = $settings;
		} else {
			// Make sure the default value is returned if that key doesn't exist.
			$value = isset( $settings[ $key ] ) ? $settings[ $key ] : $default;
		}

		/**
		 * Filter to modify a setting value.
		 *
		 * @param mixed $setting Value.
		 * @param mixed $key     Key.
		 * @param mixed $default Default value.
		 *
		 * @since 1.7
		 */
		return apply_filters( 'wpmudev_vids_setting_get', $value, $key, $default );
	}

	/**
	 * Update a setting value in options table.
	 *
	 * @note  If the key is not specified we will overwrite
	 *       the complete data with the value provided.
	 *
	 * @param string|bool $key   Setting key.
	 * @param mixed       $value Setting value.
	 *
	 * @since 1.7
	 * @since 1.8 Added capability update whole settings.
	 * @since 1.8.8 Changed param positions.
	 *
	 * @return bool
	 */
	public static function set( $key, $value ) {
		// Settings values.
		$settings = self::get();

		// No need to update if values are same.
		if ( $settings === $value || ( isset( $settings[ $key ] ) && $settings[ $key ] === $value ) ) {
			$updated = true;
		} else {
			if ( empty( $key ) && is_array( $value ) ) {
				$settings = $value;
			} elseif ( isset( self::$fields[ $key ] ) ) {
				// Update single one.
				$settings[ $key ] = $value;
			}

			// Update the value in settings.
			$updated = update_site_option( self::KEY, $settings );
		}

		if ( $updated ) {
			/**
			 * Action hook to run after plugin settings has been updated.
			 *
			 * @since 1.7
			 */
			do_action( 'wpmudev_vids_after_update_settings' );
		}

		return $updated;
	}

	/**
	 * Delete the plugin settings from DB.
	 *
	 * This will not remove videos and playlists.
	 *
	 * @since 1.8.1
	 *
	 * @return bool
	 */
	public static function delete() {
		// Settings values.
		// Update the value in settings.
		$deleted = delete_site_option( self::KEY );

		if ( $deleted ) {
			/**
			 * Action hook to run after plugin settings has been deleted.
			 *
			 * @since 1.8.1
			 */
			do_action( 'wpmudev_vids_after_delete_settings' );
		}

		return $deleted;
	}

	/**
	 * Get the default settings data.
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	public static function get_default() {
		// Default settings values.
		$settings = self::$fields;

		/**
		 * Filter to include or exclude settings item.
		 *
		 * @param array $settings Settings data.
		 *
		 * @since 1.8.0
		 */
		return apply_filters( 'wpmudev_vids_get_settings_default', $settings );
	}

	/**
	 * Get the settings data with default settings replaced for empty ones.
	 *
	 * Use this function if you want to get the full structure of the currently
	 * available settings data. If some values are not set, we will use the default
	 * value instead.
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	public static function get_with_default() {
		// Settings values.
		$settings = self::get();

		// Merge with default options if empty.
		foreach ( self::$fields as $key => $value ) {
			if ( ! isset( $settings[ $key ] ) ) {
				$settings[ $key ] = $value;

				// Menu title should not be empty.
				if ( 'menu_title' === $key ) {
					$settings[ $key ] = __( 'Video Tutorials', 'wpmudev_vids' );
				}
			}
		}

		/**
		 * Filter to include or exclude settings item.
		 *
		 * @param array $settings Settings data.
		 *
		 * @since 1.8.0
		 */
		return apply_filters( 'wpmudev_vids_get_settings_with_default', $settings );
	}
}