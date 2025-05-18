<?php
/**
 * Alipay Payment Method Definition
 *
 * @package WCPay\PaymentMethods\Configs\Definitions
 */

namespace WCPay\PaymentMethods\Configs\Definitions;

use WCPay\PaymentMethods\Configs\Interfaces\PaymentMethodDefinitionInterface;
use WCPay\PaymentMethods\Configs\Constants\PaymentMethodCapability;
use WCPay\Constants\Country_Code;
use WCPay\Constants\Currency_Code;
use WCPay\PaymentMethods\Configs\Utils\PaymentMethodUtils;

/**
 * Class implementing the Alipay payment method definition.
 */
class AlipayDefinition implements PaymentMethodDefinitionInterface {

	/**
	 * Get the internal ID for the payment method
	 *
	 * @return string
	 */
	public static function get_id(): string {
		return 'alipay';
	}

	/**
	 * Get the keywords for the payment method. These are used by the duplicates detection service.
	 *
	 * @return string[]
	 */
	public static function get_keywords(): array {
		return [ 'alipay' ];
	}

	/**
	 * Get the Stripe payment method ID
	 *
	 * @return string
	 */
	public static function get_stripe_id(): string {
		return PaymentMethodUtils::get_stripe_id( self::get_id() );
	}

	/**
	 * Get the customer-facing title of the payment method
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 *
	 * @return string
	 */
	public static function get_title( ?string $account_country = null ): string {
		return __( 'Alipay', 'woocommerce-payments' );
	}

	/**
	 * Get the title of the payment method for the settings page.
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 *
	 * @return string
	 */
	public static function get_settings_label( ?string $account_country = null ): string {
		return self::get_title( $account_country );
	}

	/**
	 * Get the customer-facing description of the payment method
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 * @return string
	 */
	public static function get_description( ?string $account_country = null ): string {
		return __( 'Alipay is a popular wallet in China, operated by Ant Financial Services Group, a financial services provider affiliated with Alibaba.', 'woocommerce-payments' );
	}

	/**
	 * Is the payment method a BNPL (Buy Now Pay Later) payment method?
	 *
	 * @return boolean
	 */
	public static function is_bnpl(): bool {
		return PaymentMethodUtils::is_bnpl( self::get_capabilities() );
	}

	/**
	 * Is the payment method a reusable payment method?
	 *
	 * @return boolean
	 */
	public static function is_reusable(): bool {
		return PaymentMethodUtils::is_reusable( self::get_capabilities() );
	}

	/**
	 * Does the payment method accept only domestic payments?
	 *
	 * @return boolean
	 */
	public static function accepts_only_domestic_payments(): bool {
		return PaymentMethodUtils::accepts_only_domestic_payments( self::get_capabilities() );
	}

	/**
	 * Does the payment method allow manual capture?
	 *
	 * @return boolean
	 */
	public static function allows_manual_capture(): bool {
		return PaymentMethodUtils::allows_manual_capture( self::get_capabilities() );
	}

	/**
	 * Get the list of supported currencies
	 *
	 * @return string[] Array of currency codes
	 */
	public static function get_supported_currencies(): array {
		$account         = \WC_Payments::get_account_service()->get_cached_account_data();
		$account_country = isset( $account['country'] ) ? strtoupper( $account['country'] ) : '';

		if ( Country_Code::AUSTRALIA === $account_country ) {
			return [ Currency_Code::AUSTRALIAN_DOLLAR ];
		}

		if ( Country_Code::CANADA === $account_country ) {
			return [ Currency_Code::CANADIAN_DOLLAR ];
		}

		if ( Country_Code::UNITED_KINGDOM === $account_country ) {
			return [ Currency_Code::POUND_STERLING ];
		}

		if ( Country_Code::HONG_KONG === $account_country ) {
			return [ Currency_Code::HONG_KONG_DOLLAR ];
		}

		if ( Country_Code::JAPAN === $account_country ) {
			return [ Currency_Code::JAPANESE_YEN ];
		}

		if ( Country_Code::NEW_ZEALAND === $account_country ) {
			return [ Currency_Code::NEW_ZEALAND_DOLLAR ];
		}

		if ( Country_Code::SINGAPORE === $account_country ) {
			return [ Currency_Code::SINGAPORE_DOLLAR ];
		}

		if ( Country_Code::UNITED_STATES === $account_country ) {
			return [ Currency_Code::UNITED_STATES_DOLLAR ];
		}

		if ( Country_Code::HUNGARY === $account_country ) {
			return [ Currency_Code::HUNGARIAN_FORINT ];
		}

		if ( in_array(
			$account_country,
			[
				Country_Code::AUSTRIA,
				Country_Code::BELGIUM,
				Country_Code::BULGARIA,
				Country_Code::CYPRUS,
				Country_Code::CZECHIA,
				Country_Code::DENMARK,
				Country_Code::ESTONIA,
				Country_Code::FINLAND,
				Country_Code::FRANCE,
				Country_Code::GERMANY,
				Country_Code::GREECE,
				Country_Code::IRELAND,
				Country_Code::ITALY,
				Country_Code::LATVIA,
				Country_Code::LITHUANIA,
				Country_Code::LUXEMBOURG,
				Country_Code::MALTA,
				Country_Code::NETHERLANDS,
				Country_Code::NORWAY,
				Country_Code::PORTUGAL,
				Country_Code::ROMANIA,
				Country_Code::SLOVAKIA,
				Country_Code::SLOVENIA,
				Country_Code::SPAIN,
				Country_Code::SWEDEN,
				Country_Code::SWITZERLAND,
				Country_Code::CROATIA,
			],
			true
		) ) {
			return [ Currency_Code::EURO ];
		}

		// fallback currency code, just in case.
		return [ Currency_Code::CHINESE_YUAN ];
	}

	/**
	 * Get the list of supported countries
	 *
	 * @return string[] Array of country codes
	 */
	public static function get_supported_countries(): array {
		return [];
	}

	/**
	 * Get the payment method capabilities
	 *
	 * @return string[]
	 */
	public static function get_capabilities(): array {
		return [
			PaymentMethodCapability::REFUNDS,
			PaymentMethodCapability::MULTI_CURRENCY,
		];
	}

	/**
	 * Get the URL for the payment method's icon
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 *
	 * @return string
	 */
	public static function get_icon_url( ?string $account_country = null ): string {
		return plugins_url( 'assets/images/payment-methods/alipay-logo.svg', WCPAY_PLUGIN_FILE );
	}

	/**
	 * Get the URL for the payment method's dark mode icon
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 *
	 * @return string Returns regular icon URL if no dark mode icon exists
	 */
	public static function get_dark_icon_url( ?string $account_country = null ): string {
		return self::get_icon_url( $account_country );
	}

	/**
	 * Get the URL for the payment method's settings icon
	 *
	 * @param string|null $account_country Optional. The merchant's account country.
	 *
	 * @return string
	 */
	public static function get_settings_icon_url( ?string $account_country = null ): string {
		return self::get_icon_url( $account_country );
	}

	/**
	 * Get the testing instructions for the payment method
	 *
	 * @param string $account_country The merchant's account country.
	 * @return string HTML string containing testing instructions
	 */
	public static function get_testing_instructions( string $account_country ): string {
		return '';
	}

	/**
	 * Get the currency limits for the payment method
	 *
	 * @return array<string,array<string,array{min:int,max:int}>>
	 */
	public static function get_limits_per_currency(): array {
		return [];
	}

	/**
	 * Whether this payment method is available for the given currency and country
	 *
	 * @param string $currency The currency code to check.
	 * @param string $account_country The merchant's account country.
	 *
	 * @return bool
	 */
	public static function is_available_for( string $currency, string $account_country ): bool {
		if ( ! PaymentMethodUtils::is_available_for( self::get_supported_currencies(), self::get_supported_countries(), $currency, $account_country ) ) {
			return false;
		}

		return true;
	}

	/**
	 * Whether this payment method should be enabled by default
	 *
	 * @return bool
	 */
	public static function is_enabled_by_default(): bool {
		return false;
	}

	/**
	 * Get the minimum amount for this payment method for a given currency and country
	 *
	 * @param string $currency The currency code.
	 * @param string $country The country code.
	 *
	 * @return int|null The minimum amount or null if no minimum.
	 */
	public static function get_minimum_amount( string $currency, string $country ): ?int {
		return null;
	}

	/**
	 * Get the maximum amount for this payment method for a given currency and country
	 *
	 * @param string $currency The currency code.
	 * @param string $country The country code.
	 *
	 * @return int|null The maximum amount or null if no maximum.
	 */
	public static function get_maximum_amount( string $currency, string $country ): ?int {
		return null;
	}
}
