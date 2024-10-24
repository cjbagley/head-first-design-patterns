from abc import ABC, abstractmethod


class Pizza:
    name: str
    dough: str
    sauce: str
    toppings: list[str]

    def prepare(self):
        print(f'Preparing {self.name}...')
        print('Tossing dough...')
        print('Adding sauce...')
        print('Adding toppings:')
        for topping in self.toppings:
            print(f' - {topping}')

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


class NYMargaritaPizza(Pizza):
    def __init__(self):
        self.name = 'New York Style Cheese Pizza'
        self.dough = 'Thin Crust Dough'
        self.sauce = 'Marinara Sauce'
        self.toppings = ['Grated Reggiano Cheese']


class NYPepperoniPizza(Pizza):
    def __init__(self):
        self.name = 'New York Style Pepperoni Pizza'
        self.dough = 'Thin Crust Dough'
        self.sauce = 'Marinara Sauce'
        self.toppings = ['Grated Reggiano Cheese', 'Pepperoni']


class NYClamPizza(Pizza):
    def __init__(self):
        self.name = 'New York Style Clam Pizza'
        self.dough = 'Thin Crust Dough'
        self.sauce = 'Marinara Sauce'
        self.toppings = ['Grated Reggiano Cheese', 'Clam']


class NYVeggiePizza(Pizza):
    def __init__(self):
        self.name = 'New York Style Veggie Pizza'
        self.dough = 'Thin Crust Dough'
        self.sauce = 'Marinara Sauce'
        self.toppings = ['Grated Reggiano Cheese', 'Onion', 'Peppers']


class ChicagoMargaritaPizza(Pizza):
    def __init__(self):
        self.name = 'Chicago Style Cheese Pizza'
        self.dough = 'Extra Thick Crust Dough'
        self.sauce = 'Plum Tomato Sauce'
        self.toppings = ['Shredded Mozzarella Cheese']

    @staticmethod
    def cut():
        print('Cutting the pizza into square slices..')


class ChicagoPepperoniPizza(Pizza):
    def __init__(self):
        self.name = 'Chicago Style Pepperoni Pizza'
        self.dough = 'Extra Thick Crust Dough'
        self.sauce = 'Plum Tomato Sauce'
        self.toppings = ['Shredded Mozzarella Cheese', 'Pepperoni', 'Peppers']

    @staticmethod
    def cut():
        print('Cutting the pizza into square slices..')


class ChicagoClamPizza(Pizza):
    def __init__(self):
        self.name = 'Chicago Style Clam Pizza'
        self.dough = 'Extra Thick Crust Dough'
        self.sauce = 'Plum Tomato Sauce'
        self.toppings = ['Shredded Mozzarella Cheese', 'Clams']

    @staticmethod
    def cut():
        print('Cutting the pizza into square slices..')


class ChicagoVeggiePizza(Pizza):
    def __init__(self):
        super().__init__()
        self.name = 'Chicago Style Veggie Pizza'
        self.dough = 'Extra Thick Crust Dough'
        self.sauce = 'Plum Tomato Sauce'
        self.toppings = ['Shredded Mozzarella Cheese', 'Peppers', 'Sweetcorn', 'Cherry Tomatoes']

    @staticmethod
    def cut():
        print('Cutting the pizza into square slices..')


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
        match name:
            case "pepperoni":
                return NYPepperoniPizza()
            case "clam":
                return NYClamPizza()
            case "veggie":
                return NYVeggiePizza()
            case _:
                return NYMargaritaPizza()


class ChicagoPizzaStore(PizzaStore):
    def create_pizza(self, name: str) -> type(Pizza):
        match name:
            case "pepperoni":
                return ChicagoPepperoniPizza()
            case "clam":
                return ChicagoClamPizza()
            case "veggie":
                return ChicagoVeggiePizza()
            case _:
                return ChicagoMargaritaPizza()


if __name__ == "__main__":
    ny_store = NewYorkPizzaStore()
    chicago_store = ChicagoPizzaStore()

    print('=============')
    ny_store.order_pizza('pepperoni')
    print('=============')
    chicago_store.order_pizza('veggie')
    print('=============')
