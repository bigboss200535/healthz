<?php

namespace App\Helpers;

use Carbon\Carbon;

class TimeManagement
{
    //today
    public static function today_date()
    {
        return date('Y-m-d');
    }
    /**
     * Get current date in Y-m-d format
     */
    public static function currentDate()
    {
        return Carbon::now()->toDateString();
    }

    /**
     * Get current date & time
     */
    public static function currentDateTime()
    {
        return Carbon::now()->toDateTimeString();
    }

    /**
     * Format a given date
     */
    public static function formatDate($date, $format = 'Y-m-d')
    {
        return Carbon::parse($date)->format($format);
    }

    /**
     * Calculate difference in days between two dates
     */
    public static function diffInDays($startDate, $endDate)
    {
        return Carbon::parse($startDate)->diffInDays(Carbon::parse($endDate));
    }

    /**
     * Add days to a date
     */
    public static function addDays($date, $days)
    {
        return Carbon::parse($date)->addDays($days)->toDateString();
    }

    /**
     * Subtract days from a date
     */
    public static function subtractDays($date, $days)
    {
        return Carbon::parse($date)->subDays($days)->toDateString();
    }

    /**
     * Convert date to human-readable format (e.g. 2 hours ago)
     */
    public static function humanReadable($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
