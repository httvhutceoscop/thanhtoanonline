<?php

function validName($str)
{

    if (empty($str)) {
        return 'Vui lòng nhập tên.';
    } else {
        preg_match('/^[a-zA-Z\s]+$/', $str, $match);

        if (count($match) == 0)
            return 'Vui lòng nhập đúng định dạng tên.';
    }
}

function validEmail($email)
{
    if (empty($email)) {
        return 'Vui lòng nhập email.';
    } else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Sai định dạng email.";
        }
    }
}

function validPhone($phone)
{
    if (empty($phone)) {
        return 'Vui lòng nhập số điện thoại.';
    } else {
        preg_match('/^[0-9]+$/', $phone, $match);

        if (count($match) == 0)
            return 'Sai định dạng số điện thoại.';
    }
}

function validCost($cost)
{
    if (empty($cost)) {
        return 'Vui lòng nhập số tiền.';
    } else {
        preg_match('/^[0-9]+$/', $cost, $match);

        if (count($match) == 0)
            return 'Sai định dạng số tiền.';
    }
}

function validPayment($str)
{
    if (empty($str)) {
        return 'Vui lòng chọn phương thức thanh toán.';
    }
}