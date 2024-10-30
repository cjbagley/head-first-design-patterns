class MenuItem:
    def __init__(
            self,
            name: str,
            description: str,
            vegetarian: bool,
            price: int
    ):
        self.name = name
        self.description = description
        self.vegetarian = vegetarian
        self.price = price
