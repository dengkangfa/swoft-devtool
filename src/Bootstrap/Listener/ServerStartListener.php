<?php

namespace Swoft\Devtool\Bootstrap\Listener;

use Swoft\App;
use Swoft\Bean\Annotation\ServerListener;
use Swoft\Bootstrap\Listeners\Interfaces\BeforeStartInterface;
use Swoft\Bootstrap\Listeners\Interfaces\WorkerStartInterface;
use Swoft\Bootstrap\SwooleEvent;
use Swoft\Bootstrap\Server\AbstractServer;
use Swoft\Devtool\DevTool;
use Swoft\Devtool\WebSocket\DevToolController;
use Swoft\Memory\Table;
use Swoole\Server;

/**
 * Class ServerStartListener
 * @package Swoft\Devtool\Bootstrap\Listener
 * @ServerListener(event={
 *     SwooleEvent::ON_BEFORE_START,
 *     SwooleEvent::ON_WORKER_START
 * })
 */
class ServerStartListener implements BeforeStartInterface, WorkerStartInterface
{
    /**
     * @param AbstractServer $server
     * @throws \InvalidArgumentException
     */
    public function onBeforeStart(AbstractServer $server)
    {
        // DevTool::$table = new Table('runtime-devtool', 8 * 1024);
    }

    /**
     * @param Server $server
     * @param int $workerId
     * @param bool $isWorker
     */
    public function onWorkerStart(Server $server, int $workerId, bool $isWorker)
    {
        if (!$enable = \config('devtool.enable', true)) {
            return;
        }

        \output()->writeln(\sprintf(
            'Children process start successful. ' .
            'PID <magenta>%s</magenta>, Worker Id <magenta>%s</magenta>, Role <info>%s</info>',
            $server->worker_pid,
            $workerId,
            $isWorker ? 'Worker' : 'Task'
        ));

        // if websocket is enabled. register a ws route
        if ($isWorker && App::hasBean('wsRouter')) {
            /* @see \Swoft\WebSocket\Server\Router\HandlerMapping::add() */
            \bean('wsRouter')->add(DevTool::ROUTE_PREFIX, DevToolController::class);
        }

        // push processor to logger
        $logger = App::getLogger();
        $logger->pushProcessor(function (array $record) {
            // \var_dump($record);
        });
    }
}
