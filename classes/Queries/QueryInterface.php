<?php

namespace OnlineShop\Classes\Queries;

interface QueryInterface{
    public function query($select, $table, $key, $value);
}