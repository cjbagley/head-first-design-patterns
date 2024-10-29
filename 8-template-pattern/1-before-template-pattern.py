class Coffee:
    def prepare(self):
        self.boil_water()
        self.brew_coffee()
        self.pour()
        self.add_suger_and_milk()

    @staticmethod
    def boil_water():
        print('Boiling water')

    @staticmethod
    def brew_coffee():
        print('Dripping Coffee through filter')

    @staticmethod
    def pour():
        print('Pour into cup')

    @staticmethod
    def add_suger_and_milk():
        print('Adding sugar and milk')


class Tea:
    def prepare(self):
        self.boil_water()
        self.steep_teabag()
        self.pour()
        self.add_sweetener()

    @staticmethod
    def boil_water():
        print('Boiling water')

    @staticmethod
    def steep_teabag():
        print('Steeping the tea')

    @staticmethod
    def pour():
        print('Pour into cup')

    @staticmethod
    def add_sweetener():
        print('Adding sweetener')
