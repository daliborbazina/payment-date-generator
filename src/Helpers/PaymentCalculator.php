<?php declare(strict_types=1);

/**
 * Sample code for use in job applications.
 * @author Dalibor Bazina <daliborbazina@gmail.com>
 * @link bazina.dev
 */


namespace App\Helpers;

use \DateTime;

class PaymentCalculator
{
    /**
     * @throws \Exception
     */
    public function getSalaryPaymentDates($date): array
    {
        $dateTime = new DateTime($date);

        $dates = [];
        for ($i = 0; $i < 12; $i++) {
            $lastDayOfMonth = clone $dateTime;
            $lastDayOfMonth = $lastDayOfMonth->modify('last day of this month');

            $lastDayOfWeek = clone $lastDayOfMonth;
            $lastDayOfWeek = $lastDayOfWeek->modify('last weekday');

            $dayOfWeek = (int) $lastDayOfMonth->format('w');

            if (!in_array($dayOfWeek, [0,6])) {
                $dates[] = $lastDayOfMonth->format('d.m.Y');
            } else {
                $dates[] = $lastDayOfWeek->format('d.m.Y');
            }

            $dateTime->modify('+1 month');
        }

        return $dates;
    }

    /**
     * @throws \Exception
     */
    public function getBonusPaymentDate($date):array
    {
        $dateTime = new DateTime($date);

        $dates = [];
        for ($i = 0; $i < 12; $i++) {
            $bonusDayOfMonth = clone $dateTime;
            $bonusDayOfMonth = $bonusDayOfMonth->modify('first day of last month');
            $bonusDayOfMonth = $bonusDayOfMonth->modify('+14 days');

            $nextWednesday = clone $bonusDayOfMonth;
            $nextWednesday = $nextWednesday->modify('next wednesday');

            $dayOfWeek = (int) $bonusDayOfMonth->format('w');

            if (!in_array($dayOfWeek, [0,6])) {
                $dates[] = $bonusDayOfMonth->format('d.m.Y');
            } else {
                $dates[] = $nextWednesday->format('d.m.Y');
            }

            $dateTime->modify('+1 month');
        }

        return $dates;
    }
}