<?php

namespace App\Transformers\Snippets;

use League\Fractal\TransformerAbstract;
use App\Snippet;
use App\Transformers\Snippets\StepTransformer;
use App\Transformers\Users\PublicUserTransformer;

class SnippetTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'steps',
        'author',
        'user'
    ];
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Snippet $snippet)
    {
        return [
            'uuid' => $snippet->uuid,
            'title' => $snippet->title ?: '',
            'step_count' => $snippet->steps->count()
        ];
    }

    public function includeSteps(Snippet $snippet) {
        return $this->collection($snippet->steps, new StepTransformer());
    }

    public function includeAuthor(Snippet $snippet) {
        return $this->item($snippet->user, new PublicUserTransformer());
    }

    public function includeUser(Snippet $snippet) {
        return $this->primitive('user', function() use ($snippet) {
           return [
               'data' => [
                   'owner' => $snippet->user_id === optional(auth()->user())->id
               ]
           ];
        });
    }
}
