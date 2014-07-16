<?php

/*
 * This file is part of the CLSlackBundle.
 *
 * (c) Cas Leentfaar <info@casleentfaar.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CL\Bundle\SlackBundle\Command;

use CL\Slack\Api\Method\AuthTestMethod;
use CL\Slack\Api\Method\Response\AuthTestResponse;
use CL\Slack\Api\Method\Response\ResponseInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Cas Leentfaar <info@casleentfaar.com>
 */
class ApiAuthTestCommand extends AbstractApiCommand
{
    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        parent::configure();
        $this->setName('slack:api:auth-test');
        $this->setDescription('Allows you to test authentication with the Slack API.');
    }

    /**
     * {@inheritdoc}
     */
    protected function getMethodSlug()
    {
        return AuthTestMethod::getSlug();
    }

    /**
     * @param AuthTestResponse $response
     *
     * {@inheritdoc}
     */
    protected function responseToOutput(ResponseInterface $response, OutputInterface $output)
    {
        $rows = [
            ['User',    $response->getUser()],
            ['User ID', $response->getUserId()],
            ['Team',    $response->getTeam()],
            ['Team ID', $response->getTeamId()],
            ['URL',     $response->getUrl()],
        ];
        $this->renderTable(['Key', 'Value'], $rows, $output);
    }
}
``