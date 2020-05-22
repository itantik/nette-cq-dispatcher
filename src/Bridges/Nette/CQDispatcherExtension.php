<?php

declare(strict_types=1);

namespace Itantik\CQDispatcher\Bridges\Nette;

use Nette\DI\CompilerExtension;
use Nette\Schema\Expect;
use Nette\Schema\Schema;
use Itantik\CQDispatcher\Command\CommandDispatcher;
use Itantik\CQDispatcher\Query\QueryDispatcher;

class CQDispatcherExtension extends CompilerExtension
{
    public function getConfigSchema(): Schema
    {
        return Expect::from(new ExtensionConfig());
    }

    public function loadConfiguration(): void
    {
        /** @var ExtensionConfig $config */
        $config = $this->config;

        $builder = $this->getContainerBuilder();

        $builder->addDefinition($this->prefix('container'))
            ->setType($config->container);

        $builder->addDefinition($this->prefix('commandHandlerProvider'))
            ->setType($config->commandHandlerProvider);

        $builder->addDefinition($this->prefix('commandDispatcher'))
            ->setFactory(
                CommandDispatcher::class,
                [
                    'handlerProvider' => $this->prefix('@commandHandlerProvider'),
                ]
            );

        $builder->addDefinition($this->prefix('queryHandlerProvider'))
            ->setType($config->queryHandlerProvider);

        $builder->addDefinition($this->prefix('queryDispatcher'))
            ->setFactory(
                QueryDispatcher::class,
                [
                    $this->prefix('@queryHandlerProvider'),
                ]
            );
    }
}
