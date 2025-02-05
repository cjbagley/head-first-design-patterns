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


class FlyRocketPowered(FlyBehaviourInterface):
    def fly(self):
        print("I'm flying with a rocket")


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

    def set_fly(self, fly_behaviour: FlyBehaviourInterface):
        self._fly_behaviour = fly_behaviour

    def set_quack(self, quack_behaviour: QuackBehaviourInterface):
        self._quack_behaviour = quack_behaviour

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


class ModelDuck(AbstractDuck):
    def __init__(self):
        self._fly_behaviour = FlyNoWay()
        self._quack_behaviour = Quack()

    def display(self):
        print("I'm a model duck!")


"""
Print the details
"""
if __name__ == "__main__":
    print("========")
    mallard = MallardDuck()
    mallard.display()
    mallard.perform_quack()
    mallard.perform_fly()
    print("========")
    model = ModelDuck()
    model.display()
    model.perform_fly()
    print("Strapping rocket to model duck...")
    model.set_fly(FlyRocketPowered())
    model.perform_fly()
