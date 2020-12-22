<?php
namespace Hizbul\ReceiptPrinter;

abstract class CurrencyManager {

    protected $currency;
    protected $currencyPosition;
    const LEFT = 'left';


    public function setCurrency($currency = 'TK') {
        $this->currency = $currency;
    }

    public function setCurrencyPosition($position = self::LEFT) {
        $this->position = $position;
    }

    public function getFormattedPrice($value) {
        return $this->currencyPosition == self::LEFT ? $this->currency . number_format($value, 0, ',', '.') : number_format($value, 0, ',', '.') . $this->currency;
    }
}