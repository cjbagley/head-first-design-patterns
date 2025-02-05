from abc import ABC, abstractmethod


class State(ABC):
    @abstractmethod
    def description(self):
        pass

    @abstractmethod
    def insert_quarter(self):
        pass

    @abstractmethod
    def eject_quarter(self):
        pass

    @abstractmethod
    def turn_crank(self):
        pass

    @abstractmethod
    def dispense(self):
        pass


class GumballMachine:
    def __init__(self, gumball_count: int):
        self.sold_out_state = SoldOutState(self)
        self.no_quarter_state = NoQuarterState(self)
        self.has_quarter_state = HasQuarterState(self)
        self.sold_state = SoldState(self)

        self.count = gumball_count
        self.state = self.sold_out_state
        if self.count > 0:
            self.state = self.no_quarter_state

    def insert_quarter(self):
        self.state.insert_quarter()

    def eject_quarter(self):
        self.state.eject_quarter()

    def turn_crank(self):
        self.state.turn_crank()
        self.state.dispense()

    def set_state(self, state: type(State)):
        self.state = state

    def release_ball(self):
        print('A gumball comes rollout out of the slot...')
        if self.count > 0:
            self.count -= 1

    def __str__(self):
        count_description = f'{self.count} gumballs left'
        if self.count == 1:
            count_description = f'{self.count} gumball left'

        return f'Gumball machine: {self.state.description()}, {count_description}'


class SoldState(State):
    def __init__(self, gumball_machine: GumballMachine):
        self.gumball_machine = gumball_machine

    def description(self):
        return "Gumball sold"

    def insert_quarter(self):
        print('Please wait, we are already giving you a gumball')

    def eject_quarter(self):
        print('Sorry, you already turned the crank')

    def turn_crank(self):
        print("Turning twice doesn't get you another gumball!")

    def dispense(self):
        self.gumball_machine.release_ball()
        if self.gumball_machine.count > 0:
            self.gumball_machine.set_state(self.gumball_machine.no_quarter_state)
            return

        print('Out of gumballs')
        self.gumball_machine.set_state(self.gumball_machine.sold_out_state)


class SoldOutState(State):
    def __init__(self, gumball_machine: GumballMachine):
        self.gumball_machine = gumball_machine

    def description(self):
        return "Sold out"

    def insert_quarter(self):
        print("You can't insert a quarter, the machine is sold out")

    def eject_quarter(self):
        print("You can't eject, you haven't inserted a quarter yet")

    def turn_crank(self):
        print("You turned but there are no gumballs")

    def dispense(self):
        print('No gumball dispensed')


class NoQuarterState(State):
    def __init__(self, gumball_machine: GumballMachine):
        self.gumball_machine = gumball_machine

    def description(self):
        return 'Machine is waiting for quarter'

    def insert_quarter(self):
        print("You inserted a quarter")
        self.gumball_machine.set_state(self.gumball_machine.has_quarter_state)

    def eject_quarter(self):
        print("You haven't inserted a quarter")

    def turn_crank(self):
        print("You turned but there's no quarter")

    def dispense(self):
        print('You need to pay first')


class HasQuarterState(State):
    def __init__(self, gumball_machine: GumballMachine):
        self.gumball_machine = gumball_machine

    def description(self):
        return 'Quarter inserted into machine'

    def insert_quarter(self):
        print("You can't insert another quarter")

    def eject_quarter(self):
        print('Quarter returned')
        self.gumball_machine.set_state(self.gumball_machine.no_quarter_state)

    def turn_crank(self):
        print('You turned....')
        self.gumball_machine.set_state(self.gumball_machine.sold_state)

    def dispense(self):
        print('No gumball dispensed')


def space():
    print('')


if __name__ == "__main__":
    machine = GumballMachine(5)

    print(machine)
    space()

    machine.insert_quarter()
    machine.turn_crank()
    space()

    print(machine)
    space()

    machine.insert_quarter()
    machine.eject_quarter()
    machine.turn_crank()
    space()

    machine.insert_quarter()
    machine.turn_crank()
    machine.insert_quarter()
    machine.turn_crank()
    machine.eject_quarter()
    space()

    print(machine)
    space()

    machine.insert_quarter()
    machine.insert_quarter()
    machine.turn_crank()
    machine.insert_quarter()
    machine.turn_crank()
    machine.insert_quarter()
    machine.turn_crank()
    space()

    print(machine)
