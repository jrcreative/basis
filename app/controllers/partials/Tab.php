<?php

namespace App;

trait Tab
{
    private function tabs_output($a = null)
    {
        return [
            'type' => 'tab',
            'title' => $a['title'],
            'description' => $a['description'],
            'bg' => null,
            'tabs' => $a['tabs'],
        ];
    }
}