<?php

interface Observer
{
    public function update(Subject $subject): void;
}

class ConcreteObserver implements Observer
{
    private $observerState = '';

    function update(Subject $subject): void
    {
        $this->observerState = $subject->getState();
        echo "觀察者操作當前狀態:" . $this->observerState;
    }
}

class Subject
{
    private $observers = [];
    private $stateNow = '';
    public function attach(Observer $observer): void
    {
        array_push($this->observers, $observer);
    }

    public function datach(Observer $observer): void
    {
        $position = 0;

        foreach ($this->observers as $ob) {
            if ($ob == $observer) {
                array_splice($this->observers, ($position), 1);
            }
            ++$position;
        }
    }

    public function notify(): void
    {
        foreach ($this->observers as $ob) {
            $ob->update($this);
        }
    }
}

class ConcreteSubject extends Subject
{
    public function setState($state)
    {
        $this->stateNow = $state;
        $this->notify();
    }

    public function getState()
    {
        return $this->stateNow;
    }
}

$observer = new ConcreteObserver();
$subject = new ConcreteSubject();
$subject->attach($observer);
$subject->setState("哈哈哈哈");
