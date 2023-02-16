<?php

namespace App\EventSubscriber;

use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;

class EasyAdminSubscriber
{
  public function onBeforeEntityPersisted(BeforeEntityPersistedEvent $event)
  {
    $entity = $event->getEntityInstance();
    var_dump($entity);
  }

  public function onBeforeEntityUpdated(BeforeEntityUpdatedEvent $event)
  {
    $entity = $event->getEntityInstance();
    var_dump($entity);
  }
}
