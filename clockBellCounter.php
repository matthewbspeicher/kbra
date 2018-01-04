<?php

/**
 * clockBellCounter - contains the Clock class, with the sole purpose counting
 * the number of times a clock tower will ring its bell between two provided times.
 *
 * @author     Matthew Speicher <matthewbspeicher@gmail.com>
 */

class Clock {

    /**
     * @var string $startTime Stores string containing the start time of the clock tower.
     */
    private $startTime;

    /**
     * @var int $startHour Stores the hour value of $startTime.
     */
    private $startHour;

    /**
     * @var int $startMinute Stores the minute value of $startTime.
     */
    private $startMinute;

    /**
     * @var bool $startTimeOnHour Stores whether or not $startTime is on the hour.
     */
    private $startTimeOnHour = false;

    /**
     * @var string $endTime Stores string containing the end time of the clock tower.
     */
    private $endTime;

    /**
     * @var int $endHour Stores the minute value of $endTime.
     */
    private $endHour;

    /**
     * @var int $endMinute Stores the minute value of $endTime.
     */
    private $endMinute;

    /**
     * @var bool $startEndTimeEqual Stores whether or not $startTime and $endTime are equal.
     */
    private $startEndTimeEqual = false;

    /**
     * @var int $bellCounter Counter containing the number of times the bell will ring.
     */
     private $bellCounter = 0;

    /**
     * Function called to count the number of times the clock tower will ring its bell
     * between the two provided times.
     *
     * @param string $start Accepts the start time of the clock in twenty-four hour notation.
     * @param string $end Accepts the end time of the clock in twenty-four hour notation.
     * @return int $bellCounter containing the number of times the clock tower will ring.
     */
    public function countBells($start, $end) {
        $this->startTime = $start;
        $this->endTime = $end;

        /**
         * Parse out the hour and minute values of the start time.
         */
        $startParts = explode(":", $this->startTime);
        $this->startHour = $startParts[0];
        $this->startMinute = $startParts[1];

        /**
         * Parse out the hour and minute values of the end time.
         */
        $endParts = explode(":", $this->endTime);
        $this->endHour = $endParts[0];
        $this->endMinute = $endParts[1];

        /**
         * Determine if the start time is on the hour (ex. 14:00)
         */
        if ($this->startMinute === '00') {
            $this->startTimeOnHour = true;
        }

        /**
         * Determine if start time and end time are equal.
         */
        if ($this->startTime == $this->endTime) {
            $this->startEndTimeEqual = true;
        }

        /**
         * Count the number of times bell will ring.
         */
        $startTemp = $this->startHour;
        $endTemp = $this->endHour;

        if ($this->startEndTimeEqual) {
            $startTemp = $startTemp + 1;
        }

        for ($endTemp+=$startTemp>$endTemp?24:0;$startTemp<=$endTemp;) {
            $this->bellCounter+=$startTemp++%12?:12;
        }

        if ($this->startEndTimeEqual && $this->startTimeOnHour) {
            $this->bellCounter = $this->bellCounter + $this->startHour;
        }

        if (!$this->startTimeOnHour) {
            if ($this->startHour > 12) {
                $this->startHour = $this->startHour - 12;
            }
            $this->bellCounter = $this->bellCounter - $this->startHour;
        }

        return $this->bellCounter;

    }

}