<?php

namespace Step2dev\LazyUI\Components;

use Step2dev\LazyUI\LazyComponent;

class Radial extends LazyComponent
{
    public function render(): \Closure
    {
        return function (array $data) {
            $data['attributes']['value'] ??= 0;
            $data['attributes']['style'] ??= '';

            $data['attributes']['style'] .= implode(';', [
                isset($data['attributes']['size']) ? "--size: {$data['attributes']['size']};" : '',
                isset($data['attributes']['thickness']) ? "--thickness: {$data['attributes']['thickness']};" : '',
                "--value: {$data['attributes']['value']};",
            ]);

            return view('lazy::radial', $this->mergeData($data))->render();
        };
    }
}
