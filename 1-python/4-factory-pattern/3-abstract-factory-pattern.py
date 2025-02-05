from abc import ABC, abstractmethod

from ingredients import *

"""
Pizza Ingredient Factories
"""


class PizzaIngredientsFactory(ABC):
    @staticmethod
    @abstractmethod
    def create_dough() -> type(Dough):
        pass

    @staticmethod
    @abstractmethod
    def create_sauce() -> type(Sauce):
        pass

    @staticmethod
    @abstractmethod
    def create_cheese() -> type(Cheese):
        pass

    @staticmethod
    @abstractmethod
    def create_veggies() -> type([Vegetable]):
        pass

    @staticmethod
    @abstractmethod
    def create_pepperoni() -> type(Pepperoni):
        pass

    @staticmethod
    @abstractmethod
    def create_clams() -> type(Clams):
        pass


class NYPizzaIngredientFactory(PizzaIngredientsFactory):
    @staticmethod
    def create_dough() -> type(Dough):
        return ThinCrustDough()

    @staticmethod
    def create_sauce() -> type(Sauce):
        return MarinaraSauce()

    @staticmethod
    def create_cheese() -> type(Cheese):
        return ReggianoCheese()

    @staticmethod
    def create_veggies() -> type([Vegetable]):
        return [
            Garlic(),
            Onion(),
            Mushroom(),
            RedPepper(),
        ]

    @staticmethod
    def create_pepperoni() -> type(Pepperoni):
        return SlicedPepperoni()

    @staticmethod
    def create_clams() -> type(Clams):
        return FreshClams()


class ChicagoPizzaIngredientFactory(PizzaIngredientsFactory):
    @staticmethod
    def create_dough() -> type(Dough):
        return ThickCrustDough()

    @staticmethod
    def create_sauce() -> type(Sauce):
        return PlumTomatoSauce()

    @staticmethod
    def create_cheese() -> type(Cheese):
        return MozzarellaCheese()

    @staticmethod
    def create_veggies() -> type([Vegetable]):
        return [
            EggPlant(),
            Spinach(),
            BlackOlives(),
        ]

    @staticmethod
    def create_pepperoni() -> type(Pepperoni):
        return SlicedPepperoni()

    @staticmethod
    def create_clams() -> type(Clams):
        return FrozenClams()


"""
Pizzas
"""


class Pizza:
    name: str
    dough: Dough
    cheese: Cheese
    sauce: Sauce
    veggies: list[Vegetable]
    pepperoni: Pepperoni
    clams: Clams

    @abstractmethod
    def prepare(self):
        pass

    def get_name(self):
        return self.name

    @staticmethod
    def bake():
        print('Bake for 25 minutes at 350...')

    @staticmethod
    def cut():
        print('Cutting the pizza into diagonal slices..')

    @staticmethod
    def box():
        print("Boxing up pizza in official PizzaStore box...")

    def __str__(self):
        return f"""
Name: {'None' if not hasattr(self, 'name') else self.name} 
Dough: {'None' if not hasattr(self, 'dough') else self.dough} 
Sauce: {'None' if not hasattr(self, 'sauce') else self.sauce} 
Veggies: {'None' if not hasattr(self, 'veggies') else self.veggies} 
Clams: {'None' if not hasattr(self, 'clams') else self.clams} 
Pepperoni: {'None' if not hasattr(self, 'pepperoni') else self.pepperoni} 
"""


class CheesePizza(Pizza):
    def __init__(self, ingredient_factory: type(PizzaIngredientsFactory)):
        self.ingredient_factory = ingredient_factory

    def prepare(self):
        print(f'Preparing {self.get_name()}')
        self.dough = self.ingredient_factory.create_dough()
        self.sauce = self.ingredient_factory.create_sauce()
        self.cheese = self.ingredient_factory.create_cheese()


class PepperoniPizza(Pizza):
    def __init__(self, ingredient_factory: type(PizzaIngredientsFactory)):
        self.ingredient_factory = ingredient_factory

    def prepare(self):
        print(f'Preparing {self.get_name()}')
        self.dough = self.ingredient_factory.create_dough()
        self.sauce = self.ingredient_factory.create_sauce()
        self.cheese = self.ingredient_factory.create_cheese()
        self.pepperoni = self.ingredient_factory.create_pepperoni()


class VeggiePizza(Pizza):
    def __init__(self, ingredient_factory: type(PizzaIngredientsFactory)):
        self.ingredient_factory = ingredient_factory

    def prepare(self):
        print(f'Preparing {self.get_name()}')
        self.dough = self.ingredient_factory.create_dough()
        self.sauce = self.ingredient_factory.create_sauce()
        self.cheese = self.ingredient_factory.create_cheese()
        self.veggies = self.ingredient_factory.create_veggies()


class ClamPizza(Pizza):
    def __init__(self, ingredient_factory: type(PizzaIngredientsFactory)):
        self.ingredient_factory = ingredient_factory

    def prepare(self):
        print(f'Preparing {self.get_name()}')
        self.dough = self.ingredient_factory.create_dough()
        self.sauce = self.ingredient_factory.create_sauce()
        self.cheese = self.ingredient_factory.create_cheese()
        self.clams = self.ingredient_factory.create_clams()


"""
Stores
"""


class PizzaStore(ABC):
    @abstractmethod
    def create_pizza(self, name: str) -> type(Pizza):
        pass

    def order_pizza(self, name: str) -> type(Pizza):
        pizza = self.create_pizza(name)
        pizza.prepare()
        pizza.bake()
        pizza.cut()
        pizza.box()

        return pizza


class NewYorkPizzaStore(PizzaStore):
    def create_pizza(self, name: str) -> type(Pizza):
        ingredient_factory = NYPizzaIngredientFactory
        pizza: Pizza
        base_name = "New York Style"
        match name:
            case "pepperoni":
                pizza = PepperoniPizza(ingredient_factory)
                pizza.name = f"{base_name} Pepperoni Pizza"
            case "clam":
                pizza = ClamPizza(ingredient_factory)
                pizza.name = f"{base_name} Clam Pizza"
            case "veggie":
                pizza = VeggiePizza(ingredient_factory)
                pizza.name = f"{base_name} Veggie Pizza"
            case _:
                pizza = CheesePizza(ingredient_factory)
                pizza.name = f"{base_name} Cheese Pizza"

        return pizza


class ChicagoPizzaStore(PizzaStore):
    def create_pizza(self, name: str) -> type(Pizza):
        ingredient_factory = ChicagoPizzaIngredientFactory
        pizza: Pizza
        base_name = "Chicago Style"
        match name:
            case "pepperoni":
                pizza = PepperoniPizza(ingredient_factory)
                pizza.name = f"{base_name} Pepperoni Pizza"
            case "clam":
                pizza = ClamPizza(ingredient_factory)
                pizza.name = f"{base_name} Clam Pizza"
            case "veggie":
                pizza = VeggiePizza(ingredient_factory)
                pizza.name = f"{base_name} Veggie Pizza"
            case _:
                pizza = CheesePizza(ingredient_factory)
                pizza.name = f"{base_name} Cheese Pizza"

        return pizza


if __name__ == "__main__":
    ny_store = NewYorkPizzaStore()
    chicago_store = ChicagoPizzaStore()

    print('=============')
    order_one = ny_store.order_pizza('pepperoni')
    print(order_one)
    print('=============')
    order_two = chicago_store.order_pizza('veggie')
    print(order_two)
    print('=============')
