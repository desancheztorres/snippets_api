<?php

namespace App\Transformers\Snippets;

use League\Fractal\TransformerAbstract;
use App\Step;

class StepTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Step $step)
    {
        return [
            'uuid' => $step->uuid,
            'order' => (float) $step->order,
            'title' => $step->title ?: '',
            'body' => $step->body ?: '',
        ];
    }
}
