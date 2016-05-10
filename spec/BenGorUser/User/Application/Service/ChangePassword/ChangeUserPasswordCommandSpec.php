<?php

/*
 * This file is part of the BenGorUser package.
 *
 * (c) Beñat Espiña <benatespina@gmail.com>
 * (c) Gorka Laucirica <gorka.lauzirika@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace spec\BenGorUser\User\Application\Service\ChangePassword;

use BenGorUser\User\Application\Service\ChangePassword\ChangeUserPasswordCommand;
use PhpSpec\ObjectBehavior;

/**
 * Spec file of change user password request class.
 *
 * @author Beñat Espiña <benatespina@gmail.com>
 * @author Gorka Laucirica <gorka.lauzirika@gmail.com>
 */
class ChangeUserPasswordCommandSpec extends ObjectBehavior
{
    function it_creates_request_from_default()
    {
        $this->beConstructedFrom('id', 'newPassword', 'oldPassword');
        $this->shouldHaveType(ChangeUserPasswordCommand::class);

        $this->email()->shouldReturn(null);
        $this->id()->shouldReturn('id');
        $this->newPlainPassword()->shouldReturn('newPassword');
        $this->oldPlainPassword()->shouldReturn('oldPassword');
        $this->rememberPasswordToken()->shouldReturn(null);
    }

    function it_creates_request_from_email()
    {
        $this->beConstructedFromEmail('bengor@user.com', 'newPassword');
        $this->shouldHaveType(ChangeUserPasswordCommand::class);

        $this->email()->shouldReturn('bengor@user.com');
        $this->newPlainPassword()->shouldReturn('newPassword');
        $this->rememberPasswordToken()->shouldReturn(null);
        $this->id()->shouldReturn(null);
        $this->oldPlainPassword()->shouldReturn(null);
    }

    function it_creates_request_from_remember_password_token()
    {
        $this->beConstructedFromRememberPasswordToken('newPassword', 'remember-password-token');
        $this->shouldHaveType(ChangeUserPasswordCommand::class);

        $this->email()->shouldReturn(null);
        $this->newPlainPassword()->shouldReturn('newPassword');
        $this->rememberPasswordToken()->shouldReturn('remember-password-token');
        $this->id()->shouldReturn(null);
        $this->oldPlainPassword()->shouldReturn(null);
    }
}