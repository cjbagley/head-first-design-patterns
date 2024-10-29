from abc import ABC, abstractmethod
from typing import final


class CaffeineBeverage(ABC):
    @final
    def prepare(self):
        self.boil_water()
        self.pre_brew()
        self.brew()
        self.pour()
        if self.should_add_condiments():
            self.add_condiments()

    # Hook
    def pre_brew(self):
        pass

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

    # Additional type of hook
    def should_add_condiments(self) -> bool:
        return True


class Coffee(CaffeineBeverage):
    def brew(self):
        print('Dripping Coffee through filter')

    def add_condiments(self):
        print('Adding sugar and milk')


class Tea(CaffeineBeverage):
    def pre_brew(self):
        print('Add honey')

    def brew(self):
        print('Steeping the tea')

    def add_condiments(self):
        print('Adding milk')

    # Here we could do things like as the customer
    # if they want to add condiments
    def should_add_condiments(self) -> bool:
        return False


if __name__ == "__main__":
    print('Make tea...')
    tea = Tea()
    tea.prepare()

    print('--------------')
    print('Make coffee...')
    coffee = Coffee()
    coffee.prepare()
