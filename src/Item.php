<?php

namespace Hizbul\ReceiptPrinter;

use NumberFormatter;

class Item
{
    private $name;
    private $qty;
    private $price;
    private $local;

    function __construct($name, $qty, $price) {
        $this->name = $name;
        $this->qty = $qty;
        $this->price = $price;
    }

    public function setLocal($local = null) {
        $this->local = $local ?? config('receiptprinter.local') ;
    }

    public function getQty() {
        return $this->qty;
    }

    public function getPrice() {
        return $this->price;
    }

    public function __toString()
    {
        $right_cols = 10;
        $left_cols = 22;
        $number = new NumberFormatter($this->local, \NumberFormatter::CURRENCY );
        $item_price = $number->format($this->price);
        $item_subtotal = $number->format($this->price * $this->qty);
        
        $print_name = str_pad($this->name, 16) ;
        $print_priceqty = str_pad($item_price . ' x ' . $this->qty, $left_cols);
        $print_subtotal = str_pad($item_subtotal, $right_cols, ' ', STR_PAD_LEFT);

        return "$print_name\n$print_priceqty$print_subtotal\n";
    }
}