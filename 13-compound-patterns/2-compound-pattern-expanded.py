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
Program
"""


def simulate(duck: type(Quackable)) -> None:
    duck.quack()


if __name__ == "__main__":
    factory: AbstractDuckFactory = CountingDuckFactory
    mallard_duck = factory.create_mallard_duck()
    redhead_duck = factory.create_redhead_duck()
    duck_call = factory.create_duck_call()
    rubber_duck = factory.create_rubber_duck()

    simulate(mallard_duck)
    simulate(redhead_duck)
    simulate(duck_call)
    simulate(rubber_duck)

    goose = GooseAdapter(Goose())
    simulate(goose)

    print(QuackCounter.get_quack_count())
