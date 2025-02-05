from abc import ABC, abstractmethod
from typing import final


class CaffeineBeverage(ABC):
    @final
    def prepare(self):
        self.boil_water()
        self.brew()
        self.pour()
        self.add_condiments()

    @abstractmethod
    def brew(self):
        pass

    @abstractmethod
    def add_condiments(self):
        pass

    @staticmethod
    def boil_water():
        print('Boiling water')

    @staticmethod
    def pour():
        print('Pour into cup')


class Coffee(CaffeineBeverage):
    def brew(self):
        print('Dripping Coffee through filter')

    def add_condiments(self):
        print('Adding sugar and milk')


class Tea(CaffeineBeverage):
    def brew(self):
        print('Steeping the tea')

    def add_condiments(self):
        print('Adding sweetener')


if __name__ == "__main__":
    print('Make tea...')
    tea = Tea()
    tea.prepare()

    print('--------------')
    print('Make coffee...')
    coffee = Coffee()
    coffee.prepare()
