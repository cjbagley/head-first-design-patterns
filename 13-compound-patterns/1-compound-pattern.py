from quackable import Quackable


class MallardDuck(Quackable):
    def quack(self):
        print('Quack')


class RedheadDuck(Quackable):
    def quack(self):
        print('Quack')


class DuckCall(Quackable):
    def quack(self):
        print('Kwack')


class RubberDuck(Quackable):
    def quack(self):
        print('Squeak')


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
Decorator Pattern
"""


class QuackCounter(Quackable):
    quack_count = 0

    def __init__(self, duck: type(Quackable)):
        self.__duck = duck

    def quack(self):
        self.__duck.quack()
        QuackCounter.quack_count += 1

    @staticmethod
    def get_quack_count() -> int:
        return QuackCounter.quack_count


def simulate(duck: type(Quackable)) -> None:
    duck.quack()


if __name__ == "__main__":
    mallard_duck = QuackCounter(MallardDuck())
    redhead_duck = QuackCounter(RedheadDuck())
    duck_call = QuackCounter(DuckCall())
    rubber_duck = QuackCounter(RubberDuck())

    simulate(mallard_duck)
    simulate(redhead_duck)
    simulate(duck_call)
    simulate(rubber_duck)
    simulate(rubber_duck)

    goose = GooseAdapter(Goose())
    simulate(goose)

    print(QuackCounter.get_quack_count())
