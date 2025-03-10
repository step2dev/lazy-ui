<?php

namespace Step2dev\LazyUI\Components;

use Step2dev\LazyUI\LazyComponent;

class Choices extends LazyComponent
{
    public function __construct() {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): \Closure
    {
        return function (array $data) {
            if ($data['slot']->isNotEmpty()) {
                preg_match_all(
                    '/<option(\w|\s+)value="(?<value>|.*?)".*?>(?<label>.*?)<\/option>/m',
                    $data['slot'],
                    $matches,
                    PREG_SET_ORDER,
                    0
                );
                $options = [];

                foreach ($matches as $item) {
                    $options[] = [
                        'value' => $item['value'],
                        'label' => $item['label'],
                    ];
                }
                $data['attributes']['options'] = json_encode($options);
            }

            return view('components.admin.select', $this->mergeData($data))->render();
        };
    }
}
