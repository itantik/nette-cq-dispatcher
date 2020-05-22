<?php

declare(strict_types=1);

namespace Itantik\CQDispatcher\Bridges\Nette;

use Itantik\CQDispatcher\Adapters\NetteDIContainer;
use Itantik\CQDispatcher\Command\DiCommandHandlerProvider;
use Itantik\CQDispatcher\Query\DiQueryHandlerProvider;

class ExtensionConfig
{
    /** @var string */
    public $container = NetteDIContainer::class;

    /** @var string */
    public $commandHandlerProvider = DiCommandHandlerProvider::class;

    /** @var string */
    public $queryHandlerProvider = DiQueryHandlerProvider::class;
}
