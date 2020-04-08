<?php

namespace LidlPayment\Helper;

use LidlPayment\Services\LidlPaymentMethodService;
use Plenty\Modules\Payment\Method\Contracts\PaymentMethodRepositoryContract;

/**
 * Class LidlPaymentHelper
 *
 * @package LidlPayment\Helper
 */
class LidlPaymentHelper
{
    /**
     * @var PaymentMethodRepositoryContract $paymentMethodRepository
     */
    private $paymentMethodRepository;

    /**
     * LidlPaymentHelper constructor.
     *
     * @param PaymentMethodRepositoryContract $paymentMethodRepository
     */
    public function __construct(PaymentMethodRepositoryContract $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    /**
     * Create the ID of the payment method if it doesn't exist yet
     */
    public function createMopIfNotExists()
    {

        if ($this->getPaymentMethod() == 'no_paymentmethod_found') {
            $paymentMethodData = [
                'pluginKey'  => LidlPaymentMethodService::PLUGIN_KEY,
                'paymentKey' => LidlPaymentMethodService::PAYMENT_KEY,
                'name'       => 'Lidl'
            ];
            $this->paymentMethodRepository->createPaymentMethod($paymentMethodData);
        }
    }

    /**
     * Load the ID of the payment method for the given plugin key
     * Return the ID for the payment method
     *
     * @return string|int
     */
    public function getPaymentMethod()
    {
        $paymentMethods = $this->paymentMethodRepository->allForPlugin(LidlPaymentMethodService::PLUGIN_KEY);

        if (!is_null($paymentMethods)) {
            foreach ($paymentMethods as $paymentMethod) {
                if ($paymentMethod->paymentKey == LidlPaymentMethodService::PAYMENT_KEY) {
                    return $paymentMethod->id;
                }
            }
        }

        return 'no_paymentmethod_found';
    }
}
