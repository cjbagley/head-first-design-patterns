class GumballMachine:
    SOLD_OUT = 0
    NO_QUARTER = 1
    HAS_QUARTER = 2
    SOLD = 3

    state = SOLD_OUT
    count = 0

    def __init__(self, gumball_count: int):
        self.count = gumball_count
        if self.count > 0:
            self.state = self.NO_QUARTER

    def insert_quarter(self):
        match self.state:
            case self.HAS_QUARTER:
                print("You can't insert another quarter")
            case self.NO_QUARTER:
                self.state = self.HAS_QUARTER
                print("You inserted a quarter")
            case self.SOLD_OUT:
                print("You can't insert a quarter, the machine is sold out")
            case self.SOLD:
                print('Please wait, we are already giving you a gumball')

    def eject_quarter(self):
        match self.state:
            case self.HAS_QUARTER:
                print('Quarter returned')
                self.state = self.NO_QUARTER
            case self.NO_QUARTER:
                print("You haven't inserted a quarter")
            case self.SOLD_OUT:
                print("You can't eject, you haven't inserted a quarter yet")
            case self.SOLD:
                print('Sorry, you already turned the crank')

    def turn_crank(self):
        match self.state:
            case self.HAS_QUARTER:
                print('You turned....')
                self.state = self.SOLD
                self.dispense()
            case self.NO_QUARTER:
                print("You turned but there's no quarter")
            case self.SOLD_OUT:
                print("You turned but there are no gumballs")
            case self.SOLD:
                print("Turning twice doesn't get you another gumball!")

    def dispense(self):
        match self.state:
            case self.HAS_QUARTER:
                print('You need to turn the crank')
            case self.NO_QUARTER:
                print('You need to pay first')
            case self.SOLD_OUT:
                print('No gumball dispensed')
            case self.SOLD:
                print('A gumball comes rolling out of the slot')
                self.count -= 1
                if self.count == 0:
                    print('Out of gumballs')
                    self.state = self.SOLD_OUT
                else:
                    self.state = self.NO_QUARTER

    def __str__(self):
        count_description = f'{self.count} gumballs left'
        if self.count == 1:
            count_description = f'{self.count} gumball left'

        state_description = 'unknown'
        match self.state:
            case self.HAS_QUARTER:
                state_description = 'Quarter inserted into machine'
            case self.NO_QUARTER:
                state_description = 'Machine is waiting for quarter'
            case self.SOLD_OUT:
                state_description = 'Sold out'
            case self.SOLD:
                state_description = 'Gumball sold'

        return f'Gumball machine: {state_description}, {count_description}'


def space():
    print('')


if __name__ == "__main__":
    gumball_machine = GumballMachine(5)

    print(gumball_machine)
    space()

    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    space()

    print(gumball_machine)
    space()

    gumball_machine.insert_quarter()
    gumball_machine.eject_quarter()
    gumball_machine.turn_crank()
    space()

    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    gumball_machine.eject_quarter()
    space()

    print(gumball_machine)
    space()

    gumball_machine.insert_quarter()
    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    gumball_machine.insert_quarter()
    gumball_machine.turn_crank()
    space()

    print(gumball_machine)
