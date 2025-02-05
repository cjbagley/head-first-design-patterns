from abc import ABC, abstractmethod

"""
Fly Behaviour
"""


class FlyBehaviourInterface:
    @abstractmethod
    def fly(self):
        pass


class FlyWithWings(FlyBehaviourInterface):
    def fly(self):
        print("I'm flying with wings!")


class FlyNoWay(FlyBehaviourInterface):
    def fly(self):
        print("I'm can't fly!")


"""
Quack Behaviour
"""


class QuackBehaviourInterface:
    @abstractmethod
    def quack(self):
        pass


class Quack(QuackBehaviourInterface):
    def quack(self):
        print("Quack")


class MuteQuack(QuackBehaviourInterface):
    def quack(self):
        print("<< Silence >>")


class Squeak(QuackBehaviourInterface):
    def quack(self):
        print("Squeak")


"""
Ducks
"""


class AbstractDuck(ABC):
    _fly_behaviour: FlyBehaviourInterface
    _quack_behaviour: QuackBehaviourInterface

    @abstractmethod
    def display(self):
        pass

    def perform_fly(self):
        self._fly_behaviour.fly()

    def perform_quack(self):
        self._quack_behaviour.quack()


class MallardDuck(AbstractDuck):
    def __init__(self):
        self._fly_behaviour = FlyWithWings()
        self._quack_behaviour = Quack()

    def display(self):
        print("I'm a real Mallard Duck!")


"""
Print the details
"""
if __name__ == "__main__":
    mallard = MallardDuck()
    mallard.display()
    mallard.perform_quack()
    mallard.perform_fly()
