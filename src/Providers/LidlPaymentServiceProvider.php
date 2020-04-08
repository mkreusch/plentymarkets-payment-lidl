<?php

namespace LidlPayment\Providers;

use LidlPayment\Services\PaymentMethodService;
use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use LidlPayment\Helper\PaymentHelper;

/**
 * Class LidlPaymentServiceProvider
 * @package LidlPayment\Providers
 */
class LidlPaymentServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    /**
     * Boot additional services for the payment method
     *
     * @param PaymentHelper $paymentHelper
     * @param PaymentMethodContainer $payContainer
     */
    public function boot(
        PaymentHelper $paymentHelper,
        PaymentMethodContainer $payContainer
    ) {
        $paymentHelper->createMopIfNotExists();
        $payContainer->register(PaymentMethodService::PLUGIN_KEY . '::' . PaymentMethodService::PAYMENT_KEY, PaymentMethodService::class, []);
    }
}
