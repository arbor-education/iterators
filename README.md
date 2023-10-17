# iterators

## Installation

The preferred method of installation is via [Composer](http://getcomposer.org/). Run the following command to install the latest version of a package and add it to your project's `composer.json`:

```bash
composer require arbor-education/iterators
```

## Usage

#### `Dutek\Iterator\ChunkIterator`
Chunks an `\Iterator` into arrays with `size` elements. 

``` php
use Dutek\Iterator\ChunkIterator;

$iterator = new \ArrayIterator([1, 2, 3, 4, 5]);
$size = 2;
$chunkIterator = new ChunkIterator($iterator, $size);

assert(iterator_to_array($chunkIterator) === [[1, 2], [3, 4], [5]]);
```

#### `Dutek\Iterator\MapIterator`
Applies the callback to the elements of the given `\Iterator`. 

``` php
use Dutek\Iterator\MapIterator;

$iterator = new \ArrayIterator([1, 2, 3, 4, 5]);
$callback = function (int $item) {
    return $item ** 2;
};
$mapIterator = new MapIterator($iterator, $callback);

assert(iterator_to_array($mapIterator) === [1, 4, 9, 16, 25]);

```


## Credits

- [Dusan Vejin][link-author]
- [All Contributors][link-contributors]

## License

Released under MIT License - see the [License File](LICENSE) for details.
