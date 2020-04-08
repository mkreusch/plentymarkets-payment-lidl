<?php

namespace LidlPayment\Services;

use Plenty\Modules\Payment\Method\Contracts\PaymentMethodService;

class LidlPaymentMethodService extends PaymentMethodService
{
    const PLUGIN_KEY = 'plenty_LidlPayment';
    const PAYMENT_KEY = 'LidlPayment';

    public function isBackendSearchable()
    {
        return true;
    }

    public function isBackendActive()
    {
        return true;
    }

    public function isActive(){
        return true;
    }
}
