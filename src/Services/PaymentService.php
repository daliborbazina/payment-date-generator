<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link https://bazina.dev
 */

namespace App\Services;

use App\Helpers\PaymentCalculator;
use App\Events\EventDispatcher;
use DateTime;

class PaymentService {
    public function __construct(private readonly EventDispatcher $eventDispatcher, private readonly PaymentCalculator $paymentCalculator) {}

    /**
     * @throws \Exception
     */
    public function calc($input) : void
    {
        $baseSalaryDates = $this->paymentCalculator->getSalaryPaymentDates($input->getDate());
        $bonusPaymentDates = $this->paymentCalculator->getBonusPaymentDate($input->getDate());

        $payments = [];
        //ToDo: Refactor this
        for ($i = 0; $i < count($baseSalaryDates); $i++) {
            $month = new DateTime($baseSalaryDates[$i]);
            $payment = [
                'month' => $month->format('F'),
                'base' => $baseSalaryDates[$i],
                'bonus' => $bonusPaymentDates[$i],
            ];

            $payments['data'][] = $payment;
        }

        $payments['input'] = $input;

        $this->eventDispatcher->dispatch('generate', $payments);
    }
}
