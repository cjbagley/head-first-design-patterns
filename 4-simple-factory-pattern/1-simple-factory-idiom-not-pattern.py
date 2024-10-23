class Pizza:
    @staticmethod
    def prepare():
        print("Preparing pizza...")

    @staticmethod
    def bake():
        print("Baking pizza...")

    @staticmethod
    def cut():
        print("Cutting pizza...")

    @staticmethod
    def box():
        print("Boxing up pizza...")


class MargaritaPizza(Pizza):
    pass


class PepperoniPizza(Pizza):
    pass


class ClamPizza(Pizza):
    pass


class VeggiePizza(Pizza):
    pass


class SimplePizzaFactory:
    @staticmethod
    def create_pizza(name: str) -> type(Pizza):
        match name:
            case "pepperoni":
                return PepperoniPizza
            case "clam":
                return ClamPizza
            case "veggie":
                return VeggiePizza
            case _:
                return MargaritaPizza


class PizzaStore:
    def __init__(self):
        self._factory = SimplePizzaFactory()

    def order_pizza(self, name: str) -> type(Pizza):
        pizza = self._factory.create_pizza(name)
        pizza.prepare()
        pizza.bake()
        pizza.cut()
        pizza.box()

        return pizza


if __name__ == "__main__":
    store = PizzaStore()
    ordered_pizza = store.order_pizza("veggie")
    print(ordered_pizza)
