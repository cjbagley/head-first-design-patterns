from quackable import Quackable
from factories import AbstractDuckFactory, CountingDuckFactory, QuackCounter

"""
Adapter pattern
"""


class Goose:
    def honk(self):
        print('Honk')


class GooseAdapter(Quackable):
    def __init__(self, goose: Goose):
        self.goose = goose

    def quack(self):
        self.goose.honk()


"""
Composite pattern
"""


class Flock(Quackable):
    quackers = []

    def add(self, quacker: type(Quackable)):
        self.quackers.append(quacker)

    def quack(self):
        for quacker in self.quackers:
            quacker.quack()


"""
Program
"""


def simulate(duck: type(Quackable)) -> None:
    duck.quack()


if __name__ == "__main__":
    factory: type(AbstractDuckFactory) = CountingDuckFactory
    mallard_duck = factory.create_mallard_duck()
    redhead_duck = factory.create_redhead_duck()
    duck_call = factory.create_duck_call()
    rubber_duck = factory.create_rubber_duck()

    simulate(mallard_duck)
    simulate(redhead_duck)
    simulate(duck_call)
    simulate(rubber_duck)

    adapted_goose = GooseAdapter(Goose())
    simulate(adapted_goose)

    print(QuackCounter.get_quack_count())

    flock = Flock()
    flock.add(redhead_duck)
    flock.add(duck_call)
    flock.quack()
    print(QuackCounter.get_quack_count())
