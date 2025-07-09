<?php

if (!function_exists('auth_school')) {
    function auth_school()
    {
        return auth()->user()->school;
    }
}

if (!function_exists('auth_student')) {
    function auth_student()
    {
        return auth()->user()->student;
    }
}
if (!function_exists('auth_employee')) {
    function auth_employee()
    {
        return auth()->user()->employee;
    }
}
if (!function_exists('auth_user')) {
    function auth_user()
    {
        return auth()->user();
    }
}
