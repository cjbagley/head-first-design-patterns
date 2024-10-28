from abc import ABC, abstractmethod

"""
Duck
Implements one type of interface
"""


class Duck(ABC):
    @abstractmethod
    def quack(self):
        pass

    @abstractmethod
    def fly(self):
        pass


class MallardDuck(Duck):
    def quack(self):
        print('Quack')

    def fly(self):
        print('Fly')


"""
Turkey
Implements another type of interface
"""


class Turkey(ABC):
    @abstractmethod
    def gobble(self):
        pass

    @abstractmethod
    def fly(self):
        pass


class WildTurkey(Turkey):
    def gobble(self):
        print('Gobble gobble')

    def fly(self):
        print('Fly a short distance')


"""
Adapter methods
"""


class TurkeyAdapter(Duck):
    def __init__(self, turkey: type(Turkey)):
        self.turkey = turkey

    def quack(self):
        self.turkey.gobble()

    def fly(self):
        for x in range(5):
            self.turkey.fly()


class DuckAdapter(Turkey):
    def __init__(self, duck: type(Duck)):
        self.duck = duck

    def gobble(self):
        self.duck.quack()

    def fly(self):
        self.duck.fly()


def test_duck(duck: type(Duck)):
    duck.quack()
    duck.fly()


if __name__ == "__main__":
    wild_turkey = WildTurkey()
    mallard_duck = MallardDuck()

    wild_turkey_adapter = TurkeyAdapter(wild_turkey)

    print('The Turkey says....')
    wild_turkey.gobble()
    wild_turkey.fly()

    print('The Duck says....')
    test_duck(mallard_duck)

    print('The Wild Turkey Adapter says....')
    test_duck(wild_turkey_adapter)
