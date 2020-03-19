# Pipeliner

Pipeline pattern implementation made easy, inspired by the [PSR-15](https://www.php-fig.org/psr/psr-15/) RequestHandlerInterface and MiddlewareInterface.

## Installation

Via [composer](https://getcomposer.org/):
```
$ composer require debuss-a/pipeliner 
```

## Usage

```php
require_once __DIR__.'/vendor/autoload.php';

// ==========
class MutliplyTwo implements \Pipeliner\StageInterface
{
    public function process($payload, \Pipeliner\PipelineInterface $pipeline)
    {
        return $pipeline->handle($payload * 2);
    }
}

class MultiplyThree
{
    public function __invoke($payload)
    {
        return $payload * 3;
    }
}

class AddItself
{
    public function __invoke($payload)
    {
        return $payload + $payload;
    }
}
// ==========

$pipeline = new \Pipeliner\Pipeline();
$pipeline
    ->pipe(new MultiplyThree())
    ->pipe(new MutliplyTwo())
    ->pipe(function ($payload) {
        return $payload + 42;
    })
;

var_dump(
    $pipeline->handle(10) // 102
);
```

## License

The package is licensed under the MIT license. See [License File](https://github.com/debuss/pipeliner/blob/master/LICENSE.md) for more information.