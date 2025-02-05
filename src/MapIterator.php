<?php
/**
 * This file is part of the iterators package.
 *
 * Copyright (c) Dusan Vejin
 *
 * For full copyright and license information, please refer to the LICENSE file,
 * located at the package root folder.
 */

declare(strict_types=1);

namespace Dutek\Iterator;

use ArrayIterator;
use IteratorIterator;

final class MapIterator extends IteratorIterator
{
    protected $callback;
    protected $callbackResult;
    protected $callbackResultCached;

    public function __construct(iterable $iterable, callable $callback)
    {
        if (is_array($iterable)) {
            $iterable = new ArrayIterator($iterable);
        }

        parent::__construct($iterable);

        $this->callback = $callback;
    }

    public function current(): mixed
    {
        if (!$this->callbackResultCached) {
            $this->callbackResult = ($this->callback)(parent::current());
            $this->callbackResultCached = true;
        }

        return $this->callbackResult;
    }

    public function next(): void
    {
        parent::next();
        $this->callbackResult = null;
        $this->callbackResultCached = false;
    }
}
