# Nette CQ Dispatcher

[Nette](https://nette.org/) extension for [Command Query Dispatcher](https://github.com/itantik/cq-dispatcher).

## Installation

```
composer require itantik/nette-cq-dispatcher
```

It already includes [itantik/cq-dispatcher](https://github.com/itantik/cq-dispatcher). There is no need to install it separately.

## Usage

Register the extension in Nette configuration file.

```yaml
extensions:
    cqdispatcher: Itantik\CQDispatcher\Bridges\Nette\CQDispatcherExtension
```

No additional settings are required. By default, CQ Dispatcher uses Nette DI Container. With additional configurations you can change default settings.

### Change DI container

Create an adapter to your DI container and register it in the configuration file. The adapter implements `Itantik\CQDispatcher\DI\IContainer` interface.

```yaml
cqdispatcher:
    # default DI container
    container: Itantik\CQDispatcher\Adapters\NetteDIContainer
```

### Change handler providers

Default command and query handler providers use a DI container to create a handler instance. You can create your own providers that meet your needs, even without a DI container.

Providers have to implement `Itantik\CQDispatcher\Command\ICommandHandlerProvider` respectively `Itantik\CQDispatcher\Query\IQueryHandlerProvider` interface.

```yaml
cqdispatcher:
    # default providers
    commandHandlerProvider: Itantik\CQDispatcher\Command\DiCommandHandlerProvider
    queryHandlerProvider: Itantik\CQDispatcher\Query\DiQueryHandlerProvider
```

## Requirements

- PHP 7.2
