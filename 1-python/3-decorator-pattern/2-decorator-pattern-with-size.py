from abc import ABC, abstractmethod
from enum import Enum


class Size(Enum):
    TALL = "Tall"
    GRANDE = "Grande"
    VENTI = "Venti"


class Beverage(ABC):
    _description: str = "Unknown Beverage"
    _size: Size = Size.TALL

    @abstractmethod
    def cost(self) -> int:
        pass

    def get_description(self) -> str:
        return f"{self._size.value} {self._description}"

    def set_size(self, size: Size):
        self._size = size

    def get_size(self):
        return self._size


class CondimentDecorator(Beverage):
    _beverage: Beverage

    @abstractmethod
    def get_description(self) -> str:
        pass

    def get_size(self) -> Size:
        return self._beverage._size


"""
Beverages
"""


class Expresso(Beverage):
    def __init__(self):
        self._description = "Expresso"

    def cost(self) -> int:
        return 199


class DarkRoast(Beverage):
    def __init__(self):
        self._description = "Dark Roast Coffee"

    def cost(self) -> int:
        return 99


class HouseBlend(Beverage):
    def __init__(self):
        self._description = "House Blend Coffee"

    def cost(self) -> int:
        return 89


"""
Condiments
"""


class Mocha(CondimentDecorator):
    def __init__(self, beverage: Beverage):
        self._beverage = beverage

    def get_description(self) -> str:
        return self._beverage.get_description() + ", Mocha"

    def cost(self) -> int:
        return self._beverage.cost() + 20


class Soy(CondimentDecorator):
    def __init__(self, beverage: Beverage):
        self._beverage = beverage

    def get_description(self) -> str:
        return self._beverage.get_description() + ", Soy"

    def cost(self) -> int:
        cost = self._beverage.cost()
        match self._beverage.get_size():
            case Size.TALL:
                cost += 10
            case Size.GRANDE:
                cost += 15
            case Size.VENTI:
                cost += 29

        return cost


class Whip(CondimentDecorator):
    def __init__(self, beverage: Beverage):
        self._beverage = beverage

    def get_description(self) -> str:
        return self._beverage.get_description() + ", Whip"

    def cost(self) -> int:
        return self._beverage.cost() + 10


def print_to_till(beverage: Beverage):
    print(f"{beverage.get_description()} ${beverage.cost() / 100}")


if __name__ == "__main__":
    expresso: Beverage = Expresso()
    print_to_till(expresso)

    dark_roast: Beverage = DarkRoast()
    dark_roast.set_size(Size.GRANDE)
    dark_roast = Mocha(dark_roast)
    dark_roast = Mocha(dark_roast)
    dark_roast = Whip(dark_roast)
    print_to_till(dark_roast)

    house_blend: Beverage = HouseBlend()
    house_blend.set_size(Size.VENTI)
    house_blend = Soy(house_blend)
    house_blend = Mocha(house_blend)
    house_blend = Whip(house_blend)
    print_to_till(house_blend)
