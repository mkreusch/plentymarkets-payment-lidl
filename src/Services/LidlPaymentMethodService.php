<?php

namespace LidlPayment\Services;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;

class LidlPaymentMethodService extends PaymentMethodService
{
    const PLUGIN_KEY = 'plenty_LidlPayment';
    const PAYMENT_KEY = 'LidlPayment';
    const PAYMENT_NAME = 'Lidl';

    public function isBackendSearchable():bool
    {
        return true;
    }

    public function isBackendActive():bool
    {
        return true;
    }

    public function isActive()
    {
        return true;
    }

    public function getBackendName(string $lang):string
    {
        return self::PAYMENT_NAME;
    }

    public function canHandleSubscriptions():bool
    {
        return true;
    }
}
