from abc import ABC, abstractmethod


class GumballMachineRemote(ABC):
    @abstractmethod
    def get_count(self) -> int:
        pass

    @abstractmethod
    def get_location(self) -> str:
        pass


class GumballMachine(GumballMachineRemote):
    def __init__(self, location: str, gumball_amount: int):
        self._count = gumball_amount
        self._location = location

    def get_count(self) -> int:
        return self._count

    def get_location(self) -> str:
        return self._location


class GumballMonitor(GumballMachineRemote):
    def __init__(self, gumball_machine: GumballMachine):
        self.machine = gumball_machine

    def get_count(self) -> int:
        print("Making remote call to get count")
        return self.machine.get_count()

    def get_location(self) -> str:
        print("Making remote call to get location")
        return self.machine.get_location()

    def print_report(self):
        print(f"Gumball Machine Location: {self.get_location()}")
        print(f"Current Inventory: {self.get_count()}")


if __name__ == "__main__":
    machine = GumballMachine("Lincoln", 100)
    monitor = GumballMonitor(machine)

    monitor.print_report()
