<?php

class NotificationMediator
{

    private $users;
    private $notifiers;

    public function registerUser(User $user, array $notifiers)
    {
        $this->users[spl_object_hash($user)] = $notifiers;
    }

    public function registerNotifier($name, Notifier $notifier)
    {
        $this->notifiers[$name] = $notifier;
    }

    public function notify(User $user)
    {
        foreach ($this->users[spl_object_hash($user)] as $notifierName) {
            $this->notifiers[$notifierName]->notify($user);
        }
    }
}
