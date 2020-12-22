<?php
namespace Hizbul\ReceiptPrinter;

abstract class CurrencyManager {

    const RIGHT = 'right';
    const LEFT = 'left';
    protected $currency = 'TK';
    protected $currencyPosition = self::RIGHT;
   

    public function setCurrency($currency = 'TK') {
        $this->currency = $currency;
    }

    public function setCurrencyPosition($position = self::RIGHT) {
        $this->position = $position;
    }

    public function getFormattedPrice($value) {
        return $this->currencyPosition == self::LEFT ? $this->currency .' '. number_format($value, 2, '.', ',') : number_format($value, 2, '.', ',') .' '. $this->currency;
    }
}