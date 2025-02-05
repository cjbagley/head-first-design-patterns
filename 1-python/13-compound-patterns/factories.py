from abc import ABC, abstractmethod
from ducks import MallardDuck, RedheadDuck, DuckCall, RubberDuck
from quackable import Quackable


"""
Factory Pattern
"""


class AbstractDuckFactory(ABC):
    @staticmethod
    @abstractmethod
    def create_mallard_duck() -> type(Quackable):
        pass

    @staticmethod
    @abstractmethod
    def create_redhead_duck() -> type(Quackable):
        pass

    @staticmethod
    @abstractmethod
    def create_duck_call() -> type(Quackable):
        pass

    @staticmethod
    @abstractmethod
    def create_rubber_duck() -> type(Quackable):
        pass


class DuckFactory(AbstractDuckFactory):
    @staticmethod
    def create_mallard_duck() -> type(Quackable):
        return MallardDuck()

    @staticmethod
    def create_redhead_duck() -> type(Quackable):
        return RedheadDuck()

    @staticmethod
    def create_duck_call() -> type(Quackable):
        return DuckCall()

    @staticmethod
    def create_rubber_duck() -> type(Quackable):
        return RubberDuck()


class CountingDuckFactory(AbstractDuckFactory):
    @staticmethod
    def create_mallard_duck() -> type(Quackable):
        return QuackCounter(MallardDuck())

    @staticmethod
    def create_redhead_duck() -> type(Quackable):
        return QuackCounter(RedheadDuck())

    @staticmethod
    def create_duck_call() -> type(Quackable):
        return QuackCounter(DuckCall())

    @staticmethod
    def create_rubber_duck() -> type(Quackable):
        return QuackCounter(RubberDuck())


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
