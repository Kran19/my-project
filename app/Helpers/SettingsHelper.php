<?php

namespace App\Helpers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsHelper
{
    /**
     * Get setting value with caching
     */
    public static function get(string $key, $default = null): mixed
    {
        return Cache::remember("setting.{$key}", 3600, function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();

            if (!$setting) {
                return $default;
            }

            $value = $setting->value;

            if ($setting->is_encrypted && $value) {
                $value = decrypt($value);
            }

            // Cast based on type
            switch ($setting->type) {
                case 'boolean':
                case 'checkbox':
                    return filter_var($value, FILTER_VALIDATE_BOOLEAN);
                case 'number':
                case 'integer':
                    return is_numeric($value) ? (int) $value : 0;
                case 'decimal':
                case 'float':
                    return is_numeric($value) ? (float) $value : 0.0;
                case 'array':
                case 'json':
                    return $value ? json_decode($value, true) : [];
                default:
                    return $value ?? '';
            }
        });
    }

    /**
     * Get multiple settings at once
     */
    public static function getMultiple(array $keys): array
    {
        $settings = [];

        foreach ($keys as $key) {
            $settings[$key] = self::get($key);
        }

        return $settings;
    }

    /**
     * Clear settings cache
     */
    public static function clearCache(string $key = null): void
    {
        if ($key) {
            Cache::forget("setting.{$key}");
        } else {
            // Clear all settings cache
            $settings = Setting::pluck('key')->toArray();
            foreach ($settings as $settingKey) {
                Cache::forget("setting.{$settingKey}");
            }
        }
    }

    /**
     * Get all public settings
     */
    public static function getPublicSettings(): array
    {
        return Cache::remember('settings.public', 3600, function () {
            $settings = Setting::where('is_public', true)
                ->orderBy('group')
                ->orderBy('sort_order')
                ->get();

            $result = [];

            foreach ($settings as $setting) {
                $result[$setting->key] = self::getSettingValue($setting);
            }

            return $result;
        });
    }

    /**
     * Get setting value from model
     */
    private static function getSettingValue(Setting $setting): mixed
    {
        $value = $setting->value;

        if ($setting->is_encrypted && $value) {
            $value = decrypt($value);
        }

        // Cast based on type
        switch ($setting->type) {
            case 'boolean':
            case 'checkbox':
                return filter_var($value, FILTER_VALIDATE_BOOLEAN);
            case 'number':
            case 'integer':
                return is_numeric($value) ? (int) $value : 0;
            case 'decimal':
            case 'float':
                return is_numeric($value) ? (float) $value : 0.0;
            case 'array':
            case 'json':
                return $value ? json_decode($value, true) : [];
            default:
                return $value ?? '';
        }
    }

    /**
     * Get currency symbol
     */
    public static function currencySymbol(): string
    {
        $currency = self::get('currency', 'USD');

        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'CAD' => 'C$',
            'INR' => '₹'
        ];

        return $symbols[$currency] ?? '$';
    }

    /**
     * Get store information
     */
    public static function storeInfo(): array
    {
        return [
            'name' => self::get('store_name', 'My eCommerce Store'),
            'email' => self::get('store_email', 'contact@myecommercestore.com'),
            'phone' => self::get('store_phone', '+1 (555) 123-4567'),
            'address' => self::get('store_address', '123 Commerce Street, Business City, BC 12345'),
            'currency' => self::get('currency', 'USD'),
            'currency_symbol' => self::currencySymbol()
        ];
    }

    /**
     * Get SEO settings
     */
    public static function seoSettings(): array
    {
        return [
            'meta_title' => self::get('meta_title', 'My eCommerce Store - Best Online Shopping'),
            'meta_description' => self::get('meta_description', 'Shop the best products online with fast delivery and great customer service.'),
            'meta_keywords' => self::get('meta_keywords', 'ecommerce, online shopping, products, deals'),
            'google_analytics' => self::get('google_analytics', '')
        ];
    }

    /**
     * Get payment settings
     */
    public static function paymentSettings(): array
    {
        return [
            'paypal_enabled' => self::get('paypal_enabled', true),
            'paypal_client_id' => self::get('paypal_client_id', ''),
            'stripe_enabled' => self::get('stripe_enabled', true),
            'stripe_publishable_key' => self::get('stripe_publishable_key', ''),
            'cod_enabled' => self::get('cod_enabled', true)
        ];
    }

    /**
     * Get shipping settings
     */
    public static function shippingSettings(): array
    {
        return [
            'default_shipping_rate' => self::get('default_shipping_rate', 5.99),
            'tax_rate' => self::get('tax_rate', 8.5),
            'free_shipping_min' => self::get('free_shipping_min', 50.00)
        ];
    }
}
