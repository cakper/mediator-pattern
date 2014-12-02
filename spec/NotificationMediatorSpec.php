<?php

namespace spec;

use NotificationMediator;
use Notifier;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use User;

/**
 * @mixin NotificationMediator
 */
class NotificationMediatorSpec extends ObjectBehavior
{
    function it_notifies_users(User $user, Notifier $notifier1, Notifier $notifier2)
    {
        $this->registerUser($user, ['email', 'sms']);
        $this->registerNotifier('email', $notifier1);
        $this->registerNotifier('sms', $notifier2);

        $this->notify($user);

        $notifier1->notify($user)->shouldHaveBeenCalled();
        $notifier2->notify($user)->shouldHaveBeenCalled();
    }
}
