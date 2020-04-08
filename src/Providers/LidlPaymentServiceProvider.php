<?php

namespace LidlPayment\Providers;

use LidlPayment\Services\LidlPaymentMethodService;
use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodContainer;
use LidlPayment\Helper\LidlPaymentHelper;

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
     * @param LidlPaymentHelper $paymentHelper
     * @param PaymentMethodContainer $payContainer
     */
    public function boot(
        LidlPaymentHelper $paymentHelper,
        PaymentMethodContainer $payContainer
    ) {
        $paymentHelper->createMopIfNotExists();
        $payContainer->register(LidlPaymentMethodService::PLUGIN_KEY . '::' . LidlPaymentMethodService::PAYMENT_KEY, LidlPaymentMethodService::class, []);
    }
}
